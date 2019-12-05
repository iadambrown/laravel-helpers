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

    /** @test */
    public function lbToKg(): void
    {
        $this->assertEquals(0.453592, lbToKg(1, 6));
        $this->assertEquals(2.26796, lbToKg(5, 5));
    }

    /** @test */
    public function kgToLb(): void
    {
        $this->assertEquals(2.20462, kgToLb(1, 5));
        $this->assertEquals(11.0231, kgToLb(5, 4));
    }

    /** @test */
    public function mmToIn(): void
    {
        $this->assertEquals(0.0393701, mmToIn(1, 7));
        $this->assertEquals(0.19685, mmToIn(5, 5));
    }

    /** @test */
    public function inToMm(): void
    {
        $this->assertEquals(25.4, inToMm(1, 1));
        $this->assertEquals(127, inToMm(5, 0));
    }

    /** @test */
    public function binarySearch(): void
    {
        // Generate an array.
        $array = range(0, 10);

        // Loop through the array, searching for each value.
        foreach ($array as $key => $value) {
            $this->assertSame(binarySearch($array, $value), $value);
        }

        // Search for values outside of the array.
        $this->assertNull(binarySearch($array, -1));
        $this->assertNull(binarySearch($array, 11));
    }

    /** @test */
    public function spacesBetweenCapitals(): void
    {
        $this->assertEquals('This Is A Test', spacesBetweenCapitals('ThisIsATest'));
        $this->assertEquals('this Is A Test', spacesBetweenCapitals('thisIsATest'));
    }

    /** @test */
    public function getInitials(): void
    {
        $this->assertEquals('AB', getInitials('Adam Brown'));
        $this->assertEquals('AB', getInitials('Adam Christopher Brown'));
    }
}
