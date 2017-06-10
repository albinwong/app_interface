<?php
require_once('./file.php');

// 从数据库获取数据
$data = array(
	'id' => 1,
	'name' => 'chungking',
	'type' => array(4,5,6),
	'test' => array(1,45,67=>array(123,'tst'),),
);

$file = new File;
if($file ->cacheDate('index_cache',$data)){
	echo "success";
}else{
	echo "failed";
}