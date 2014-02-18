<?php

use LaraBank\Account;

class AccountTest extends PHPUnit_Framework_TestCase {
	public function testCreateNewAccountInstanceOfAccount()
	{
		$account = new Account('Hao', 30);
		$this->assertInstanceOf('LaraBank\Account', $account);
	}
	public function testDepositAddsAmountSuccess()
	{
		$account = new Account('Hao', 20);
		$account->deposit(30);
		$this->assertEquals(50, $account->getDogecoinsAmount());
	}
	public function testDisplayAmountMessageEmptyAmount()
	{
		$account = new Account('Hao', 0);
		$this->assertEquals('Sorry, your account is empty at the moment', $account->displayAmount());
	}
	public function testDisplayAmountMessageHasAmount()
	{
		$account = new Account('Hao', 20);
		$this->assertEquals('You have 20 dogecoins', $account->displayAmount());
	}
}