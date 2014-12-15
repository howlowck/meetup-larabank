<?php

use LaraBank\Account;
use LaraBank\Converter;
use Mockery as m;

class AccountTest extends PHPUnit_Framework_TestCase {
	public function tearDown() 
	{
		m::close();
	}
	public function testCreatedInstanceIsInstanceOfAccount()
	{
		$account = new Account('Hao', 30);
		$this->assertInstanceOf('LaraBank\Account', $account);
	}

	public function testDepositSuccessfullyAddsToAccount()
	{
		$account = new Account('Hao', 20);
		$account->deposit(30);
		$this->assertEquals(50, $account->getDogecoinsAmount());
	}

	public function testDisplayAmountIfUserHasNoAmount()
	{
		$account = new Account('Hao', 0);
		$this->assertEquals('Sorry, your account is empty at the moment', $account->displayAmount());
	}

	public function testDisplayAmountIfUserHasSomeAmount()
	{
		$account = new Account('Hao', 30);
		$this->assertContains('30 dogecoins', $account->displayAmount());
	}

	public function testDepositIfAmountIsLessThanZero()
	{
		$account = new Account('Hao', 20);
		$account->deposit(-10);
		$this->assertEquals(20, $account->getDogecoinsAmount());
	}

	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage give me
	 */
	public function testDepositIfAmountIsNotANumber()
	{
		$account = new Account('Hao', 20);
		$account->deposit('Give me Money!!!');
	}

	public function testDisplayAmountToUSD()
	{
		$account = new Account('Hao', 10);
		$converter = new Converter();
		$account->setConverter($converter);
		$msg = $account->displayAmount('USD');
		$this->assertContains('You have 25 USD', $msg);
	}
	public function testDisplayAmountToUSDMocked()
	{
		$account = new Account('Hao', 10);
		$converter = m::mock('\LaraBank\Converter');
		$converter->shouldReceive('convertDogecoinToUSD')->times(1)->andReturn(1000);
		$account->setConverter($converter);
		$msg = $account->displayAmount('USD');
		$this->assertContains('You have 1000 USD', $msg);
	}
}