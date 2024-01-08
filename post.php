<?
// Path to lib file with all the helper functions 
// \\172.16.16.156\e$\lib
require_once('/172.16.16.156/e$/lib/common.php');

// Validate Email. 
if (is_valid_email($_POST['email'])) {
  echo "Email is valid";
  $email = $_POST['email'];
} else { // redirect to index.php and use flashdata to display an error message if not valid. 
  echo "Invalid Email";
  //header('Location: index.php?error=invalid_email');
  exit; 
}


//Store the email in emails.php if it's valid. 

// Read the existing content of the file, unserialize it, and convert it to an array
$existingEmails = file_exists('emails.php') ? unserialize(file_get_contents('emails.php')) : [];

// Add the new email to the array
$newEmail = $email;
$existingEmails[] = $newEmail;

// Serialize the array and save it back to the file
file_put_contents('emails.php', serialize($existingEmails));


// Store the email contents here
$body = 'here\'s the link to your download <br/> <a href="./bg.zip">background sampler pack</a>';


html_email($email, 'info@acilab.com', ' Heres you free stuff!', $body );


// redirect to a success page.

?>