<?php
$name = strip_tags($_POST["contact_name"]);
$email = strip_tags($_POST["contact_email"]);
$sub = strip_tags($_POST["contact_sub"]);
$phone = strip_tags($_POST["contact_phone"]);
$msg = strip_tags($_POST["contact_message"]);

$to_email = "biuro@atabit.pl";
$subject = "Wiadomość od: $name -- $email";
$thanks_page = "kontakt.php";
$contact_page = "kontakt.php";

$headers = "Od: ".$email."\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$email_body = 
    '<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<style type="text/css">
	#outlook a {padding:0;}
	body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;} /* force default font sizes */
	.ExternalClass {width:100%;} .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Hotmail */
	a:active, a:visited, a[href^="tel"], a[href^="sms"] { text-decoration: none; color: #000001 !important; pointer-events: auto; cursor: default;}
	table td {border-collapse: collapse;}
	</style>
 </head>
	 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="margin: 0px; padding: 0px; background-color: #FFFFFF;" bgcolor="#FFFFFF">
		 <table bgcolor="#FFF" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
			 <tr>
				 <td>
					 <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
						 <tr>
							 <td valign="top" style="padding-top:30px;">
								 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
								   <tr>
										 <td align="center" style="font-size:2em;">
											<img src="http://www.atabit.pl/images/logo.png">
										 </td>
									</tr>
								   <tr width="20px" height="1px" bgcolor="#DD0B09" style="padding-bottom:20px;"><td></td></tr>
									 <tr>
										 <td align="center" style="font-size:2em; padding:20px 0;">
											FORMULARZ KONTAKTOWY
										 </td>
									</tr>
									<tr>
										 <td style="padding-top:10px;">
											<strong>Wiadomość od:</strong> '. $name . '
										 </td>
									</tr>
									<tr>
										 <td style="padding-top:10px;">
											<strong>Wiadomość z adresu:</strong> '. $email . '
										 </td>
									</tr>
									<tr>
										 <td style="padding-top:10px;">
											<strong>Telefon kontaktowy:</strong> '. $phone . '
										 </td>
									</tr>
									<tr>
										 <td style="padding-top:10px;">
											<strong>Temat:</strong> '. $sub . '
										 </td>
									</tr>
									<tr>
										 <td style="padding-top:10px;">
											<strong>Treść wiadomości:</strong> '. $msg . '
										 </td>
									</tr>
								 </table>
							 </td>
						 </tr>
					 </table>
				 </td>
			 </tr>
		 </table>
	 </body>
 </html>';

if( mail($to_email, $subject, $email_body, $headers) ) {	
    echo '<div class="form-msg"> <i class="glyphicon glyphicon-ok"></i> Dziękujemy, ' .$name. '. Twoja wiadomość została wysłana. </div>';
} else {	
    echo '<div class="form-msg-error"> <i class="glyphicon glyphicon-remove"></i> Przepraszamy, ' .$name. '. Twoja wiadomość nie została wysłana. Spróbuj ponownie! </div>';
}
die()
?>
