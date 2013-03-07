<?php class LoginModule {
	public function LoginModule() {

	}
	private function getLoginForm() {
		return "<form action='index.php' method='post' target='_self'>"
		."<input type='text' name='Username' value='Username'>"
		."<input type='password' name='Password' value='Password'>"
		."<input type='hidden' name='link' value='Login'>"
		."<input type='submit'>"
		."</form>";
	}
	public static function logout() {
		$html = '';
		if (isset($_SESSION['Username'])) {
			$html = "Logged " . $_SESSION['Username'] . " out.";
			unset($_SESSION['Username']);
		} else {
			$html = "You are not logged in.";
		}
		return $html;
	}
	public static function login($database) {
		$html = '';
		if (isset($_SESSION['Username'])) {
			$html = "You are already logged in, " . $_SESSION['Username'];
		} else {
			if (!isset($_REQUEST['Username']) && !isset($_REQUEST['Password'])) {
				$html = self::getLoginForm();
			} else {
				$result = $database->getData("select * from users where uname = '".$_REQUEST['Username']."' and password = '".$_REQUEST['Password']."';");
				if (strcmp($_REQUEST['Username'],$result[0][1]) && strcmp($_REQUEST['Password'],$result[0][2])) {
					$_SESSION['Username'] = $_REQUEST['Username'];
					$html = "Welcome, " . $_SESSION['Username'];
				} else {
					$html = self::getLoginForm();
					$html .= "<br />* Username and Password incorrect.";
				}
			}
		}
		return $html;
	}
} ?>
