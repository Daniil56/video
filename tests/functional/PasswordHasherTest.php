<?php

use app\models\UserRecord;
use Codeception\Test\Unit;

class PasswordHasherTest extends Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->assertTrue(true, 'False is not true');
        $userRecord =  UserRecord::findOne(1);
        $this->assertEquals("Ardith Johns", $userRecord->name, "John does not found");
    }
}