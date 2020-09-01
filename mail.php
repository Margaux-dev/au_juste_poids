<?php

// Vérification de remplissage des champs du formulaire
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['subject']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
}
  

// Définition des variables (en UTF-8 par défault)
$name = $_POST['name'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
   

// Création du mail et envoi du message
$to = 'contact@aujustepoids.com'; // Où envoyer le message
$email_subject = "$subject"; // Objet du message
$email_body = "Vous avez reçu un nouveau message depuis le formulaire de contact du site.\n\n"."Details:\n\nNom: $name\n\nEmail: $email_address\n\nMessage:\n$message"; // Corps du message
$headers = "From: contact@aujustepoids.com\n"; 

$headers .= 'From: Au Juste Poids <'."contact@aujustepoids.com".'>' . 
"\r\n" . 
'Reply-To:'.$email_address. "\r\n" . 
"Content-Type: text/plain; charset=\"utf-8\"\r\n" .'X-Mailer:PHP/'.phpversion(); // Permet de convertir les caractères spéciaux afin de les rendre visibles

mail ($to,$email_subject,$email_body,$headers); // Composition du mail
return true;			
?>