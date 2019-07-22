<?php
/**
 * Сценарий приемочного тестирования для video.localhost,
 * c тестами главной страницы, страницы регистрации и логина, где:
 * @params $I - экземляр класса AcceptanceTester принимающий сценарий тестирования.
 * @method void wantTo($text)
 * @method void am($role)
 * @method void amOnPage ($page)
 * @see \Codeception\Lib\InnerBrowser::amOnPage()
 */
$I = new AcceptanceTester($scenario);
$I->wantTo('Open the home/join/login pages');

$I->amOnPage('/');
$I->see('Welcome');

$I->seeLink('Join', '/user/join');
$I->seeLink('Login', '/user/login');

$I->amOnPage('site/join');
$I->see('Join us', 'h1');

$I->amOnPage('/user/login');
$I->see('Log in', 'h1');
