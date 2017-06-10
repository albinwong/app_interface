<?php

class File{
	private $_dir;
	const EXT = '.txt';
	public function __construct(){
		$this->_dir = dirname(__FILE__).'/files/';
	}
	/**
	 * [cacheDate description]
	 * @key  文件名
	 * @value 值
	 * @path  路径
	 * @EXT 后缀
	 * @return [type]        [description]
	 */
	public function cacheDate($key,$value= '',$path = ''){
		$filename = $this->_dir.$path.$key. self::EXT;
		if(!empty($value)){
			//将value值写入缓存
			$dir = dirname($filename);//获取目录

			//判断目录是否存在
			if(!is_dir($dir)){
				mkdir($dir,0777);
			}

			// 删除缓存
			if(is_null($value)){
				return unlink($filename);
			}

			// 生成缓存
			return file_put_contents($filename, json_encode($value));
		}

		if(!is_file($filename)){
			return false;
		}else{
			return json_decode(file_get_contents($filename),true);
		}
	}
}
