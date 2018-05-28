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
    protected static $_instances = [];

    protected $instanceKey;

    public static function getInstance($key = null, $refresh = false)
    {
        if (!isset($key)) {
            $key = get_called_class();
        }

        if (!$refresh && isset(static::$_instances[$key]) && static::$_instances[$key] instanceof static) {
            return static::$_instances[$key];
        }

        $client = new static();
        $client->instanceKey = $key;
        return static::$_instances[$key] = $client;
    }

    /**
     * @desc   回收单例对象
     * @author limx
     */
    public function flushInstance()
    {
        unset(static::$_instances[$this->instanceKey]);
    }
}
