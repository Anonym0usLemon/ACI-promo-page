<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you!</title>
  <link rel="stylesheet" href="./styles/post.css">
</head>
<body>
<?
// Path to lib file with all the helper functions 
// \\172.16.16.156\e$\lib
define('LIB', "E:\\lib\\");
require_once(LIB . "common.php");

// // Validate Email. 
if (is_valid_email($_POST['email'])) {
  $email = $_POST['email'];

  // Store the email in emails.php if it's valid. 
  // Load existing emails from file if any
  $existingEmails = file_get_contents('emails.php');
  // Append the new email with a new line
  $newContent = $existingEmails . PHP_EOL . $email;
  // Write the new content back to the file
  file_put_contents('emails.php', $newContent);

  // Store the email contents here
  $body = 'here\'s the link to your download <br/> <a href="https://acilab.com/SPAC_2024/ACI_Background_Sampler.zip">background sampler pack</a>';
  html_email($email, 'info@acilab.com', 'ACI Background Sampler Pack', $body);

  echo '<div class="success-message">
          <h1>Thank You</h1>
          <p>We\'ve emailed you a link to download your backgrounds. Be sure to check your spam folder!</p>
        </div>'; 
} else { // redirect to index.php and use flashdata to display an error message if not valid. 
  echo "Invalid Email";
  //header('Location: index.php?error=invalid_email');
  exit;
}


?>
</body>
</html>
