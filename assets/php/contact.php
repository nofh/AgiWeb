<?php
require_once '../vendor/swiftmailer/swiftmailer/lib/swift_required.php';

// conf
$url_page = $_SERVER['HTTP_HOST'] . '~dendev/agiweb/_counter/contact';
//$url_page = 'http://' . $_SERVER['HTTP_HOST'] . '/agiweb/contact';

// recup
$concerne = ( ! empty( $_REQUEST['concerne'] ) ) ? $_REQUEST['concerne']: 'infos';
$mail_contact = ( ! empty( $_REQUEST['mail_contact'] ) ) ? $_REQUEST['mail_contact']: false;
$texte_contact = ( ! empty( $_REQUEST['texte_contact'] ) ) ? $_REQUEST['texte_contact']: false;

$tel_contact = ( ! empty( $_REQUEST['tel'] ) ) ? $_REQUEST['tel']: 'NaN';
$nom_contact = ( ! empty( $_REQUEST['nom_contact'] ) ) ? $_REQUEST['nom_contact']: 'NaN';

$date_envoi = date( 'd/m/Y H:m:s' );

$infos = PHP_EOL . PHP_EOL . PHP_EOL . 'INFOS'.PHP_EOL 
        . "---------------- ----------------" . PHP_EOL
	. "Sujet           : $concerne "      . PHP_EOL
	. "Date            : $date_envoi "    . PHP_EOL
	. "Mail Contact    : $mail_contact "  . PHP_EOL
	. "Nom Contact     : $nom_contact "   . PHP_EOL
	. "Tel/Gsm Contact : $tel_contact "   . PHP_EOL
	. "---------------- ----------------" . PHP_EOL;

// envoi mail
if( $mail_contact && $texte_contact )
{
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.agiweb.be', 587)
  ->setUsername('infos@agiweb.be')
  ->setPassword('njk23+ml');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create the message
$message = Swift_Message::newInstance()

  // Give the message a subject
  ->setSubject( $concerne )

  // Set the From address with an associative array
  ->setFrom(array( $mail_contact => $mail_contact ) )

  // Set the To addresses with an associative array
  ->setTo(array('infos@agiweb.be' => 'agiweb'))

  // Give it a body
  ->setBody( $texte_contact . $infos );

// Send the message
$result = $mailer->send($message);
}
else
{
	echo "<h1> Erreur lors d'envoi du mail, texte ou adresse non valide. <br> Votre mail n'à pas put etre envoyer.<br> Notre adresse mail est infos@agiweb.be.</h1>";
	sleep( 3 );
}

header('Location: http://'. $url_page );


?>
