<?php

namespace Stratedge\Mayday\Tests\Handlers\Generic;

use Exception;
use Stratedge\Mayday\Handlers\Generic;
use Stratedge\Mayday\Tests\TestCase;

class IsTest extends TestCase
{
    public function testReturnsTrue()
    {
        $this->assertTrue(Generic::is(new Exception()));
    }
}
