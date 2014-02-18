<?php namespace LaraBank;

class Account {
	protected $accountNumber;
	protected $userName;
	protected $dogecoins;

	public function __construct($userName, $amount)
	{
		$this->userName = $userName;
		$this->dogecoins = $amount;
	}

	public function getDogecoinsAmount()
	{
		return $this->dogecoins;
	}

	public function displayAmount($type = 'dogecoins')
	{

	}

	public function deposit($amount)
	{
		$this->dogecoins = $this->dogecoins + $amount;
	}

}