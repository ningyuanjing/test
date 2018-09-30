<?php
/**
 * Created by PhpStorm.
 * User: MGZ2018051117B
 * Date: 2018/9/27
 * Time: 13:41
 */
//连接本地 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1',6379);
$redis->auth("ning@123");
echo "Connection to server sucessfully"."<br>";
//设置 redis 字符串数据
$redis->set("user","abc");
// 获取存储的数据并输出
echo "Stored string in redis:: " . $redis->get("user");