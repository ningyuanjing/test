<?php
/**
 * Created by PhpStorm.
 * User: MGZ2018051117B
 * Date: 2018/9/27
 * Time: 14:11
 */
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth("ning@123");
echo "Connection to server sucessfully" . "<br>";
$key = "tutorial-list";
//存储数据到列表中
$redis->del($key);
$redis->lpush($key, "Redis");
$redis->lpush($key, "Mongodb");
$redis->lpush($key, "Mysql");
// 获取存储的数据并输出
$arList = $redis->lRange($key, 0, -1);
echo "Stored string in redis" . "<br>";
print_r($arList);
