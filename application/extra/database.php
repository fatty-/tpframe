<?php
$local_database=require("database-local.php");
/**
 * 配置文件
 */
$database=array(
    'type' => 'mysql',
    'hostname' => '127.0.0.1',
    'database' => 'git_tpframe',
    'username' => 'root',
    'password' => 'root',
    'hostport' => '3306',
    'prefix' => 'tpf_',
    
    'DATA_ENCRYPT_KEY'	=> 'fBkh2YYFpefEGTUQdg',
    'TPFRAME_VERSION'	=> 'TPFrame v1.00714',
);
return array_merge($database,$local_database);