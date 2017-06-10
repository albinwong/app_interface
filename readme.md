#### PHP开发APP接口

#### 1. APP接口简介  
- APP接口介绍  
> PHP中面向对象接口定义   

```
/**
 * 定义一个接口
 * 提供一个标准
 */
interface video{
    public function getVideos();
    public function getCount();
}

class movie implements video(){
    public function getVideos(){
        echo 1;
    }
    public function getCount(){
        echo 2;
    }
}

movie::getVideos();
```

> APP接口(通信接口)---请求APP接口地址---返回接口数据---解析数据---客户端  

- 接口地址:(http://app.com/api.php?format=xml)  
- 接口文件:(api.php处理一些业务逻辑)  
- 接口数据
- APP如何进行通信  
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;返回数据发送http请求(`http://api.com/index.php`)  
    客户端APP(C)====================================服务器(S)  
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;返回数据(现目前xml和json)  

- 通信格式区别  

    1. XML:扩展标记语言(Extensible Markup Language,XML),可以用来标记数据、定义数据类型,是一种允许用户对自己的标记语言进行定义的源语言.XML格式统一,跨平台和语言,非常适合数据传输和通信  
        
    #### XML数据
        ```
        <?xml version="1.0" encoding="UTF-8"?>
        <item>
            <title>test</title>
            <test id="1"/>
            <description>test1</description>
            <address>Peking</address>
        </item>
        ```  

    2. JSON:JSON(Javascript Object Notation)一种轻量级的数据交换格式,具有良好的可读和便于快速编写的特性.可在不同平台之间进行数据交换.JSON采用兼容性很高的、完全独立于语言文本格式  
    `{"title":"test","from":"\u5728\u7eb\u6559\80b2\u7f51","description":"test1","address":"Peking"}`  

    3. 通信数据格式xml/json区别  
        1. 可读性 
        2. 生成数据方面  
        3. 传输速度  

- APP接口做的事  
    获取数据: 从数据库中缓存中获取数据,通过接口数据返回给客户端  
    提交数据: 通过接口提交数据给服务器,服务器入库处理,或者其他处理

#### 2. 封装通信接口方法  
1. JSON方式封装接口数据方法  
    1. PHP生成JSON数据  
    方法:json_encode()  
    注: 该函数只能接受==UTF-8==编码的数据,如果传递其他格式的数据该函数会返回NULL

    2. 通信数据标准格式  
    code 状态码(200.400等)  
    message 提示信息(邮箱格式不正确,数据返回成功等)  
    data 返回数据  
    3. JSON方式如何封装通信数据方法  

2. XML方式封装接口数据方法  
    1. PHP生成XML数据  
    (1) 组装字符串  
    (2) 使用系统类  
        - DomDocument
            ```
            <?php 
            $dom = new DOMDocument('1.0','utf-8');
            $element = $dom->createElement('test','This is the root element');
            $dom->appendChild($element);
            echo $dom->saveXML();
            
            <?xml version="1.0" encoding="utf-8"?>
            <test>This is the root element</test>
            ```
        - XMLWriter
        - SimpleXML
    2. XML方式如何封装通信数据方法  
    - 封装方法 `xmlEncode($code,$message="",$data= [])`
    - data 数据分析
    1. array('index'=> 'api');
    2. array(1,7,89);
3. 综合通信方式封装  
    封装方法: `show($code,$message,$data=[],$type='json');`

#### 3. 核心技术  
1. 缓存技术  
    1. 静态缓存  
        保存在磁盘上的静态文件,用PHP生成数据放入静态文件中
    2. Memcache.Redis缓存  
        1. Memcache和Redis都是用来管理数据的  
        2. 它们数据都是存放在内存里的  
        3. Redis可以定期将数据备份到磁盘(持久化)  
        4. Memcache只是简单的key/value缓存  
        5. Redis不仅仅支持简单的k/v类型的数据,同时还提供list.set.hash等数据结构的存储  
- Redis  
    Redis数据操作    
    1. 开启redis客户端  `redis-server 6379.conf`  开启客户端`redis-cli`
    2. 设置缓存之  `set index-cache '数据' `  
    3. 获取缓存数据  `get index-cache`
    4. 设置过期时间  `setex key 10 'cache'`//10s  
    5. 删除缓存  `del key`  
    
    PHP操作Redis  
    1. 安装phpredis扩展   
    2. PHP连接Redis服务-connect('127.0.0.1',6379)  
    3. set 设置缓存  
    4. get 获取缓存  
- Memcache
    PHP操作Memcache  
    1. 安装Memcache扩展   
    2. PHP连接Memcache服务-connect('127.0.0.1',11211)  
    3. set 设置缓存  
    4. get 获取缓存  
    
2. 定时任务  
#### 4. APP接口实例  
