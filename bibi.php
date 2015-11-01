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

$decimalToBibinaryCorrespondence = [
    "HO", "HA", "HE", "HI",
    "BO", "BA", "BE", "BI",
    "KO", "KA", "KE", "KI",
    "DO", "DA", "DE", "DI"
];

$minimOnSecond = (16*16*16*16)/(24*60*60);

//class constructNewCharacter
//{
	//public $literal;
	//public $decimal;
	//public $character;

	//function __construct ($literal, $decimal, $character)
	//{
		//$this->literal  = $literal;
		//$this->decimal   = $decimal;
		//$this->character = $character;
	//}
//}

//$litt2decimalToBibi = [
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

$littToDecimalToBibi = [
	[ 'literal' => 'HO',  'decimal' => ' 0',  'character' => '󰀀' ],
	[ 'literal' => 'HA',  'decimal' => ' 1',  'character' => '󰀁' ],
	[ 'literal' => 'HE',  'decimal' => ' 2',  'character' => '󰀂' ],
	[ 'literal' => 'HI',  'decimal' => ' 3',  'character' => '󰀃' ],
	[ 'literal' => 'BO',  'decimal' => ' 4',  'character' => '󰀄' ],
	[ 'literal' => 'BA',  'decimal' => ' 5',  'character' => '󰀅' ],
	[ 'literal' => 'BE',  'decimal' => ' 6',  'character' => '󰀆' ],
	[ 'literal' => 'BI',  'decimal' => ' 7',  'character' => '󰀇' ],
	[ 'literal' => 'KO',  'decimal' => ' 8',  'character' => '󰀈' ],
	[ 'literal' => 'KA',  'decimal' => ' 9',  'character' => '󰀉' ],
	[ 'literal' => 'KE',  'decimal' => '10',  'character' => '󰀊' ],
	[ 'literal' => 'KI',  'decimal' => '11',  'character' => '󰀋' ],
	[ 'literal' => 'DO',  'decimal' => '12',  'character' => '󰀌' ],
	[ 'literal' => 'DA',  'decimal' => '13',  'character' => '󰀍' ],
	[ 'literal' => 'DE',  'decimal' => '14',  'character' => '󰀎' ],
	[ 'literal' => 'DI',  'decimal' => '15',  'character' => '󰀏' ]
];

function hexToBibi($givenHexadecimalNumber)
{
	$bibinariesedNumber = strtolower($givenHexadecimalNumber);

	for ($currentDecimalDigit = 0; $currentDecimalDigit <= 15; $currentDecimalDigit++)
	{
		$currentHexDigit = dechex($currentDecimalDigit);
		$currentBibiChar = $GLOBALS['littToDecimalToBibi'][$currentDecimalDigit]['character'];

		$bibinariesedNumber = str_replace($currentHexDigit, $currentBibiChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}

function bibiToHex($givenBibiNumber)
{
	$hexadecimalisedNumber = strtolower($givenBibiNumber);

	for ($currentDecimalDigit = 0; $currentDecimalDigit <= 15; $currentDecimalDigit++)
	{
		$currentHexDigit = dechex($currentDecimalDigit);
		$currentBibiChar = $GLOBALS['littToDecimalToBibi'][$currentDecimalDigit]['character'];

		$hexadecimalisedNumber = str_replace($currentBibiChar, $currentHexDigit, $hexadecimalisedNumber);
	}


	return $hexadecimalisedNumber;
}

function decimalToBibi($givenDecimalNumber)
{
	$intermediateNumber = hexToBibi(dechex($givenDecimalNumber));

	return $intermediateNumber;
}


function alphaToBibi($givenDigitSuit)
{
	$bibinariesedNumber = strtoupper($givenDigitSuit);

	for ($currentDecimalDigit = 0; $currentDecimalDigit <= 15; $currentDecimalDigit++)
	{
		$currentBibiDigitChar = $GLOBALS['littToDecimalToBibi'][$currentDecimalDigit]['character'];
		$currentBibiDigitName = $GLOBALS['littToDecimalToBibi'][$currentDecimalDigit]['literal'];

		$bibinariesedNumber = str_replace($currentBibiDigitName, $currentBibiDigitChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}


function hexToFullLiteral($hexNumber)
{
	$hexNumber = str_replace(" ","",$hexNumber);
	$lengtOfNumber = iconv_strlen($hexNumber);
	$fullLiteral = "";

	for ($currentRing = $lengtOfNumber ; $currentRing > 0 ; $currentRing--)
	{
		$reverseCurrentRing = $lengtOfNumber-$currentRing;

		switch ($currentRing)
		{
			case 13:
			$currentBigMagnitude = "mixiard";
			break;

			case 9:
			$currentBigMagnitude = "mixion";
			break;

			case 5:
			$currentBigMagnitude = "manix";
			break;

			default:
			$currentBigMagnitude = "";
			break;
		}

		switch ($currentRing % 4)
		{
			case 0:
				$currentMagnitude = "mix";
				break;

			case 1:
				$currentMagnitude = "";
				break;

			case 2:
				$currentMagnitude = "dex";
				break;

			case 3:
				$currentMagnitude = "cenze";
				break;
		}

		switch ($currentBigMagnitude)
		{
			case "":
				$bigMagnitudeSeparator = "";
				break;

			default:
				$bigMagnitudeSeparator = "-";
				break;
		}

		switch ($currentMagnitude)
		{
			case "":
				$magnitudeSeparator = "";
				break;

			default:
				$magnitudeSeparator = "-";
				break;
		}

		if ( ($currentMagnitude != "") || ($currentBigMagnitude != "") )
		{
			$digitSeparator = "-";
		}
		else
		{
			$digitSeparator = "";
		}

		$currentBibiDigitName = strtolower($GLOBALS['littToDecimalToBibi'][hexdec(substr($hexNumber, $reverseCurrentRing, 1))]['literal']);

		if ($currentBibiDigitName == "ho")
		{
			$currentBibiDigitName = "";
			$digitSeparator = "";
			$currentMagnitude = "";
			$magnitudeSeparator = "";
			$bigMagnitudeSeparator = "";
		}

		$fullLiteral = $fullLiteral . $currentBibiDigitName . $digitSeparator . $currentMagnitude . $magnitudeSeparator . $currentBigMagnitude . $bigMagnitudeSeparator;
	}

	return $fullLiteral;
}

function bibiToFullLiteral($bibiNumber)
{
	return hexToFullLiteral(bibiToHex($bibiNumber));
}

function decimalToFullLiteral($decimalNumber)
{
	return hexToFullLiteral(dechex($decimalNumber));
}

function hourToMaxer($givenHour)
{
	$hours = substr($givenHour, 0, 2);
	$minutes = substr($givenHour, 2, 2);
	$seconds = substr($givenHour, 4, 2);
	$numberOfSeconds = $hours*3600 + $minutes*60+ $seconds;

	$numberOfMinims = $numberOfSeconds*$GLOBALS['minimOnSecond'];

	$maxer = hexToBibi(dechex($numberOfMinims));

	switch (strlen(bibiToHex($maxer)))
		{
			case "3":
				$maxer = hexToBibi("0").$maxer;
				break;

			case "2":
				$maxer = hexToBibi("00").$maxer;
				break;

			case "1":
				$maxer = hexToBibi("000").$maxer;
				break;

			case "0":
				$maxer = hexToBibi("0000").$maxer;
				break;
		}

	return $maxer;
}

$epoch = "1970";

function isGregorianYearBissextil($givenYear)
{
	if( ( $givenYear%4 == 0 and $givenYear%100 != 0 ) or ( $givenYear%400 == 0 ) )
	{
		return true;
	}

	return false;
}

function numberOfDaysSinceEpoch($givenYear)
{
	if ( $givenYear > $GLOBALS['epoch'] )
	{
		$beginningYear = $GLOBALS['epoch'];
		$endYear = $givenYear;
	}
	else
	{
		$endYear = $GLOBALS['epoch'];
		$beginningYear = $givenYear;
	}

	$totalNumberOfDays = "0";
	for ($currentYear = $beginningYear ; $currentYear < $endYear ; $currentYear++)
	{
		switch (isGregorianYearBissextil($currentYear))
		{
			case true:
			$totalNumberOfDays = $totalNumberOfDays+366;
			break;

			case false:
			$totalNumberOfDays = $totalNumberOfDays+365;
			break;
		}
	}

	return $totalNumberOfDays;
}

function numberOfDaysBetweanYears($firstYear,$secondYear)
{
	if ( $firstYear <= $secondYear )
	{
		$beginningYear = $firstYear;
		$endYear      = $secondYear;
	}
	else
	{
		$endYear      = $firstYear;
		$beginningYear = $secondYear;
	}

	$totalNumberOfDays = "0";
	for ($currentYear = $beginningYear ; $currentYear < $endYear ; $currentYear++)
	{
		switch (isGregorianYearBissextil($currentYear))
		{
			case true:
			$totalNumberOfDays = $totalNumberOfDays+366;
			break;

			case false:
			$totalNumberOfDays = $totalNumberOfDays+365;
			break;
		}
	}

	return $totalNumberOfDays;
}

function numberOfDaysBetwenZeroAndDate($givenYear, $givenMonth, $givenDay)
{
	$numberOfDaysSinceZero  = numberOfDaysBetweanYears("0",$givenYear);
	if ( ($givenMonth == 1) || ( $givenMonth == 3) || ( $givenMonth == 5) || ( $givenMonth == 7) || ( $givenMonth == 8) || ( $givenMonth == 10) || ( $givenMonth == 12) )
	{
		$numberOfDaysSinceZero = $numberOfDaysSinceZero+"31";
	}
	elseif ( ($givenMonth == 4) || ( $givenMonth == 6) || ( $givenMonth == 9) || ( $givenMonth == 11) )
	{
		$numberOfDaysSinceZero = $numberOfDaysSinceZero+"30";
	}
	else
	{
		switch (isGregorianYearBissextil($givenYear))
		{
			case true:
			$numberOfDaysSinceZero = $numberOfDaysSinceZero+"29";
			break;

			case false:
			$numberOfDaysSinceZero = $numberOfDaysSinceZero+"28";
			break;
		}
	}

	$numberOfDaysSinceZero  = $numberOfDaysSinceZero+$givenDay;

	return $numberOfDaysSinceZero;
}

function prolepticCalToBibiRegCal($givenYear, $givenMonth, $givenDay)
{
	$numberOfDaysSinceZero  = numberOfDaysBetwenZeroAndDate($givenYear, $givenMonth, $givenDay);

	$theBibiYear            = (int)($numberOfDaysSinceZero/512);
	$theBibiMonth           = (int)(($numberOfDaysSinceZero%512)/32);
	$theBibiDay             = (int)(($numberOfDaysSinceZero%512)%32);

	$theBibiDate            = decimalToBibi($theBibiYear) . "-" . decimalToBibi($theBibiMonth) . "-" . decimalToBibi($theBibiDay);

	return $theBibiDate;
}

function isBibiYearBissextil($givenYear)
{
	if( ( $givenYear%4 == 0 and $givenYear%64 != 0 ) or ( $givenYear%256 == 0 ) )
	{
		return true;
	}

	return false;
}

function prolepticCalToBibiSolCal($givenYear, $givenMonth, $givenDay)
{
	$numberOfDaysSinceZero = numberOfDaysBetwenZeroAndDate($givenYear, $givenMonth, $givenDay);

	$untreatedNumberOfDays = $numberOfDaysSinceZero;

	for ($currentYear = 0 ; $untreatedNumberOfDays > 366; $currentYear++)
	{
		switch (isBibiYearBissextil($currentYear))
		{
			case true:
			$untreatedNumberOfDays = $untreatedNumberOfDays-366;
			break;

			case false:
			$untreatedNumberOfDays = $untreatedNumberOfDays-365;
			break;
		}
	}

	$theBibiYear = $currentYear;


	for ($currentMonth == 0 ; $untreatedNumberOfDays > 23; $currentMonth++)
	{
		if ( ($currentMonth == 7) || ($currentMonth == 11) || ($currentMonth == 15) )
		{
			$untreatedNumberOfDays = $untreatedNumberOfDays-22;
		}
		elseif ( ($currentMonth == 0) || ($currentMonth == 1) || ($currentMonth == 2) || ($currentMonth == 4) || ($currentMonth == 5) || ($currentMonth == 6) || ($currentMonth == 8) || ($currentMonth == 9) || ($currentMonth == 10) || ($currentMonth == 12) || ($currentMonth == 13) || ($currentMonth == 14) )
		{
			$untreatedNumberOfDays = $untreatedNumberOfDays-23;
		}
		else
		{
			switch (isBibiYearBissextil($givenYear))
			{
				case true:
				$untreatedNumberOfDays = $untreatedNumberOfDays-22;
				break;

				case false:
				$untreatedNumberOfDays = $untreatedNumberOfDays-23;
				break;
			}
		}
	}

	$theBibiMonth = $currentMonth;
	$theBibiDay   = $untreatedNumberOfDays;

	$theBibiDate  = decimalToBibi($theBibiYear) . "-" . decimalToBibi($theBibiMonth) . "-" . decimalToBibi($theBibiDay);

	return $theBibiDate;
}

function iso86012ToBibiSol($givenDate)
{
	$isoYear = substr($givenDate, 0, 4);
	$isoMonth = substr($givenDate, 5, 2);
	$isoDay  = substr($givenDate, 7, 2);

	$isoTime = substr($givenDate, 11, 8);
	$isoTime = str_replace(":","",$isoTime);

	$bibiFullDate = prolepticCalToBibiSolCal($isoYear,$isoMonth,$isoDay) . "." . hourToMaxer($isoTime);

	return $bibiFullDate;
}

function iso86012ToBibiReg($givenDate)
{
	$isoYear = substr($givenDate, 0, 4);
	$isoMonth = substr($givenDate, 5, 2);
	$isoDay  = substr($givenDate, 7, 2);

	$isoTime = substr($givenDate, 11, 8);
	$isoTime = str_replace(":","",$isoTime);

	$bibiFullDate = prolepticCalToBibiRegCal($isoYear,$isoMonth,$isoDay) . "." . hourToMaxer($isoTime);

	return $bibiFullDate;
}
