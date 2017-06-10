<?php
/**
 * PHP操作Redis  
 *  1. 安装phpredis扩展   
 *  2. PHP连接Redis服务-connect(127.0.0.1,6379)  
 *  3. set 设置缓存  
 *  4. get 获取缓存
 * @var Redis
 */
	// 设置缓存
	$redis = new Redis();
	$redis->connect('127.0.0.1',6379);
	$redis->set('key',123);

	$redis->setex('key2',15,'sadagsg');//15
