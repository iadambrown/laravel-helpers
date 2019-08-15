<?php

namespace iAdamBrown\LaravelHelpers\Tests;

use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use iAdamBrown\LaravelHelpers\LaravelHelpersServiceProvider;

class HelpersTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    protected function setUp(): void
    {
        (new LaravelHelpersServiceProvider(null))->boot();
    }

    /** @test */
    public function carbon(): void
    {
        $this->assertInstanceOf(Carbon::class, carbon());
        $this->assertEquals(Carbon::parse('Jan 1 2017'), carbon('Jan 1 2017'));
    }

    /** @test */
    public function chain(): void
    {
        $mock = \Mockery::mock();
        $mock->shouldReceive('first')->once()->andReturn('first thing');
        $mock->shouldReceive('second')->once()->with('first thing');
        $mock->shouldReceive('third')->once()->andReturn('third thing');

        $result = chain($mock)->first()->second(carry)->third()();

        $this->assertEquals('third thing', $result);
    }

    /** @test */
    public function user(): void
    {
        $this->assertTrue(function_exists('user'));
    }
}
