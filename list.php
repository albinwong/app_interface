<?php
// http://app.com/list.php?page=1&pagesize=12
require_once('./response.php');
require_once('./db.php');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pagesize = isset($_GET['pagesize'])? $_GET['pagesize'] : 6;
if(!is_numeric($page) || !is_numeric($pagesize)){
	return Response::show(401,'数据不合法');
}

$offset = ($page - 1) *$pagesize;
$sql = "select * from cates where status = 1 order by pid desc limit ".$offset.",".$pagesize;
try{
	$connect = Db::getInstance()->connect();
}catch(Exception $e){
	return Response::show(403,'首页数据库连接失败');//$e->getMessage();避免暴露信息
}
$result = mysql_query($sql,$connect);
$cates = [];
while($cate = mysql_fetch_assoc($result)){
	$cates[] = $cate;
}
if($cates){
	return Response::show(200,'首页数据获取成功',$cates);
}else{
	return Response::show(400,'首页数据获取失败',$cates);
}