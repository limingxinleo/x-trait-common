# x-trait-common
常用Trait集合

## 单例模式Trait
~~~php
<?php
use Xin\Traits\Common\InstanceTrait;

class Ins1
{
    use InstanceTrait;

    public function str()
    {
        return 'Ins1';
    }

    public function instance()
    {
        return static::$_instance;
    }
}

echo Ins1::getInstance()->str();
~~~
