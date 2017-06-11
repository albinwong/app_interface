<?php

// 让crontab定时执行的脚本程序 */5 * * * * /usr/bin/php /data/www/app/cron.php

	// 获取cate表中6条数据

	require_once('./db.php');
	require_once('./file.php');
	$sql = "select * from cates where status = 1 order by pid desc";

	try{
		$connect = Db::getInstance()->connect();
	}catch(Exception $e){
		file_put_contents('./logs/'.date('y-m-d').'.txt', $e->getMessage(),FILE_APPEND);
		return;
	}
	$result = mysql_query($sql,$connect);
	$cates = [];
	while($cate = mysql_fetch_assoc($result)){
		$cates[] = $cate;
	}
	$file = new File;
	// 如果存在写缓存
	if($cates){
		$file->cacheData('index_cron_cache',$cates);//永久生效 覆盖
	}else{
		file_put_contents('./logs/'.date('y-m-d').'.txt','没有相关数据',FILE_APPEND);
	}
	return;