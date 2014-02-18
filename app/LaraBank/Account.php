<?php namespace LaraBank;

class Account {
	protected $accountNumber;
	protected $userName;
	protected $dogecoins;

	public function __construct($userName, $amount)
	{
		$this->$userName = $userName;
		$this->$dogecoins = $amount;
	}

	public function getDogecoinsAmount()
	{

	}

	public function displayAmount($type)
	{

	}

	public function deposit($amount)
	{

	}

}