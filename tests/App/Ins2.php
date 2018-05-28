<?php
// +----------------------------------------------------------------------
// | Ins1.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\App;

use Xin\Traits\Common\InstanceTrait;

class Ins2
{
    use InstanceTrait;

    public function str()
    {
        return 'Ins2';
    }

    public function instance()
    {
        return static::$_instances[get_called_class()];
    }

    public function instances()
    {
        return static::$_instances;
    }
}
