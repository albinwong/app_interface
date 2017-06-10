<?php 

$arr = array(
	"id"=>1,
	'name'=>'test',
);
$data = '输出json数据';
$newData = iconv('UTF-8','GBK',$data);//字符串的编码转换
echo $newData;
echo json_encode($newData);
