<?php namespace LaraBank;

class Converter {
	protected $dogecoinToUSD = 2.3;

	public function __construct()
	{

	}

	public function convertDogecoinToUSD($amount)
	{
		return $amount * $this->dogecoinToUSD;
	}
}