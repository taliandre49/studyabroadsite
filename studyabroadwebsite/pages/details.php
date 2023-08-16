<?php

$title = 'Details Page';
const STAR_RATING = array(
  1 => '★☆☆☆☆',
  2 => '★★☆☆☆',
  3 => '★★★☆☆',
  4 => '★★★★☆',
  5 => '★★★★★'
);

$input_id = $_GET['id'] ?? NULL;


$records = exec_sql_query(
  $db,
  "SELECT joint.tags_id AS 'tags.id',
  programs.name AS 'name',
  programs.city AS 'city',
  programs.rating AS 'rating',
  programs.requirment AS 'prereq',
  programs.file_ext AS 'file_ext',
  programs.majors AS 'majors',
  programs.descrip AS 'descrip',
  joint.programs_id as 'program_id'
   FROM joint LEFT JOIN programs ON (joint.programs_id = programs.id) WHERE (programs.id = $input_id);"
)->fetchAll();

$tag_identity = exec_sql_query(
  $db,
  "SELECT tags.identifier AS 'identifier' FROM tags"
)->fetchAll();






$img_url = '/public/uploads/programs/' . $input_id . '.' . $records[0]['file_ext'];



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
    <!-- /* citation for header images:https://www.directferries.com/news/201901/get_up_to_25_off_ferries_to_holland.htm */ -->
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
  <img class="imageresizedetails margin-top" alt="placeholder" src="<?php echo htmlspecialchars($img_url); ?>">
  <ul>


    <div class="tile">
      <div class="tile-header">
        <h3><?php echo htmlspecialchars(
              $records[1]['city']
            ); ?></h3>
        <h2><?php echo htmlspecialchars(
              $records[1]['name']
            ); ?></h2>
      </div>
      <p> Important Requirments: <?php echo htmlspecialchars(
                                    $records[1]['prereq']
                                  ); ?></p>
      <br />
      <p> Major(s) Supported: <?php echo htmlspecialchars(
                                $records[1]['majors']
                              ); ?></p>
      <br />
      <p> Overall Rating: <?php echo htmlspecialchars(STAR_RATING[$records[1]['rating']]); ?></p>
      <br />
      <p> About the Program: </p>
      <div class="margin-0">
        <p>
          <?php echo htmlspecialchars(
            $records[1]['descrip']
          ); ?></p>
      </div>
      <br />
      <p> Important Identifiers: </p>
      <ul>
        <?php foreach ($records as $record) { ?>

          <li class="tile">
            <div class="tile-header">
              <p><?php echo htmlspecialchars($tag_identity[$record['tags.id'] - 1]['identifier']); ?></p>
            </div>
          </li>

        <?php } ?>
      </ul>
    </div>

  </ul>
  <footer>
    <p> Citation: All information is taken from: <cite>
        <a href="https://abroad.globallearning.cornell.edu/discover-programs"> https://abroad.globallearning.cornell.edu/discover-programs </a> </cite> </p>
  </footer>
</body>

</html>
