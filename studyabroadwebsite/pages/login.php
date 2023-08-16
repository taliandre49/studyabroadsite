<?php $title = "Log In" ?>
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
  <div class="login-insert">
    <p> Please login to add a new program: </p>
    <?php echo login_form('/insert', $session_messages);  ?>
  </div>
</body>

</html>
