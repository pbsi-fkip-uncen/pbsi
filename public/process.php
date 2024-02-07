<?php 
	function getPost($param) {
		return isset($_POST[$param]) ? $_POST[$param] : '';
	}

	require_once 'vendor/autoload.php'; 

	$apiKey = "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";

	header('Content-Type: application/json');

	$action = $_POST['action'];

	switch ($action) {

		case 'submit_enquiry':

			$fullname = getPost('name');
			$email = getPost('email');
			$adminEmail = getPost('adminEmail');
			$phone = getPost('phone');
			$comments = getPost('message');
			$comments = str_replace("\n", "<br>", $comments);
		
			$subject = "[ ] You have a new message.";
			
			$strEmailBody = file_get_contents('email/email_enquiry.html', FILE_USE_INCLUDE_PATH);

			$strEmailBody = str_replace("[NAME]", $fullname, $strEmailBody);
			$strEmailBody = str_replace("[EMAIL]", $email, $strEmailBody);
			$strEmailBody = str_replace("[PHONE]", $phone, $strEmailBody);
			$strEmailBody = str_replace("[COMMENTS]", $comments, $strEmailBody);

			// send the grid
			$from = new SendGrid\Email(null, $email);
			$to = new SendGrid\Email(null, $adminEmail);
			$content = new SendGrid\Content("text/html", $strEmailBody);
			$mail = new SendGrid\Mail($from, $subject, $to, $content);
			$sendgrid = new \SendGrid($apiKey);
			$response = $sendgrid->client->mail()->send()->post($mail);		

			$data = ['response' => 'success', 'message' => 'Your message has been submitted.' ];

			echo json_encode($data);
//			header("Location: thanks");
			exit;

			break;

		default:
			// do nothing
			break;
	}
