<?php
	// 获取缓存
	$redis = new Redis();
	$redis->connect('127.0.0.1',6379);
	var_dump(redis->get('key'));
	var_dump(redis->get('key2'));
