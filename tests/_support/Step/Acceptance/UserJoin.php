<?php
namespace Step\Acceptance;

use AcceptanceTester;
use Faker\Factory;

class UserJoin extends AcceptanceTester
{

    public function imagineFakerUser()
    {
        $faker = Factory::create();
        $user = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker-> password
            ];
//        print_r($user);
        return $user;
    }


    public function joinUser($user)
    {
        $I = $this;
        $I->amOnPage('/user/join');
        $I->see('Join us');
        $I->fillField('UserJoinForm[name]', $user["name"]);
        $I->fillField('UserJoinForm[email]', $user["email"]);
        $I->fillField('UserJoinForm[password]', $user["password"]);
        $I->fillField('UserJoinForm[repassword]', $user["reapssword"]);
        $I->click('Create');



    }

    public function loginUser($user)
    {
        $I = $this;
        $I->click('Login');
    }

    public function logoutUser()
    {
        $I = $this;
        $I->click('Logout');

    }

    public function isUserLogged($user)
    {
        $I = $this;
    }

    public function noUserLogged($user)
    {
        $I = $this;
        $I->dontSee($user['name']);
    }

}