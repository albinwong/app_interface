<?php

// 单例模式连接数据库
class Db{
	static private $_instance;
	static private $_connectSource;
	private $_dbConfig = [
		'host' => '127.0.0.1',
		'user' => 'root',
		'password' => '',
		'database' => 'shop'
	];
	private function __construct(){

	}
	static public function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function connect(){
		if(!self::$_connectSource){
			self::$_connectSource = mysql_connect($this->_dbConfig['host'],$this->_dbConfig['user'],$this->_dbConfig['password']);
			if(!self::$_connectSource){
				throw new Exception('mysql connect error'.mysql_error(), 1);
			}
			mysql_select_db($this->_dbConfig['database'],self::$_connectSource);
			mysql_query('set names UTF8',self::$_connectSource);
			//mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", self::$_connectSource);
		}
		return self::$_connectSource;
	}
}

/*$connect = Db::getInstance()->connect();
$sql = 'select * from cates';
$result = mysql_query($sql,$connect);
echo mysql_num_rows($result);
var_dump($connect);*/
