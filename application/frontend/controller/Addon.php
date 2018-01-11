<?php
/**
 * @link http://www.tpframe.com/
 * @copyright Copyright (c) 2017 TPFrame Software LLC
 * @author 510974211@qq.com
 */

namespace app\frontend\controller;
use tpfcore\Core;
use think\Response;
use tpfcore\helpers\StringHelper;
/**
 * 插件控制器
 */
class Addon extends FrontendBase
{


    /**
     * 插件基类构造方法
     */
    public function _initialize()
    {
        parent::_initialize();

        if(!array_key_exists("c", $this->param) || !array_key_exists("a", $this->param) || !array_key_exists("m", $this->param)){

            $this->jump([RESULT_ERROR,"你传递的参数有误",null]);            

        }
        $addon_name=ucfirst($this->param['c']);

        $cate_name=$this->param['m'];

        if(!Core::loadModel("Addon")->isInstall(['name'=>$addon_name,'type'=>$cate_name,'status'=>1])){

            $this->jump([RESULT_ERROR,"请先安装模块{$cate_name}下的{$addon_name}插件后再试",null]);
            
        }
    }

    /**
     * 执行插件控制器
     * catename  插件分类  控制模块  参数m
     * addon_name  插件名  根据控制器来确定
     * controller_name  控制器名  参数c来确定
     * action_name  控制器里-操作名  参数a
     * http://www.tpframe.com/addon/execute?c=qq&a=callback&m=login
     */
    public function execute($c = null, $a = null , $m = '')
    {

        $controller_name=StringHelper::s_format_class($c);

        $class_path = "\\".ADDON_DIR_NAME."\\$m\\".$c."\controller\\".$controller_name;

        $controller = new $class_path();

        $result = $controller->$a();

        if(is_array($result)){

            $this->jump($result);

        }
    }
}