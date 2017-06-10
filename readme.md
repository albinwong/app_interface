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
    接口地址:(http://app.com/api.php?format=xml)  
    接口文件:(api.php处理一些业务逻辑)  
    ```
    <?php
    //获取首页数据
    ```
    接口数据
- APP如何进行通信  
                  发送http请求(http://api.com/index.php)
    客户端APP(C)==========================================服务器(S)
                        返回数据(现目前xml和json)  

- 通信格式区别  
- APP接口做的哪些事儿
#### 2. 封装通信接口方法  
#### 3. 核心技术  
#### 4. APP接口实例  
