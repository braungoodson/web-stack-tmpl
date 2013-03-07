<?php class DatabaseModule {
	protected $username,$password,$server,$dbName,$linkId;
	public function DatabaseModule() {
		$this->username = 'MySite';
		$this->password = 'MySite';
		$this->server = 'localhost';
		$this->dbName = 'MySite';
		$this->linkId = null;
	}
	public function connect() {
		$this->linkId = mysql_connect($this->server,$this->username,$this->password,true,0);
		if (!$this->linkId) {
			die("* Fatal Error: Could not aquire link id.");
		} else {
			mysql_select_db($this->dbName,$this->linkId);
		}
	}
	public function disconnect() {
		mysql_close($this->linkId);
	}
	public function getData($sql) {
		self::connect();
		$queryResult = mysql_query($sql,$this->linkId);
		if (!$queryResult) {
			return false;
		}
		$n = 0;
		while ($row = mysql_fetch_array($queryResult,MYSQL_NUM)) {
			foreach ($row as $key => $value) {
				$matrix[$n][$key] = $value;
			}
			$n++;
		}
		self::disconnect();
		return $matrix;
	}
	public function setData($sql) {
		$queryResult = mysql_query($sql,$this->linkId);
		if (!$queryResult) {
			return false;
		} else {
			return true;
		}
	}
} ?>
