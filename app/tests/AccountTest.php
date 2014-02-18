<?php

use LaraBank\Account;
use LaraBank\Converter;
use Mockery as m;

class AccountTest extends PHPUnit_Framework_TestCase {
	public function tearDown()
	{
		m::close();
	}

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

	public function testDisplayAmountMessageTypeUSD()
	{
		$account = new Account('Hao', 10, new Converter());
		$this->assertEquals('You have 23 USD', $account->displayAmount('USD'));
	}

	public function testDisplayAmountMessageTypeUSDMockedConverter()
	{
		$converter = m::mock('\LaraBank\Converter');
		$account = new Account('Hao', 10, $converter);
		$converter->shouldReceive('convertDogecoinToUSD')->once()->andReturn(40);
		$this->assertEquals('You have 40 USD', $account->displayAmount('USD'));
	}

}