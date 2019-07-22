<?php
/**
 * Сценарий приемочного тестирования для video.localhost, где:
 * @params $I - экземляр класса AcceptanceTester принимающий сценарий тестирования.
 * @method void wantTo($text)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void amOnPage ($page)
 * @see \Codeception\Lib\InnerBrowser::amOnPage()
 */
$I = new AcceptanceTester($scenario);
$I->wantTo('Open the home/join/login pages');

$I->amOnPage('/');
$I->see('Welcome');

$I->seeLink('Join', '/site/login');
$I->seeLink('Login', '*ite/login');

$I->amOnPage('site/join');
$I->see('Join us', 'hi');

$I->amOnPage('/site/login');
$I->see('Log in', 'h1');