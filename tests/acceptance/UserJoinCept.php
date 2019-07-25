<?php

use Step\Acceptance\UserJoin;

/**
 * Сценарий теста главной страницы video.localhost.
 * С использованием вспомогательного класса UserJoin и библиотерки фейкер
 * для генерации пользователей.
 * Сценарий создает двух пользователей fox и dog.
 * Каждый из них должен:
 * по очереди залогиниться и увидеться ошибку так как join не еще прошел;
 * пройти join;
 * повторный join c exception;
 * проверить взаимный login, logout
 * проверить вход по неверному паролю.
 */
$I = new UserJoin($scenario);
$I->wantTo('New users join and login');

$dog = $I->imagineFakerUser();
$fox = $I->imagineFakerUser();

$I->loginUser($dog);
$I->see("This e-mail does not registered");

$I->joinUser($dog);
$I->joinUser($fox);

$I->joinUser($fox);
$I->see("This e-mail already exist");

$I->loginUser($fox);
$I->isUserLogged($fox);
$I->noUserLogged($dog);
$I->logoutUser();

$I->loginUser($fox);
$I->isUserLogged($fox);
$I->noUserLogged($dog);
$I->logoutUser();
$dog["password"] = "wrong password";
$I->loginUser($dog);
$I->see("Wrong password");