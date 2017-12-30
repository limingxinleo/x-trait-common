<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Common;

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

    public function testKeyCase()
    {
        $client = Ins1::getInstance('key1');
        $client2 = Ins1::getInstance('key2');

        $this->assertArrayHasKey('key1', $client->instances());
        $this->assertArrayHasKey('key2', $client->instances());

        $this->assertEquals($client, $client->instances()['key1']);
        $this->assertEquals($client2, $client->instances()['key2']);

        $client->flushInstance();
        $this->assertFalse(isset($client2->instances()['key1']));
    }

    public function testFlush10000000Case()
    {
        for ($i = 0; $i < 10000000; $i++) {
            $client = Ins1::getInstance($i);
            $client->flushInstance();
        }
    }
}
