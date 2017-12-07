<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Cli;

use Tests\App\Ins1;
use Tests\App\Ins2;
use Tests\TestCase;

class BaseTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBaseCase()
    {
        $this->assertEquals('Ins1', Ins1::getInstance()->str());
        $this->assertEquals('Ins2', Ins2::getInstance()->str());

        $ins1 = Ins1::getInstance();
        $this->assertEquals($ins1, Ins1::getInstance());
        $this->assertEquals($ins1, Ins1::getInstance()->instance());
    }


}