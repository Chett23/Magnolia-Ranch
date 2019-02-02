<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "chesterehansen@gmail.com";
    $email_subject = "Magnolia Ranch Inquiry";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['moreinfo'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted. <a href="../HTML/contact.php">go back</a>');
    }



    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['moreinfo']; // required
	 $venue = $_POST['venue']; // not required
	 $coordinator = $_POST['coordinator']; // not required
	 $guests = $_POST['guests']; // not required
	 $date = $_POST['date']; // not required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

<!--Thank you for contacting us. We will be in touch with you very soon. <a href="../index.html">go back<a>-->

<?php

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Thank You! - Magnolia Ranch</title>
		<link rel="stylesheet" href="../CSS/master.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="../Resources/Images/MagnoliaRanch_icon.png">
	</head>
	<body>
		<!-- Header and topnav -->
		<a href="../index.html"><img class="center" src="../Resources/Images/MagnoliaRanch.jpg" alt="Magnolia"></a>
		<div class="topnav" id="myTopnav">
			<ul>
	  			<li><a href="../index.html">Home</a></li>
				<li class="dropdown">
    				<a href="javascript:void(0)" class="dropbtn">Portfolio</a>
    				<div class="dropdown-content">
      				<a href="../HTML/Portfolio_Kelley+Ed.html">Kelley & Ed</a>
      				<a href="../HTML/Portfolio_Carolyn+Andy.html">Carolyn & Andy</a>
      				<a href="../HTML/Portfolio_Diana+Steve.html">Diana & Steve</a>
      				<a href="../HTML/Portfolio_Alison+Matthew.html">Alison & Matthew</a>
      				<a href="../HTML/Portfolio_Leeann+Dan.html">Leeann & Dan</a>
    				</div>
  				</li>
				<!-- <li><a href="../HTML/Blog.html">Blog</a></li> -->
	 			<li><a href="../HTML/About.html">About</a></li>
	  			<li><a href="../HTML/Contact.html">Contact</a></li>
			</ul>
		</div>
		<div>
		<br><br><br>
		</div>

		<!-- Body -->
		<h3>Thank you for your inquiry!</h3>
		<p>We will follow up with you promptly.<br>
		Until then feel free to keep taking a look around <br>
		<a href="../index.html">Click here.</a>
		<br><br><br>
		</p>

	</body>

	<footer>
		<p><a href="https://www.instagram.com/magnoliaranch/"><i class="fa">&#xf16d;</i></a><a href="https://www.pinterest.com/MagnoliaRanchJH/?eq=magnolia%20ranch&etslf=2136"><i class="fa">&#xf0d3;</i></a>
			<br>Follow us on Instagram and Pinterest</p>
	</footer>
</html>
