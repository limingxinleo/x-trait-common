<?php
// +----------------------------------------------------------------------
// | InstanceTrait.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Traits\Common;

trait InstanceTrait
{
    protected static $_instance;

    public static function getInstance()
    {
        if (isset(static::$_instance) && static::$_instance instanceof static) {
            return static::$_instance;
        }

        return static::$_instance = new static();
    }
}