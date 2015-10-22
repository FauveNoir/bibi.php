<?php

/**
 * bibi — Manipulate bibi numbers from Deximalisation Project
 *
 * This file is part of the Deximalisation Project.
 *
 * @package   bibi
 * @author    Fauve <contact@taniere.info>
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

//class constructNewCharacter
//{
	//public $litteral;
	//public $decimal;
	//public $character;

	//function __construct ($litteral, $decimal, $character)
	//{
		//$this->litteral  = $litteral;
		//$this->decimal   = $decimal;
		//$this->character = $character;
	//}
//}

//$litt2dec2bibi = [
	//new constructNewCharacter("HO",  0, "󰀀"),
	//new constructNewCharacter("HA",  1, "󰀁"),
	//new constructNewCharacter("HE",  2, "󰀂"),
	//new constructNewCharacter("HI",  3, "󰀃"),
	//new constructNewCharacter("BO",  4, "󰀄"),
	//new constructNewCharacter("BA",  5, "󰀅"),
	//new constructNewCharacter("BE",  6, "󰀆"),
	//new constructNewCharacter("BI",  7, "󰀇"),
	//new constructNewCharacter("KO",  8, "󰀈"),
	//new constructNewCharacter("KA",  9, "󰀉"),
	//new constructNewCharacter("KE", 10, "󰀊"),
	//new constructNewCharacter("KI", 11, "󰀋"),
	//new constructNewCharacter("DO", 12, "󰀌"),
	//new constructNewCharacter("DA", 13, "󰀍"),
	//new constructNewCharacter("DE", 14, "󰀎"),
	//new constructNewCharacter("DI", 15, "󰀏"),
//];

$litt2dec2bibi = [
	[ 'litteral' => 'HO',  'decimal' => ' 0',  'character' => '󰀀' ],
	[ 'litteral' => 'HA',  'decimal' => ' 1',  'character' => '󰀁' ],
	[ 'litteral' => 'HE',  'decimal' => ' 2',  'character' => '󰀂' ],
	[ 'litteral' => 'HI',  'decimal' => ' 3',  'character' => '󰀃' ],
	[ 'litteral' => 'BO',  'decimal' => ' 4',  'character' => '󰀄' ],
	[ 'litteral' => 'BA',  'decimal' => ' 5',  'character' => '󰀅' ],
	[ 'litteral' => 'BE',  'decimal' => ' 6',  'character' => '󰀆' ],
	[ 'litteral' => 'BI',  'decimal' => ' 7',  'character' => '󰀇' ],
	[ 'litteral' => 'KO',  'decimal' => ' 8',  'character' => '󰀈' ],
	[ 'litteral' => 'KA',  'decimal' => ' 9',  'character' => '󰀉' ],
	[ 'litteral' => 'KE',  'decimal' => '10',  'character' => '󰀊' ],
	[ 'litteral' => 'KI',  'decimal' => '11',  'character' => '󰀋' ],
	[ 'litteral' => 'DO',  'decimal' => '12',  'character' => '󰀌' ],
	[ 'litteral' => 'DA',  'decimal' => '13',  'character' => '󰀍' ],
	[ 'litteral' => 'DE',  'decimal' => '14',  'character' => '󰀎' ],
	[ 'litteral' => 'DI',  'decimal' => '15',  'character' => '󰀏' ]
];

function hex2bibi($givenHexadecimalNumber)
{
	$bibinariesedNumber=strtolower($givenHexadecimalNumber);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentHexDigit=dechex($currentDecDigit);
		$currentBibiChar=$GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];

		$bibinariesedNumber=str_replace($currentHexDigit, $currentBibiChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}

function bibi2hex($givenBibiNumber)
{
	$hexadecimalisedNumber=strtolower($givenBibiNumber);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentHexDigit=dechex($currentDecDigit);
		$currentBibiChar=$GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];

		$hexadecimalisedNumber=str_replace($currentBibiChar, $currentHexDigit, $hexadecimalisedNumber);
	}


	return $hexadecimalisedNumber;
}

function dec2bibi($givenDecimalNumber)
{
	$intermediateNumber=hex2bibi(dechex($givenDecimalNumber));

	return $intermediateNumber;
}


function alpha2bibi($givenDigitSuit)
{
	$bibinariesedNumber=strtoupper($givenDigitSuit);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentBibiDigitChar=$GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];
		$currentBibiDigitName=$GLOBALS['litt2dec2bibi'][$currentDecDigit]['litteral'];

		$bibinariesedNumber=str_replace($currentBibiDigitName, $currentBibiDigitChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}


function hex2fullLitteral($hexNumber)
{
	$hexNumber=str_replace(" ","",$hexNumber);
	$lengtOfNumber=iconv_strlen($hexNumber);
	$fullLitteral="";

	for ($currentRing=$lengtOfNumber ; $currentRing > 0 ; $currentRing--)
	{
		$reverseCurrentRing=$lengtOfNumber-$currentRing;
		if ($currentRing == 13)
		{
			$currentBigMagnitude="mixiard";
		}
		elseif ($currentRing == 9)
		{
			$currentBigMagnitude="mixion";
		}
		elseif ($currentRing == 5)
		{
			$currentBigMagnitude="manix";
		}
		else
		{
			$currentBigMagnitude="";
		}

		switch ($currentRing % 4)
		{
			case 0:
				$currentMagnitude="mix";
				break;

			case 1:
				$currentMagnitude="";
				break;

			case 2:
				$currentMagnitude="dex";
				break;

			case 3:
				$currentMagnitude="cenze";
				break;

			case 4:
				$currentMagnitude="mix";
				break;
		}

		if ($currentBigMagnitude != "")
		{
			$bigMagnitudeSeparator="-";
		}
		else
		{
			$bigMagnitudeSeparator="";
		}

		if ($currentMagnitude != "")
		{
			$magnitudeSeparator="-";
		}
		else
		{
			$magnitudeSeparator="";
		}

		if ( ($currentMagnitude != "") || ($currentBigMagnitude != "") )
		{
			$digitSeparator="-";
		}
		else
		{
			$digitSeparator="";
		}

		$currentBibiDigitName=strtolower($GLOBALS['litt2dec2bibi'][hexdec(substr($hexNumber, $reverseCurrentRing, 1))]['litteral']);

		if ($currentBibiDigitName == "ho")
		{
			$currentBibiDigitName="";
			$digitSeparator="";
			$currentMagnitude="";
			$magnitudeSeparator="";
		}

		$fullLitteral=$fullLitteral . $currentBibiDigitName . $digitSeparator . $currentMagnitude . $magnitudeSeparator . $currentBigMagnitude . $bigMagnitudeSeparator;
	}

	return $fullLitteral;
}

function bibi2fullLitteral($bibiNumber)
{
	return hex2fullLitteral(bibi2hex($bibiNumber));
}

function dec2fullLitteral($decNumber)
{
	return hex2fullLitteral(dechex($decNumber));
}
