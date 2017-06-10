<?php

class File{
	private $_dir;
	const EXT = '.txt';
	public function __construct(){
		$this->_dir = dirname(__FILE__).'/files/';
	}
	public function cacheDate($key,$value= '',$path = ''){
		$filename = $this->_dir.$path.$key. self::EXT;
		if(!empty($value)){
			//将value值写入缓存
			$dir = dirname($filename);
			if(!is_dir($dir)){//判断目录是否存在
				mkdir($dir,0777);
			}

			return file_put_contents($filename, json_encode($value));
		}
	}
}
