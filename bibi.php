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

$minimOnSecond = (16*16*16*16)/(24*60*60);

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
	$bibinariesedNumber = strtolower($givenHexadecimalNumber);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentHexDigit = dechex($currentDecDigit);
		$currentBibiChar = $GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];

		$bibinariesedNumber = str_replace($currentHexDigit, $currentBibiChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}

function bibi2hex($givenBibiNumber)
{
	$hexadecimalisedNumber = strtolower($givenBibiNumber);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentHexDigit = dechex($currentDecDigit);
		$currentBibiChar = $GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];

		$hexadecimalisedNumber = str_replace($currentBibiChar, $currentHexDigit, $hexadecimalisedNumber);
	}


	return $hexadecimalisedNumber;
}

function dec2bibi($givenDecimalNumber)
{
	$intermediateNumber = hex2bibi(dechex($givenDecimalNumber));

	return $intermediateNumber;
}


function alpha2bibi($givenDigitSuit)
{
	$bibinariesedNumber = strtoupper($givenDigitSuit);

	for ($currentDecDigit = 0; $currentDecDigit <= 15; $currentDecDigit++)
	{
		$currentBibiDigitChar = $GLOBALS['litt2dec2bibi'][$currentDecDigit]['character'];
		$currentBibiDigitName = $GLOBALS['litt2dec2bibi'][$currentDecDigit]['litteral'];

		$bibinariesedNumber = str_replace($currentBibiDigitName, $currentBibiDigitChar ,$bibinariesedNumber);
	}


	return $bibinariesedNumber;
}


function hex2fullLitteral($hexNumber)
{
	$hexNumber = str_replace(" ","",$hexNumber);
	$lengtOfNumber = iconv_strlen($hexNumber);
	$fullLitteral = "";

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

		$currentBibiDigitName = strtolower($GLOBALS['litt2dec2bibi'][hexdec(substr($hexNumber, $reverseCurrentRing, 1))]['litteral']);

		if ($currentBibiDigitName == "ho")
		{
			$currentBibiDigitName = "";
			$digitSeparator = "";
			$currentMagnitude = "";
			$magnitudeSeparator = "";
			$bigMagnitudeSeparator = "";
		}

		$fullLitteral = $fullLitteral . $currentBibiDigitName . $digitSeparator . $currentMagnitude . $magnitudeSeparator . $currentBigMagnitude . $bigMagnitudeSeparator;
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

function hour2maxer($givenHour)
{
	$hours = substr($givenHour, 0, 2);
	$minutes = substr($givenHour, 2, 2);
	$seconds = substr($givenHour, 4, 2);
	$numberOfSeconds = $hours*3600 + $minutes*60+ $seconds;

	$numberOfMinims = $numberOfSeconds*$GLOBALS['minimOnSecond'];

	$maxer = hex2bibi(dechex($numberOfMinims));

	switch (strlen(bibi2hex($maxer)))
		{
			case "3":
				$maxer = hex2bibi("0").$maxer;
				break;

			case "2":
				$maxer = hex2bibi("00").$maxer;
				break;

			case "1":
				$maxer = hex2bibi("000").$maxer;
				break;

			case "0":
				$maxer = hex2bibi("0000").$maxer;
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
		$beginingYear = $GLOBALS['epoch'];
		$endYear = $givenYear;
	}
	else
	{
		$endYear = $GLOBALS['epoch'];
		$beginingYear = $givenYear;
	}

	$totalNumberOfDays = "0";
	for ($currentYear = $beginingYear ; $currentYear < $endYear ; $currentYear++)
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
		$beginingYear = $firstYear;
		$endYear      = $secondYear;
	}
	else
	{
		$endYear      = $firstYear;
		$beginingYear = $secondYear;
	}

	$totalNumberOfDays = "0";
	for ($currentYear = $beginingYear ; $currentYear < $endYear ; $currentYear++)
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

function prolepticCal2bibiRegCal($givenYear, $givenMonth, $givenDay)
{
	$numberOfDaysSinceZero  = numberOfDaysBetwenZeroAndDate($givenYear, $givenMonth, $givenDay);

	$theBibiYear            = (int)($numberOfDaysSinceZero/512);
	$theBibiMonth           = (int)(($numberOfDaysSinceZero%512)/32);
	$theBibiDay             = (int)(($numberOfDaysSinceZero%512)%32);

	$theBibiDate            = dec2bibi($theBibiYear) . "-" . dec2bibi($theBibiMonth) . "-" . dec2bibi($theBibiDay);

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

function prolepticCal2bibiSolCal($givenYear, $givenMonth, $givenDay)
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

	$theBibiDate  = dec2bibi($theBibiYear) . "-" . dec2bibi($theBibiMonth) . "-" . dec2bibi($theBibiDay);

	return $theBibiDate;
}

function iso86012ToBibiSol($givenDate)
{
	$isoYear = substr($givenDate, 0, 4);
	$isoMont = substr($givenDate, 5, 2);
	$isoDay  = substr($givenDate, 7, 2);

	$isoTime = substr($givenDate, 11, 8);
	$isoTime = str_replace(":","",$isoTime);

	$bibiFullDate = prolepticCal2bibiSolCal($isoYear,$isoMont,$isoDay) . "." . hour2maxer($isoTime);

	return $bibiFullDate;
}

function iso86012ToBibiReg($givenDate)
{
	$isoYear = substr($givenDate, 0, 4);
	$isoMont = substr($givenDate, 5, 2);
	$isoDay  = substr($givenDate, 7, 2);

	$isoTime = substr($givenDate, 11, 8);
	$isoTime = str_replace(":","",$isoTime);

	$bibiFullDate = prolepticCal2bibiRegCal($isoYear,$isoMont,$isoDay) . "." . hour2maxer($isoTime);

	return $bibiFullDate;
}
