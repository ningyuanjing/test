<?php
/**
 * Created by PhpStorm.
 * User: MGZ2018051117B
 * Date: 2018/9/27
 * Time: 14:32
 */
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth("ning@123");
echo "Connection to server sucessfully";
// 获取数据并输出
$arList = $redis->keys("*");
echo "Stored keys in redis:: ";
print_r($arList);