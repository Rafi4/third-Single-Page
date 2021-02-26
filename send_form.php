<?php
header("content-type: application/json; charset=utf-8");
$name=isset($_POST['name']) ? $_POST['name'] : "";
$email=isset($_POST['email']) ? $_POST['email'] : "";
$phone=isset($_POST['phone']) ? $_POST['phone'] : "";
$message=isset($_POST['message']) ? $_POST['message'] : "";
if($name && $email && $phone && $message){
 $headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit";
 $message_body="Formularz kontaktowy wysłany ze strony www.ppiz.pl\n";
 $message_body.="Imię i nazwisko: $name\n";
 $message_body.="Adres email: $email\n";
 $message_body.="Numer telefonu: $phone\n\n";
 $message_body.=$message;
 if(mail("damian.pisera@ppiz.pl","Formularz kontaktowy",$message_body,$headers)){
 $json=array("status"=>1,"msg"=>"<p class='status_ok'>Twoj formularz zostal pomyslnie wyslany.</p>");
 }
 else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Wystapil problem z wyslaniem formularza.</p>"); 
 }
}
else{
 $json=array("status"=>0,"msg"=>"<p class='status_err'>Prosze wypelnic wszystkie pola przed wyslaniem.</p>"); 
}
echo json_encode($json);
exit;
?>