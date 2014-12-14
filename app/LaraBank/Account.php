<?php namespace LaraBank;

class Account {
	protected $accountNumber;
	protected $userName;
	protected $dogecoins;
	protected $converter;

	public function __construct($userName, $amount, $converter = null)
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
		if ($this->dogecoins === 0) {
			return 'Sorry, your account is empty at the moment';
		}
		if ($type === 'USD') {
			$usd = $this->converter->convertDogecoinToUSD($this->dogecoins);
			return "You have $usd USD";
		}
		return "You have {$this->dogecoins} dogecoins";
	}

	public function deposit($amount)
	{
		if ( ! is_numeric($amount)) {
			throw new \InvalidArgumentException('Hey! give me a number!');
		}

		if ($amount < 0)
		{
			return;
		}

		$this->dogecoins = $this->dogecoins + $amount;
	}

}