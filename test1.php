<?php
/**
 * Created by PhpStorm.
 * User: MGZ2018051117B
 * Date: 2018/9/27
 * Time: 14:11
 */
$link = mysqli_connect('localhost','root','','xscj');
if (!$link) {
    die("连接失败: " . mysqli_connect_error());
}
mysqli_query($link, "set names utf8");
$sql = "select sno,name from student";
$r = mysqli_query($link, $sql);

//$a = mysqli_fetch_all($r, SQLITE_ASSOC);
$res = [];
while ($a = mysqli_fetch_array($r,MYSQLI_NUM)) {
    $res[] = json_encode($a);
}
//foreach ($a as $item){
//    var_dump($item);exit;
//    $res[] = [
//        "sno" => $item["sno"],
//        "name" => $item["name"]
//    ];
//
//}
//echo(json_encode($res));exit;
//连接本地的 Redis 服务

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth("ning@123");
echo "Connection to server sucessfully" . "<br>";
$key = "xscj-list";
//存储数据到列表中
$redis->del($key);


$redis->hMset($key, $res);
//$redis->hSet($key,'sno', $res["sno"]);
//$redis->hSet($key,'name', $res["name"]);
//$redis->lpush($key, "Mongodb");
//$redis->lpush($key, "Mysql");
// 获取存储的数据并输出
//$arList = $redis->lRange($key, 0, -1);
$arList = $redis->hGetAll($key);
//$arList = json_encode($arList);

ksort($arList);
foreach ($arList as $key => $val) {
    $arList[$key] = json_decode($val);
}

echo "Stored string in redis" . "<br>";
var_dump($arList);
