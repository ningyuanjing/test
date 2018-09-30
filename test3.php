<?php
/**
 * Created by PhpStorm.
 * User: MGZ2018051117B
 * Date: 2018/9/27
 * Time: 15:21
 */
//连接本地的 Redis 服务
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully"."<br>";
$redis->auth("ning@123");
$key = "myhash";
//设计redis哈希数据
$redis->del($key);
$redis->hset($key,'favorite_fruit','cherry');

$array_hmset = [
    'pats' => 'dog',
    'fruit' => 'cherry',
    'job' => 'programmer'
];
$redis -> hMset($key,$array_hmset);
// 获取存储的数据并输出
$arHash = $redis->hGetAll($key);
echo "Stored string in redis"."<br>";
print_r($arHash);