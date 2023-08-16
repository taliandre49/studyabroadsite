<?php
$title = 'Life Abroad';


//open database


// seting maximum file size
define("MAX_FILE_SIZE", 1000000);

$upload_feedback = array(
  'general_error' => False,
  'too_large' => False
);

// fields for upload

$upload_city = NULL;
$upload_file_ext = NULL;
$upload_file_name = NULL;
$upload_rating = NULL;
$upload_requirement = NULL;
$upload_majors = NULL;
$upload_descrip = NULL;





if (isset($_POST["image-insert"])) {


  // get the info about the uploaded files and variables.
  $upload = $_FILES['jpeg-file'];
  $upload_city = trim($_POST['prog-city']); // untrusted
  $upload_name = trim($_POST['prog-name']); // untrusted
  $upload_rating = (int)($_POST['rate']); //untrusted
  $upload_requirement = trim($_POST['prog-require']); // untrusted
  $upload_majors = trim($_POST['prog-majors']); // untrusted
  $upload_descrip = trim($_POST['prog-descrip']); // untrusted
  $tags_continent = (int)($_POST['continent']); //untrusted
  $tags_term = (int)($_POST['term']); //untrusted
  $record_id = NULL;
  $recorded_id = NULL;
  $recordeds_id = NULL;


  // Assume the form is valid
  $form_valid = True;
  //checking form valididty:
  // file is required
  if ($upload['error'] == UPLOAD_ERR_OK) {

    // The upload was successful!

    // Get the name of the uploaded file without any path
    $upload_file_name = basename($upload['name']);

    // Get the file extension of the uploaded file and convert to lowercase for consistency in DB
    $upload_file_ext = strtolower(pathinfo($upload_file_name, PATHINFO_EXTENSION));

    // This site only accepts SVG files!
    if (!in_array($upload_file_ext, array('jpeg'))) {
      $form_valid = False;
      $upload_feedback['general_error'] = True;
    }
  } else if (($upload['error'] == UPLOAD_ERR_INI_SIZE) || ($upload['error'] == UPLOAD_ERR_FORM_SIZE)) {
    // file was too big, let's try again
    $form_valid = False;
    $upload_feedback['too_large'] = True;
  } else {
    // upload was not successful
    $form_valid = False;
    $upload_feedback['general_error'] = True;
  }

  if ($form_valid) {

    $record_id = $db->lastInsertId('id');
    // insert upload into DB


    $insert_progs = exec_sql_query(
      $db,
      "INSERT INTO programs (name, city, rating, requirment, majors, descrip, file_name, file_ext) VALUES (:name, :city, :rating, :requirment, :majors, :descrip, :file_name, :file_ext)",
      array(
        ':name' => $upload_name,
        ':city' => $upload_city,
        ':rating' => $upload_rating,
        ':requirment' => $upload_requirement,
        ':majors' => $upload_majors,
        ':descrip' => $upload_descrip,
        ':file_name' => $upload_file_name,
        ':file_ext' => $upload_file_ext
      )
    );
    $recordeds_id = $db->lastInsertId('id');


    foreach ($_POST['checktag'] as $checktag_value) {

      if (isset($checktag_value)) {
        $insert_tags_term = exec_sql_query(
          $db,
          "INSERT INTO joint (tags_id, programs_id) VALUES (:tags_id, :programs_id)",
          array(
            ':tags_id' => $checktag_value,
            ':programs_id' => $recordeds_id
          )
        );
      }
    };

    if ($insert_progs) {



      // get the newly inserted record's id

      $recorded_id = $db->lastInsertId('id');


      $upload_storage_path = 'public/uploads/programs/' . $recordeds_id . '.' . $upload_file_ext;

      if (move_uploaded_file($upload["tmp_name"], $upload_storage_path) == False) {
        error_log("Failed to permanently store the uploaded file on the file server. Please check that the server folder exists.");
      }
    }
  }
};





$tags_record = exec_sql_query(
  $db,
  "SELECT tags.identifier AS 'identifier' ,
  tags.id AS 'tag.id' FROM tags"
)->fetchAll();



//filtering:

$testingget = isset($_GET["filter"]);

if (isset($_GET["filter"])) {

  $filter_term_con = $_GET['filter-con-term'] ?? NULL;
  $checking_param = ($filter_term_con != 00);

  if ($filter_term_con != 00) {
    $sql_select_clause =
      "SELECT
        programs.id AS 'programs.id',
        programs.file_name AS 'file_name',
        programs.file_ext AS 'file_ext',
        programs.name AS 'name',
        programs.city AS 'city',
        joint.tags_id AS 'tags.id',
        joint.programs_id AS 'program_id'
        FROM joint  INNER JOIN programs ON (joint.programs_id = programs.id )";



    $sql_where_clause = ' WHERE ' . '(joint.tags_id' . " = " . $filter_term_con . ')';

    //final query:

    $final_query = $sql_select_clause . $sql_where_clause  . ';';
    $records_test = exec_sql_query($db, $final_query)->fetchAll();
  } else {
    $records_test = exec_sql_query(
      $db,
      "SELECT
          programs.id AS 'programs.id',
          programs.file_name AS 'file_name',
          programs.file_ext AS 'file_ext',
          programs.name AS 'name',
          programs.city AS 'city'
          FROM programs ORDER BY file_name ASC;"
    )->fetchAll();
  };
} else {
  $records_test = exec_sql_query(
    $db,
    "SELECT
        programs.id AS 'programs.id',
        programs.file_name AS 'file_name',
        programs.file_ext AS 'file_ext',
        programs.name AS 'name',
        programs.city AS 'city'
        FROM programs ORDER BY file_name ASC;"
  )->fetchAll();
};




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="/public/styles/site.css" />
  <title> <?php echo $title; ?> </title>
</head>

<body>
  <header>
    <!-- /* Source for header images:https://www.directferries.com/news/201901/get_up_to_25_off_ferries_to_holland.htm */ -->
    <div class="title-container">
      <h1 class="title"> <?php echo $title; ?> </h1>
    </div>
  </header>
  <nav>
    <ul>
      <li> <a href="/"> All Programs</a></li>

      <!-- only show insert if logined in  -->
      <?php if (is_user_logged_in()) { ?>
        <li> <a href="/insert">Edits</a></li>
      <?php } ?>

      <!-- only show login if user Isn't logged in -->
      <?php if (!is_user_logged_in()) { ?>
        <li><a href="/login"> Log In</a> </li>
      <?php } ?>
      <?php if (is_user_logged_in()) { ?>
        <li><a href="<?php echo logout_url(); ?>">Log Out</a></li>
      <?php } ?>
    </ul>

  </nav>
  <form>
    <div class="tags flex-row" id="tags">
      <div class="left label-inputr">
        <label for="filter-con-term"> Filter:</label>
        <select id="filter-con-term" name="filter-con-term" class="left">
          <option value="00"> Choose </option>
          <option value="3"> Europe </option>
          <option value="4"> Asia </option>
          <option value="5"> Africa</option>
          <option value="6"> South America </option>
          <option value="7"> North America </option>
          <option value="8"> Australia </option>
          <option value="9"> Antartica </option>
          <option value="1"> Fall </option>
          <option value="2"> Spring </option>
          <option value="10"> Summer</option>
          <option value="11"> Winter </option>
        </select>
      </div>



      <div class="left">
        <a class="sort" href="/? <?php http_build_query(array(
                                    'filter-term' => $_GET['filter-term'],
                                    'filter-continent' =>  $_GET['filter-continent']
                                  )) ?>">

          <button type="submit" value="filter" name="filter">Filter</button> </a>

      </div>
    </div>
  </form>

  <main class="flex-wrap">
    <div class="">

      <ul class="flex-row">
        <?php
        foreach ($records_test as $record) {
          $file_url = '/public/uploads/programs/' . $record['programs.id'] . '.' . $record['file_ext'];
        ?>
          <li class="flex-col">

            <a href="/details?<?php echo http_build_query(array(
                                'id' => ($record['programs.id'])
                              )) ?>">
              <img src="<?php echo htmlspecialchars($file_url); ?>" alt="<?php echo htmlspecialchars($record['file_name']); ?>"> </a>

            <h5><?php echo htmlspecialchars($record['city']) ?></h5>
            <h4><?php echo htmlspecialchars($record['name']) ?></h4>
          </li>

        <?php }
        ?>
      </ul>
    </div>
  </main>


  <footer>
    <p> Citation: All information is taken from: <cite>
        <a href="https://abroad.globallearning.cornell.edu/discover-programs"> https://abroad.globallearning.cornell.edu/discover-programs </a> </cite> </p>
  </footer>

</body>

</html>
