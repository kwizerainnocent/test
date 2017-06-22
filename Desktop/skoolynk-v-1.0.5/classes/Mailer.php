<?php 
class Mailer
{
	public function sendMail($email, $code)
	{
		$string="<!DOCTYPE html>
				<html>
					<style>
						#table{ border:2px solid #eef; width:90%; margin:auto; padding:0px;}
						hr{boreder:1px solid #eee; }
						th{ background:#eef; color: green; padding:10px;}
						font{ color:green; display:block; font-weight:bold;  }
					</style>
					<body>
						<table id='table'>
							 <tr>
								<th colspan='2'>Skoolynk verification code</th>
							 </tr>
							 <tr>
								<td colspan='2'>
									<font>Welcome to SKOOLYNK</font>
									<p>Some text ........</p>
									Your verification code is <br/>Code: ".strtoupper($code)." <hr/>
								</td>
							 </tr>
							 <tr>
								<td></td>
								<td>Design by <a href='htttp://www.xaexia.com'>xaexia</a></td>
							 </tr>
						</table>
					</body>
				</html>";
				$to = $email; 
				$subject =  "Verification Code\r\n";
				$headers  = "Reply-To: info@skoolynk.com\r\n Organization: SKOOLYNK";
				$headers .= "From: info@skoolynk.com\r\n Organization: SKOOLYNK ";
			    mail($to, $subject, $string, $headers);
		return true;
	}
}
?>