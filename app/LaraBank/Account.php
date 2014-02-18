<?php namespace LaraBank;

class Account {
	protected $accountNumber;
	protected $userName;
	protected $dogecoins;

	public function __construct($userName, $amount, Converter $converter = null)
	{
		$this->userName = $userName;
		$this->dogecoins = $amount;
		$this->converter = $converter;
	}

	public function getDogecoinsAmount()
	{
		return $this->dogecoins;
	}

	public function displayAmount($type = 'dogecoins')
	{
		if ($this->dogecoins == 0) {
			return 'Sorry, your account is empty at the moment';
		}
		if ($type == 'USD') {
			$usd = $this->converter->convertDogecoinToUSD($this->dogecoins);
			return "You have $usd USD";
		}
		return "You have {$this->dogecoins} dogecoins";
	}

	public function deposit($amount)
	{
		$this->dogecoins = $this->dogecoins + $amount;
	}

}