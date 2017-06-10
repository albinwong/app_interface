<?php
require_once('./response.php');

// 从数据库获取数据
$arr = array(
	'id' => 1,
	'name' => 'chungking',
	'type' => array(4,5,6),
	'test' => array(1,45,67=>array(123,'tst'),),
);

//Response::json(200,'数据返回成功',$arr);
// Response::show(200,'success',$arr,'array');