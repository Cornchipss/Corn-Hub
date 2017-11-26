<!-- Developed by Cornchip -->
<!--
    Developed while listening to: https://www.youtube.com/watch?v=fr6KVNt-1Ek
	Hello fellow nerd :)
 -->
 
<?php

session_start();
$_SESSION['message'] = '';
$mysql = new mysqli('localhost', 'id3229446_cornchip', 'SuperWhaleKickOfDeath', 'id3229446_profiles') or alert('asdf');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($_POST['reg'] == 'on')
	{
		$uname = $mysqli->real_escape_string($_POST['uname']);
		$email = md5($_POST['pword']); // md5 hashes the pword for security
		$avatar_path = $mysqli->real_escape_string('images/' . $_FILES['avatar']['name']);
		
		// Make sure the file type is an image2wbmp
		if(preg_match("!image!", $_FILES['avatar']['type']))
		{
			// Copy the image to the images folder
			if(cpoy($_FILES['avatar']['tmp_name'], $avatar_path))
			{
				$_SESSION['uname'] = $uname;
				$_SESSION['avatar'] = $avatar_path;
				
				$sql = "INSERT INTO users (uname, pword, avatar) " .
							"VALUES ('$uname', '$pword', '$avatar_path')";
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<?php global $title; $title = ''; require('headinfo.php'); ?>
		
		<link rel="stylesheet" media="all" href="styles/main-page.css">
		
		<script type="text/javascript" src="js/holiday.js"></script>  <!-- For displaying the holidays -->
		<script type="text/javascript" src="js/bitcoin.js"></script>
	</head>
	
	<body>
		<?php include('holiday.php') ?>
		
		<div class="wrapper">
			<?php include('nav.php'); ?>
			
			<div class="main">
				<div class="col-sm-9">
					<h1 id="title">Corn Hub</h1>
					<p><!-- TODO: Customize w/ settings -->
						<span id="bitcoin">And they said free web hosting wasn't a thing!</span>
					</p>
					<!-- Where it all began -->
					<div class="main-img-list">
						<ul>
							<li id="main-list-img" title="School Home Page"><a href="http://journaling.clsd.net/hsfalcons/" target="_blank"><img src="images/falcon.png" alt="CLSD"></a></li>
							<li id="main-list-img" title="Skyward"><a href="https://skyward.clsd.net/scripts/wsisa.dll/WService=wsSky/seplog01.w" target="_blank"><img src="images/skyward.png" alt="Skyward"></a></li>
							<li id="main-list-img" title="Whitebox Learning - FCY4"><a href="http://www.whiteboxlearning.com/" target="_blank"><img src="images/whitebox.png" alt="Whitebox Learning"/></a></li>
							<li id="main-list-img" title="Turnitin"><a href="http://www.turnitin.com/" target="_blank"><img src="images/turnitin.jpg" alt="turnitin"></a></li>
							<li id="main-list-img" title="1:1 Student Hub"><a href="http://stud-sccm.hsonetone.clsd.net/CMApplicationCatalog/#/SoftwareLibrary/ApplistPageView.xaml" target="_blank"><img src="images/compooter.png" alt="1:1 Software"></a></li>
							<li id="main-list-img" title="HS Library"><a href="http://journaling.clsd.net/hs_library/" target="_blank"><img src="images/libwhite.png" alt="CCHS Library"></a></li>
							<li id="main-list-img" title="Mastery Connect"><a href="https://www.masteryconnect.com/" target="_blank"><img src="images/masteryB.jpg" alt="Mastery Connect Green"></a></li>
							<li id="main-list-img" title="Mastery Connect Bubble Sheet"><a href="https://app.masteryconnect.com/bubblesheet/" target="_blank"><img src="images/masteryS.png" alt="MasteryConnect"></a></li>
							<li id="main-list-img" title="Moodle"><a href="https://moodle.clsd.k12.pa.us/" target="_blank"><img src="images/moodle.png" alt="The moodle noodle"></a></li>
							<li id="main-list-img" title="USA Test Prep"><a href="http://www.usatestprep.com/member-login" target="_blank"><img src="images/usatp.png" alt="USA Test Prep"></a>
							<li id="main-list-img" title="One Drive"><a href="https://onedrive.live.com/about/en-us/" target="_blank"><img src="images/onedrive.jpg" alt="One Drive"></a></li>
							<li id="main-list-img" title="Office 365"><a href="https://login.microsoftonline.com/login.srf?wa=wsignin1.0&rpsnv=4&ct=1473620100&rver=6.7.6640.0&wp=MCMBI&wreply=https%3a%2f%2fportal.office.com%2flanding.aspx%3ftarget%3d%252fdefault.aspx&lc=1033&id=501392&msafed=0&client-request-id=7a651b3a-e515-4e06-b623-a5a85e0f24c1" target="_blank"><img src="images/Office.png" alt="Office 365"></a></li>
							<li id="main-list-img" title="Dropbox"><a href="https://www.dropbox.com/home" target="_blank"><img src="images/Dropbox.png" alt="Dropbox"></a></li>
							<li id="main-list-img" title="Google Drive"><a href="https://drive.google.com/drive/my-drive" target="_blank"><img src="images/gdrive.png" alt="Google Drive"></a></li>
							<li id="main-list-img" title="Wired"><a href="https://www.wired.com/" target="_blank"><img src="images/wired.jpg" alt="Wired"></a></li>
							<li id="main-list-img" title="Kahoot"><a href="https://kahoot.it/#/" target="_blank"><img src="images/kahoot.png" alt="Kahoot!"></a></li>
							<li id="main-list-img" title="Poety Out Loud"><a href="http://www.poetryoutloud.org/" target="_blank"><img src="images/pol.jpg" alt="Poetry Out Loud"></a></li>
							<li id="main-list-img" title="Quizlet"><a href="https://www.quizlet.com/" target="_blank"><img src="images/quizlet.png" alt="Quizlet"></a></li>
							<li id="main-list-img" title="Youtube"><a href="https://www.youtube.com/" target="_blank"><img src="images/youtube.png" alt="Youtube"></a></li>
							<li id="main-list-img" title="No Fear Shalespeare"><a href="http://nfs.sparknotes.com/romeojuliet/" target="_blank"><img src="images/nsf.jpg" alt="NFS"></a></li>
							<li id="main-list-img" title="GitHub"><a href="https://github.com/Cornchipss/Corn-Hub" target="_blank"><img src="images/github.png" alt="Github"></a></li>
							<li id="main-list-img" title="Ludum Dare"><a href="https://ldjam.com/" target="_blank"><img src="images/ludumdare.gif" alt="Ludum Dare"></a></li>
							<li id="main-list-img" title="Google"><a href="https://www.google.com/" target="_blank"><img src="images/google.jpg" alt="Google"></a></li>
							<li id="main-list-img" title="Sololearn"><a href="https://www.sololearn.com/" target="_blank"><img src="images/sololearn.jpg" alt="Sololearn"></a></li>
							<li id="main-list-img" title="Ed Puzzle"><a href="https://edpuzzle.com/" target="_blank"><img src="images/edpuzzle.png" alt="Ed Puzzle"></a></li>
							<li id="main-list-img" title="Skewlogy"><a href="https://app.schoology.com/login" target="_blank"><img src="images/skewlogy.png" alt="Skewlogy"></a></li>
						</ul>
					</div>
					
					<div class="center">
						<div id="Checkiday">
							<div id="Checkiday_Footer" class="checkiday">
								Holidays not loading ;(. Try reloading the page
							</div>
						</div>
					</div>
					
					<br>
					<div style="text-align: center;">
						<p style="font-size: 14px;">Powered By <a href="https://www.checkiday.com/" target="_blank">Checkiday.com</a>.</p>
					</div>
				</div>
				
				<div class="col-sm-3">
					<h3>Nice Things</h3>
					<ul>
						<li><h3 class="premium" onclick="alert('Pay Cornchip $5');"><b>Get Corn Hub Premium</b></h3></li>
						<li><a href="firefox.php"><b>Firefox not working? Click here!</b></h3></li>
						<li><a href="http://www.englishbanana.com/games/" target="_blank">English Banana</a></li>
						<li><a href="http://www.coolmath-games.com/" target="_blank">Coolmath</a></li> <!-- Ol' Faithful -->
						<li><a href="http://www.omfgdogs.com/" target="_blank">Doggo</a></li> <!-- So... many... doggos... -->
						<li><a href="lock.php">Fake Lock Screen</a></li> <!-- Stupid -->
						<li><a href="bsod.php">Fake BSOD</a></li> <!-- :> -->
						<li><a href="canvas.php">Cool Thing #1</a></li>
						<li><a href="canvas2.php">Cool Thing #2</a></li>
						<li><a href="settings.php">Settings [WIP]</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>