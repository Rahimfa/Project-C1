<?php

namespace app\tests\functional;

use app\models\User;
use FunctionalTester;
use Yii;

class PostsCest
{
    private $testUser;

    public function _before(FunctionalTester $I)
    {
        // Assume testUser is authenticated
        $this->testUser = User::findOne(1);
        $I->amLoggedInAs($this->testUser);
    }

    public function testIndexPage(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Tasks Board', 'h1');
       
    }

    public function testCreateTask(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Tasks Board', 'h1');
        $I->seeLink('Create Task');
        $I->click('Create Task');
        $I->see('Create Task', 'h1');

    }


}