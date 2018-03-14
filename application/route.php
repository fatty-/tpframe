<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use \think\Request;
return [
	'__domain__' => [
		'www'=> 'frontend',
		'backend' => 'backend',
        'api' => 'api',
		// 泛域名规则建议在最后定义
		'*' => 'frontend',
	],
    '__pattern__' => [
        'name' => '\w+',
    ],

    'robot'=>'addon/execute?c=robot&a=index&m=application',
    
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
];
