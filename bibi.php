<?php

/**
 * bibi — Manipulate bibi numbers from Deximalisation Project
 *
 * This file is part of the Deximalisation Project.
 *
 * @package   bibi
 * @author    Fauve <Fauve DOT ordinator AT taniere DOT info>
 * @copyright © 󰀇󰀍󰀎 ↔ 2015 — Fauve, Deximalisation Project.
 * @license   MIT http://opensource.org/licenses/mit-license.php
 *
 */

$decimal2bibinaryCorrespondence = [
    "HO", "HA", "HE", "HI",
    "BO", "BA", "BE", "BI",
    "KO", "KA", "KE", "KI",
    "DO", "DA", "DE", "DI"
];

class constructNewCharacter
{
	public $litteral;
	public $decimal;
	public $character;

	function __construct ($litteral, $decimal, $character)
	{
		$this->litteral  = $litteral;
		$this->decimal   = $decimal;
		$this->character = $character;
	}
}

$litt2dec2bibi = [
	new constructNewCharacter("HO",  0, "󰀀"),
	new constructNewCharacter("HA",  1, "󰀁"),
	new constructNewCharacter("HE",  2, "󰀂"),
	new constructNewCharacter("HI",  3, "󰀃"),
	new constructNewCharacter("BO",  4, "󰀄"),
	new constructNewCharacter("BA",  5, "󰀅"),
	new constructNewCharacter("BE",  6, "󰀆"),
	new constructNewCharacter("BI",  7, "󰀇"),
	new constructNewCharacter("KO",  8, "󰀈"),
	new constructNewCharacter("KA",  9, "󰀉"),
	new constructNewCharacter("KE", 10, "󰀊"),
	new constructNewCharacter("KI", 11, "󰀋"),
	new constructNewCharacter("DO", 12, "󰀌"),
	new constructNewCharacter("DA", 13, "󰀍"),
	new constructNewCharacter("DE", 14, "󰀎"),
	new constructNewCharacter("DI", 15, "󰀏"),
];

function hex2bibi($givenHexadecimalNumber)
{
	for ($i = 10; $i <= 15; $i++) {
		$j=dechex($i);
		//str_replace($j,$decimal2bibinaryCorrespondence[$i],$hexadecimalNumber);
		str_replace($j,$litt2dec2bibi["character"][$i],$givenHexadecimalNumber);
	}

	return $givenHexadecimalNumber;
}


function dec2bibi($givenDecimalNumber)
{
	$intermediateNumber=hex2bibi(dechex($givenDecimalNumber));

	return $intermediateNumber;
}
