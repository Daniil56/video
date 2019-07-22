<?php

use Step\Acceptance\UserJoin;

$I = new UserJoin($scenario);
$I->wantTo('perform actions and see result');

$dog = $I->imagineDogUser();
$fox = $I->imagineFoxUser();
print_r($dog);
