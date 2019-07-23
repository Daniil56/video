<?php
namespace Step\Acceptance;

use Faker\Factory;

class UserJoin extends \AcceptanceTester
{

    public function imagineFakerUser()
    {
        $faker = Factory::create();
        $user = [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => $faker-> city
            ];
        print_r($user);
        return $user;
    }

    public function imagineFoxUser()
    {
        $nr = mt_rand(10000, 99999) .
            mt_rand(10000, 99999) .
            mt_rand(10000, 99999) ;
        $user = [
            'name' => 'fox' . $nr,
            'email' => 'fox' . $nr . '@gmail.com',
            'password' => 'qwas'
        ];
        return $user;    }

    public function joinUser($user)
    {
        $I = $this;
        $I->click('Join us');
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