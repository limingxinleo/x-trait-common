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
use Tests\App\Ins3;
use Tests\App\Ins4;
use Tests\App\Time;
use Tests\TestCase;

class InstanceTest extends TestCase
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
        Ins1::getInstance()->flushInstance();
    }

    public function testKeyCase()
    {
        $client = Ins1::getInstance('key1');
        $client2 = Ins1::getInstance('key2');

        $this->assertArrayHasKey('key1', $client->instances());
        $this->assertArrayHasKey('key2', $client->instances());

        $this->assertEquals($client, $client->instances()['key1']);
        $this->assertEquals($client2, $client->instances()['key2']);

        $client3 = Ins2::getInstance('key3');
        $this->assertArrayHasKey('key3', $client3->instances());

        $this->assertArrayNotHasKey('key3', $client->instances());
        $this->assertArrayNotHasKey('key1', $client3->instances());

        $client->flushInstance();
        $client2->flushInstance();
        $client3->flushInstance();

        $this->assertFalse(isset($client2->instances()['key1']));
    }

    public function testFlush10000000Case()
    {
        for ($i = 0; $i < 10000000; $i++) {
            $client = Ins1::getInstance($i);
            $client->flushInstance();
        }
        $this->assertEquals(1, count(Ins1::getInstance()->instances()));
    }

    public function testInstanceWhenExtends()
    {
        Ins2::getInstance()->flushInstance();

        $client = Ins3::getInstance();
        $client2 = Ins4::getInstance();

        $this->assertEquals('ins3', $client->str());
        $this->assertEquals('ins4', $client2->str());

        $this->assertEquals('ins3', Ins3::getInstance()->str());
        $this->assertEquals('ins4', Ins4::getInstance()->str());

        $this->assertEquals(2, count(Ins3::getInstance()->instances()));
        $this->assertEquals(2, count(Ins4::getInstance()->instances()));
        $this->assertEquals(Ins3::getInstance()->instances(), Ins4::getInstance()->instances());
    }

    public function testInstanceRefresh()
    {
        $client = Time::getInstance();
        $client2 = Time::getInstance();
        $client3 = Time::getInstance(null, true);

        $this->assertEquals($client->time, $client2->time);
        $this->assertTrue($client3->time > $client2->time);
    }
}
