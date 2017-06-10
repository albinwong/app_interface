<?php
/**
 *	PHP操作Memcache  
 *  1. 安装Memcache扩展   
 *  2. PHP连接Memcache服务-connect('127.0.0.1',11211)  
 *  3. set 设置缓存  
 *  4. get 获取缓存  
 */
	// 设置缓存
	$Memcache = new Memcache;
	$Memcache->connect('127.0.0.1',11211);

	/**
	 * 设置'key'对应值,使用即时压缩
	 * 失效时间50s
	 */
	$Memcache->set('key','some really big variable',MEMCACHE_COMPRESSED,50);

	$Memcache->get('key2');
