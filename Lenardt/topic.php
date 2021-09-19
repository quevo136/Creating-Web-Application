<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="SSH" />
	<meta name="keywords"    content="HTML, CSS, JavaScript" />
	<meta name="author"    content="Lenardt Fubex" />
	<title>TOPIC SSH</title>
	<link href ="style/style.css" rel= "stylesheet"/>
	
</head>

<body class="bground">

<?php include 'menu.inc'; ?>

<br>



<h2 class="Title"><span class="tag"> WHAT IS SSH? </span></h2>
	
<div class="content">	
	<div class="sub1 sub2bar sub3bar ">
	<p>SSH, or known as Secure Shell, is a network protocol that allows one computer to securely connect to another computer over an unsecured network, like the internet, by having a shared agreement of how to communicate. SSH is an application layer protocol, which is the 7th layer of the OSI model.
	SSH is really useful because you do not have to have physical access to another machine, you can simply connect to it over the internet. This allows us to control servers remotely.
	</p>
	</div>
</div>


<div class="outerSUB">	
		<h3><em>What are the uses of SSH?</em></h3>
	<ul>
		<li>providing secure access for users and automated processes</li>
		<li>interactive and automated file transfers</li>
		<li>issuing remote commands</li>
		<li>managing network infrastructure and other mission-critical system component</li>
	</ul>
</div>

<div class="outerSUB">
	<h3><em>What can we transfer with SSH?</em></h3>
	<ul>
		<li>Data</li>
		<li>Commands</li>
		<li>Text</li>
		<li>Files</li>
	</ul>
</div>

<div class="outerSUB">
<h3><em>How does SSH Work?</em></h3>
<p>
		SSH works by esbalishing the SSH client connecting to the SSH server. The SSH client will then connect and use public key cryptography to verify the identity of the SSH sever. After successful connection, SSH protocol will then use strong symetric encryption and hashing algorithms to ensure the privacy and integrity of the data that is being exchanged between the client and server.<br>
		The figure below explains the setup or procedure.

<figure>
		<img src="https://mercury.swin.edu.au/cos10011/s102245654/assign2/images/HOW.png" alt="ATC" class="picture" width="307" height="90">
</figure> 
</div>




<div class="outerSUB">
To keep SSH secure, there are three types of data manipulation techniques used which is:
		<ol>
		<li>Symmetrical Encryption
		<p> Symmetrical Encryption is a type of encryption where there is only one key to encrypt and decrypt electronic information
		</p>
		</li>
		
		<li>Asymmetrical Encryption
		<p> Symmetrical Enryption is a proccess that uses a pair of related keys known as public key and private key to encrypt and decrypt a message and prtect it from unauthorized access or use
		</p>
		</li>
		
		<li>Hashings
		<p> A hash function is used to map data of arbitrary size to  fixed-size values. The values returned by a hash function are ussually called hash values, hash codes or simply hashes. 
		</p>
		</li>
		
		</ol>
</div>



<h2 class="Title"><span class="tag"> Who developed it? When and why? </span></h2>
		<div class="content">
		<div class="sub2bar sub1">
		<p>
		Tatu Ylonen a researcher from Helsinki University of Technology was the first who designed the first version of protocol caused by a password-sniffing attack at his university network. The objective of Tatu Ylonen is to replace the TELNET protocols because it does not provide strong authentication nor guaranteed confidentiality. He then released his achievement as a freeware in July 1995 and this quickly gained popularity. At the end of 1995, SSH user bas has grown up to 20,000 users in the world
		</p>
		</div>
</div>



<h2 class="Title"><span class="tag">What are the related technologies? (Compare/contrast with other technologies) </span></h2>
		<div class="content">
		<div class=" sub4bar sub1">
		<p>
		Telnet are one of the related technolgies. Telnet and SSH are the general purpose client server application program and uses remote termial service where it allows user to interact at one site with a remote time-sharing system at another site when the user's ekyboard and display are connected directly to the remote machine. The main contrast between Telnet and SSH is Telnet is conventional protocol whereas SSH is the replacement for Telnet Protocol and SSH has more enhanced feature
		</p>
		</div>
</div>

<div class="outerSUB">
<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax">Basis for Comparison</th>
    <th class="tg-0lax">Telnet</th>
    <th class="tg-0lax">SSH</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Security</td>
    <td class="tg-0lax">Less Secured</td>
    <td class="tg-0lax">Highly Secured</td>
  </tr>
  <tr>
    <td class="tg-0lax">Uses Port Number</td>
    <td class="tg-0lax">23</td>
    <td class="tg-0lax">22</td>
  </tr>
  <tr>
    <td class="tg-0lax">Data Format</td>
    <td class="tg-0lax">Telnet transfer data in plain text</td>
    <td class="tg-0lax">Encrypted format is used to send data and also uses a secure channel</td>
  </tr>
  <tr>
    <td class="tg-0lax">Authentication</td>
    <td class="tg-0lax">No priveleges are provided for user authentication</td>
    <td class="tg-0lax">Uses public key encryption for authentication</td>
  </tr>
  <tr>
    <td class="tg-0lax">Suitability of Network</td>
    <td class="tg-0lax">Private networks are recommended</td>
    <td class="tg-0lax">Suitable for Public networks</td>
  </tr>
  <tr>
    <td class="tg-0lax">Vulnerablities</td>
    <td class="tg-0lax">Vulnerable to security attacks</td>
    <td class="tg-0lax">SSH has overcome many securtity issues of Telnet</td>
  </tr>
  <tr>
    <td class="tg-0lax">Bandwidth Usage</td>
    <td class="tg-0lax">Low</td>
    <td class="tg-0lax">High</td>
  </tr>
</tbody>
</table>
</div>


<footer>
		<?php include 'footer.inc'; ?>
</footer>

</body>
</html>