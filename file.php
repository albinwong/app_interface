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
	public function cacheData($key,$value= '',$cacheTime = 0){
		$filename = $this->_dir.$key. self::EXT;
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

			$cacheTime = sprintf('%011d',$cacheTime);

			// 生成缓存
			return file_put_contents($filename, $cacheTime.json_encode($value));
		}

		if(!is_file($filename)){
			return false;
		}
		$contents = file_get_contents($filename);
		$cacheTime = (int)substr($contents,0,11);//截取缓存有效时间
		$v = substr($contents,11);//获取缓存值
		if($cacheTime !=0 && $cacheTime + filemtime($filename) < time()){
			unlink($filename);
			return false;
		}
		return json_decode($v,true);
		
	}
}

//$file = new File;
// $file->cacheData('test1','serasdfadsgasd',180);
// $file->cacheData('test1');