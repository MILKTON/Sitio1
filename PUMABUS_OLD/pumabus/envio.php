<?
function ValidarDatos($campo){
    /*Array con las posibles cabeceras a utilizar por un spammer*/
    $badHeads = array("Content-Type:","MIME-Version:","Content-Transfer-Encoding:","Return-path:","Subject:","From:","Envelope-to:","To:","bcc:","link=","url=","cc:");
    /*Comprobamos que entre los datos no se encuentre alguna de las cadenas del array. Si se encuentra alguna cadena se dirige a una página de Forbidden*/
    foreach($badHeads as $valor){
      if(strpos(strtolower($campo), strtolower($valor)) !== false){
        echo "<p>Lo sentimos, no permitimos el spam en nuestro sitio. (Sorry, I don't allow spammers in my website)</p>";
        exit;
      }
    }
}

if (isset($_POST[nombre])) 
{
	ValidarDatos($_POST['nombre']);ValidarDatos($_POST['email']);ValidarDatos($_POST['mensaje']);
	$correo="<html><head></head><body><p style='font-family:Arial;font-size:12px;line-height:16px;'>
	Formulario de Contacto:<br /><br />
	<strong>Nombre/Empresa:</strong> $_POST[nombre]<br />
	<strong>E-mail:</strong> $_POST[email]<br /><br />
	<strong>Comentarios:</strong> ".ereg_replace("%u20AC","&euro;",$_POST[mensaje])."</p></body></html>";
	require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Host       = "smtp.gmail.com";
	$mail->Port       = 587;
	$mail->Username = "pumasclub09";
	$mail->Password = "Pum@sClub09";
	$body = "<html><head><style>p{font-family:Arial;font-size:12px}</style></head><body>$correo</body>";
	$mail->SetFrom($_POST[email],$_POST[nombre]);
	$mail->AddAddress("ehernandez@dgsg.unam.mx", "WebAdmin");
	$mail->Subject = "Formulario de Contacto";
	$mail->MsgHTML($body);
	$mail->Send();
}
?>