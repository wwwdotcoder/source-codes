<?php
//extract data from the post
$mobilenumber = $_REQUEST["mobilenumber"];
$varcode = $_REQUEST["varcode"];
$url = "https://OTPsender.com?enterpriseid=userID&subEnterpriseid=userID&pusheid=userID&pushepwd=uerID&msisdn=91".$mobilenumber."&sender=ID&msgtext=Dear Customer, Please enter the verification code ".$varcode." to submit your web enquiry";
$url = str_replace(' ', '%20', $url);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
exit;
?>