<?php

require_once("LoginModule.php");
require_once("DatabaseModule.php");

session_start();

$siteTitle = "MySite";
$siteHeader = "MySite!";
$siteLinks = array("Home","Buy","Links","About","Login","Logout");
$siteContent = "Welcome!";
$siteFooter = "Copyright &copy; 2013";

switch ($_REQUEST['link']) {
	case 'Home' : $siteContent = "This is the home page."; break;
	case 'Buy' : $siteContent = "On the buy page, you may buy things."; break;
	case 'Links' : $siteContent = "There will be links on this page."; break;
	case 'About' : $siteContent = "You guessed it. Here is what the site is about."; break;
	case 'Login' : $siteContent = LoginModule::login(new DatabaseModule()); break;
	case 'Logout' : $siteContent = LoginModule::logout(); break;
	default 	: $siteContent = $siteContent; break;
}

?>

<!doctype html>
<html>
	<head><title><?php echo "$siteTitle"; ?></title></head>
	<body>
		<table>
			<tr>
				<td valign="top">
					<h1><?php echo $siteHeader; ?></h1>
					<ul>
						<?php foreach ($siteLinks as $key => $link) {
							echo "<li><a href='index.php?link=$link'>$link</a></li>";
						} ?>
					</ul>
					<br />
				</td>
				<td><?php echo "$siteContent"; ?></td>
			</tr>
		</table>
		<hr />
		<?php echo "$siteFooter"; ?>
	</body>
</html>