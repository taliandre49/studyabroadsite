<?php
$title = 'Insert New Program';


const STAR_RATING = array(
  1 => '★☆☆☆☆',
  2 => '★★☆☆☆',
  3 => '★★★☆☆',
  4 => '★★★★☆',
  5 => '★★★★★'

);
// seting maximum file size
define("MAX_FILE_SIZE", 1000000);

$upload_feedback = array(
  'general_error' => False,
  'too_large' => False
);



//only admins can upload a program
if (is_user_logged_in() && $is_admin) {


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
    $file_source = NULL;



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
        "INSERT INTO programs (name, city, rating, requirment, majors, descrip, file_name, file_ext, file_source) VALUES (:name, :city, :rating, :requirment, :majors, :descrip, :file_name, :file_ext, :file_source)",
        array(
          ':name' => $upload_name,
          ':city' => $upload_city,
          ':rating' => $upload_rating,
          ':requirment' => $upload_requirement,
          ':majors' => $upload_majors,
          ':descrip' => $upload_descrip,
          ':file_name' => $upload_file_name,
          ':file_ext' => $upload_file_ext,
          ':file_source' => $file_source
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
}

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

  <!-- // Access Controls - Interface: Only administrators : only be able to insert program if user is an admin an is logged in! -->

  <?php
  if (is_user_logged_in() && $is_admin) {
    // user is logged in and administrator, let them add a program record
  ?>

    <div class="form-filter">
      <div class="flex-col">
        <h2> Upload New Program </h2>

        <form action="/" method="post" enctype="multipart/form-data">

          <!-- MAX_FILE_SIZE must precede the file input field -->

          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">

          <div class="label-inputr">
            <label for="upload-file"> JPEG Image: </label>

            <input id="upload-file" type="file" name="jpeg-file" accept=" image/jpeg" class="left-space">
          </div>

          <div class="label-inputr">
            <label for="prog-name"> Program Name: </label>
            <input id='prog-name' type="text" name="prog-name" class="left-space">
          </div>
          <div class="label-inputr">
            <label for="prog-city"> Program Location: </label>
            <input id='prog-city' type="text" name="prog-city" class="left-space">
          </div>

          <div class="label-inputr">
            <label for="prog-require"> Requirments: </label>
            <input id='prog-require' type="text" name="prog-require" class="left-space">
          </div>

          <div class="label-inputr margin-top">
            <label for="rate"> Rating:</label>
            <select id="rate" name="rate">
              <option value="0"> choose </option>
              <option value="1"> 1 </option>
              <option value="2"> 2 </option>
              <option value="3"> 3</option>
              <option value="4"> 4 </option>
              <option value="5"> 5 </option>
            </select>
          </div>
          <div class="label-inputr">
            <label for="prog-majors"> Majors Supported: </label>
            <input id='prog-majors' type="text" name="prog-majors" class="left-space">
          </div>
          <div class="label-inputr">
            <label for="prog-descrip"> Description: </label>
            <textarea id='prog-descrip' name="prog-descrip" class="left-space"> </textarea>
          </div>
          <!-- <div class="tags flex-col" id="tags">
            <div class="flex-row-left label-inputr">
              <label for="continent"> Continent:</label>
              <select id="continent" name="continent" class="left">
                <option value="00"> choose </option>
                <option value="3"> Europe </option>
                <option value="4"> Asia </option>
                <option value="5"> Africa</option>
                <option value="6"> South America </option>
                <option value="7"> North America </option>
                <option value="8"> Australia </option>
                <option value="9"> Antartica </option>
              </select>
            </div>

            <div class="flex-row-left label-inputr">
              <label for="term"> Term:</label>
              <select id="term" name="term" class="left">
                <option value="000"> choose </option>
                <option value="1"> Fall </option>
                <option value="2"> Spring </option>
                <option value="10"> Summer</option>
                <option value="11"> Winter </option>
              </select>
            </div>

          </div> -->
          <div id="tags">
            <input type="checkbox" name="checktag[]" value="1" id="1" /> <label for="1" class="label-input"> Fall </label><br />
            <input type="checkbox" name="checktag[]" value="2" id="2" /><label for="2" class="label-input"> Spring </label><br />
            <input type="checkbox" name="checktag[]" value="3" id="3" /> <label for="3" class="label-input"> Europe </label><br />
            <input type="checkbox" name="checktag[]" value="4" id="4" /> <label for="4" class="label-input"> Asia </label><br />
            <input type="checkbox" name="checktag[]" value="5" id="5" /> <label for="5" class="label-input"> Africa </label><br />
            <input type="checkbox" name="checktag[]" value="6" id="6" /> <label for="6" class="label-input"> South America </label><br />
            <input type="checkbox" name="checktag[]" value="7" id="7" /> <label for="7" class="label-input"> North America </label><br />
            <input type="checkbox" name="checktag[]" value="8" id="8" /> <label for="8" class="label-input"> Australia </label><br />
            <input type="checkbox" name="checktag[]" value="9" id="9" /> <label for="9" class="label-input"> Antartica </label><br />
            <input type="checkbox" name="checktag[]" value="10" id="10" /><label for="10" class="label-input"> Summer </label><br />
            <input type="checkbox" name="checktag[]" value="11" id="11" /> <label for="11" class="label-input"> Winter </label><br />
          </div>


          <div class="align-right">
            <button type="submit" name="image-insert">Upload</button>
          </div>

        </form>
      </div>

    </div>
  <?php } else { ?>
    <div class="login-insert">
      <p> Please login to Add a program: </p>
      <?php
      echo login_form('/insert', $session_messages);

      ?>
    </div>
  <?php }
  ?>
</body>

</html>
