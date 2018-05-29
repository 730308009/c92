<?php
$config = [
    'host' => 'localhost',
    'dbname' => 'c92',
    'username' => 'root',
    'password' => 'cyk850429000',
];

//由于当前文件是被自动加载的,优先于模块中的控制器,方法,所以可以先在这里调用Model类里的一个方法,用来接收连接数据库的配置项
//getConfig()方法是否静态,取决于自己,如果写成静态方法,可以静态调用,如果写成非静态方法,只能实例化调用,所以这个方法不是一定写成静态方法

//调用静态方法
//\core\model\Model::getConfig($config);
//调用非静态方法
(new \core\model\Model())->getConfig($config);




?>