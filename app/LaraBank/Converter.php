<?php namespace LaraBank;

class Converter {
	protected $dogecoinToUSD;

	public function __construct($rate = 2.5)
	{
        $this->dogecoinToUSD = $rate;
	}

	public function convertDogecoinToUSD($amount)
	{
		return $amount * $this->dogecoinToUSD;
	}

    public function __toString()
    {
        return $this->dogecoinToUSD;
    }
}