<?php
include("../../session.php");
$sp = "&nbsp";
$n = "<br>";

$arzwins = "";
$wpgwins = "";
$sjwins = "";
$boswins = "";
$chiwins = "";
$cgywins = "";
$carwins = "";
$cbjwins = "";
$colwins = "";
$detwins = "";
$edmwins = "";
$mtlwins = "";
$anawins = "";
$lawins = "";
$flawins = "";
$ottwins = "";
$minwins = "";
$nyrwins = "";
$nyiwins = "";
$njwins = "";
$phiwins = "";
$vanwins = "";
$vgkwins = "";
$bufwins = "";
$pitwins = "";
$nshwins = "";
$tbwins = "";
$dalwins = "";
$torwins = "";
$wshwins = "";
$stlwins = "";

//Process W/L/OTL/GF/GA
if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZwins'])) {
 		$arzwins = $_POST['ARZwins'];
 	}
 	if (isset($_POST['WPGwins'])) {
 		$wpgwins = $_POST['WPGwins'];
 	}
 	if (isset($_POST['SJwins'])) {
 		$sjwins = $_POST['SJwins'];
 	}
	if (isset($_POST['BOSwins'])) {
 		$boswins = $_POST['BOSwins'];
 	}
	if (isset($_POST['CHIwins'])) {
 		$chiwins = $_POST['CHIwins'];
 	}
	if (isset($_POST['CGYwins'])) {
 		$cgywins = $_POST['CGYwins'];
 	}
	if (isset($_POST['CARwins'])) {
 		$carwins = $_POST['CARwins'];
 	}
	if (isset($_POST['CBJwins'])) {
 		$cbjwins = $_POST['CBJwins'];
 	}
	if (isset($_POST['COLwins'])) {
 		$colwins = $_POST['COLwins'];
 	}
	if (isset($_POST['DETwins'])) {
 		$detwins = $_POST['DETwins'];
 	}
	if (isset($_POST['EDMwins'])) {
 		$edmwins = $_POST['EDMwins'];
 	}
	if (isset($_POST['MTLwins'])) {
 		$mtlwins = $_POST['MTLwins'];
 	}
	if (isset($_POST['ANAwins'])) {
 		$anawins = $_POST['ANAwins'];
 	}
	if (isset($_POST['LAwins'])) {
 		$lawins = $_POST['LAwins'];
 	}
	if (isset($_POST['FLAwins'])) {
 		$flawins = $_POST['FLAwins'];
 	}
	if (isset($_POST['OTTwins'])) {
 		$ottwins = $_POST['OTTwins'];
 	} 	
	if (isset($_POST['MINwins'])) {
 		$minwins = $_POST['MINwins'];
 	}
	if (isset($_POST['NYRwins'])) {
 		$nyrwins = $_POST['NYRwins'];
 	}
	if (isset($_POST['NYIwins'])) {
 		$nyiwins = $_POST['NYIwins'];
 	}
	if (isset($_POST['NJwins'])) {
 		$njwins = $_POST['NJwins'];
 	}
	if (isset($_POST['PHIwins'])) {
 		$phiwins = $_POST['PHIwins'];
 	}
	if (isset($_POST['VANwins'])) {	
 		$vanwins = $_POST['VANwins'];
 	}
	if (isset($_POST['VGKwins'])) {
 		$vgkwins = $_POST['VGKwins'];
 	} 	
	if (isset($_POST['BUFwins'])) {
 		$bufwins = $_POST['BUFwins'];
 	}
	if (isset($_POST['PITwins'])) {
 		$pitwins = $_POST['PITwins'];
 	}
	if (isset($_POST['NSHwins'])) {
 		$nshwins = $_POST['NSHwins'];
 	} 	
	if (isset($_POST['TBwins'])) {
 		$tbwins = $_POST['TBwins'];
 	}
	if (isset($_POST['DALwins'])) {
 		$dalwins = $_POST['DALwins'];
 	}
	if (isset($_POST['TORwins'])) {
 		$torwins = $_POST['TORwins'];
 	} 	
	if (isset($_POST['WSHwins'])) {
 		$wshwins = $_POST['WSHwins'];
 	}
 	if (isset($_POST['STLwins'])) {
 		$stlwins = $_POST['STLwins'];
 	}
 }

$sqlwins = "UPDATE nhlteams 
			   SET w = (CASE WHEN teamShort = 'ARZ' THEN '$arzwins'
								WHEN teamShort = 'WPG' THEN '$wpgwins'
								WHEN teamShort = 'SJ' THEN '$sjwins'
								WHEN teamShort = 'BOS' THEN '$boswins'
								WHEN teamShort = 'CHI' THEN '$chiwins'
								WHEN teamShort = 'CGY' THEN '$cgywins'
								WHEN teamShort = 'CAR' THEN '$carwins'
								WHEN teamShort = 'CBJ' THEN '$cbjwins'
								WHEN teamShort = 'COL' THEN '$colwins'
								WHEN teamShort = 'DET' THEN '$detwins'
								WHEN teamShort = 'EDM' THEN '$edmwins'
								WHEN teamShort = 'MTL' THEN '$mtlwins'
								WHEN teamShort = 'ANA' THEN '$anawins'
								WHEN teamShort = 'FLA' THEN '$flawins'
								WHEN teamShort = 'OTT' THEN '$ottwins'
								WHEN teamShort = 'MIN' THEN '$minwins'
								WHEN teamShort = 'NYR' THEN '$nyrwins'
								WHEN teamShort = 'NYI' THEN '$nyiwins'
								WHEN teamShort = 'PHI' THEN '$phiwins'
								WHEN teamShort = 'VAN' THEN '$vanwins'
								WHEN teamShort = 'VGK' THEN '$vgkwins'
								WHEN teamShort = 'BUF' THEN '$bufwins'
								WHEN teamShort = 'PIT' THEN '$pitwins'
								WHEN teamShort = 'NSH' THEN '$nshwins'
								WHEN teamShort = 'DAL' THEN '$dalwins'
								WHEN teamShort = 'TOR' THEN '$torwins'
								WHEN teamShort = 'WSH' THEN '$wshwins'
								WHEN teamShort = 'STL' THEN '$stlwins'
								WHEN teamShort = 'LA' THEN '$lawins'
								WHEN teamShort = 'NJ' THEN '$njwins'
								WHEN teamShort = 'TB' THEN '$tbwins'
end)";


$arzlosses = "";
$wpglosses = "";
$sjlosses = "";
$boslosses = "";
$chilosses = "";
$cgylosses = "";
$carlosses = "";
$cbjlosses = "";
$collosses = "";
$detlosses = "";
$edmlosses = "";
$mtllosses = "";
$analosses = "";
$lalosses = "";
$flalosses = "";
$ottlosses = "";
$minlosses = "";
$nyrlosses = "";
$nyilosses = "";
$njlosses = "";
$philosses = "";
$vanlosses = "";
$vgklosses = "";
$buflosses = "";
$pitlosses = "";
$nshlosses = "";
$tblosses = "";
$dallosses = "";
$torlosses = "";
$wshlosses = "";
$stllosses = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZlosses'])) {
 		$arzlosses = $_POST['ARZlosses'];
 	}
 	if (isset($_POST['WPGlosses'])) {
 		$wpglosses = $_POST['WPGlosses'];
 	}
 	if (isset($_POST['SJlosses'])) {
 		$sjlosses = $_POST['SJlosses'];
 	}
	if (isset($_POST['BOSlosses'])) {
 		$boslosses = $_POST['BOSlosses'];
 	}
	if (isset($_POST['CHIlosses'])) {
 		$chilosses = $_POST['CHIlosses'];
 	}
	if (isset($_POST['CGYlosses'])) {
 		$cgylosses = $_POST['CGYlosses'];
 	}
	if (isset($_POST['CARlosses'])) {
 		$carlosses = $_POST['CARlosses'];
 	}
	if (isset($_POST['CBJlosses'])) {
 		$cbjlosses = $_POST['CBJlosses'];
 	}
	if (isset($_POST['COLlosses'])) {
 		$collosses = $_POST['COLlosses'];
 	}
	if (isset($_POST['DETlosses'])) {
 		$detlosses = $_POST['DETlosses'];
 	}
	if (isset($_POST['EDMlosses'])) {
 		$edmlosses = $_POST['EDMlosses'];
 	}
	if (isset($_POST['MTLlosses'])) {
 		$mtllosses = $_POST['MTLlosses'];
 	}
	if (isset($_POST['ANAlosses'])) {
 		$analosses = $_POST['ANAlosses'];
 	}
	if (isset($_POST['LAlosses'])) {
 		$lalosses = $_POST['LAlosses'];
 	}
	if (isset($_POST['FLAlosses'])) {
 		$flalosses = $_POST['FLAlosses'];
 	}
	if (isset($_POST['OTTlosses'])) {
 		$ottlosses = $_POST['OTTlosses'];
 	} 	
	if (isset($_POST['MINlosses'])) {
 		$minlosses = $_POST['MINlosses'];
 	}
	if (isset($_POST['NYRlosses'])) {
 		$nyrlosses = $_POST['NYRlosses'];
 	}
	if (isset($_POST['NYIlosses'])) {
 		$nyilosses = $_POST['NYIlosses'];
 	}
	if (isset($_POST['NJlosses'])) {
 		$njlosses = $_POST['NJlosses'];
 	}
	if (isset($_POST['PHIlosses'])) {
 		$philosses = $_POST['PHIlosses'];
 	}
	if (isset($_POST['VANlosses'])) {	
 		$vanlosses = $_POST['VANlosses'];
 	}
	if (isset($_POST['VGKlosses'])) {
 		$vgklosses = $_POST['VGKlosses'];
 	} 	
	if (isset($_POST['BUFlosses'])) {
 		$buflosses = $_POST['BUFlosses'];
 	}
	if (isset($_POST['PITlosses'])) {
 		$pitlosses = $_POST['PITlosses'];
 	}
	if (isset($_POST['NSHlosses'])) {
 		$nshlosses = $_POST['NSHlosses'];
 	} 	
	if (isset($_POST['TBlosses'])) {
 		$tblosses = $_POST['TBlosses'];
 	}
	if (isset($_POST['DALlosses'])) {
 		$dallosses = $_POST['DALlosses'];
 	}
	if (isset($_POST['TORlosses'])) {
 		$torlosses = $_POST['TORlosses'];
 	} 	
	if (isset($_POST['WSHlosses'])) {
 		$wshlosses = $_POST['WSHlosses'];
 	}
 	if (isset($_POST['STLlosses'])) {
 		$stllosses = $_POST['STLlosses'];
 	}
 }

$sqllosses = "UPDATE nhlteams 
			   SET l = (CASE WHEN teamShort = 'ARZ' THEN '$arzlosses'
								WHEN teamShort = 'WPG' THEN '$wpglosses'
								WHEN teamShort = 'SJ' THEN '$sjlosses'
								WHEN teamShort = 'BOS' THEN '$boslosses'
								WHEN teamShort = 'CHI' THEN '$chilosses'
								WHEN teamShort = 'CGY' THEN '$cgylosses'
								WHEN teamShort = 'CAR' THEN '$carlosses'
								WHEN teamShort = 'CBJ' THEN '$cbjlosses'
								WHEN teamShort = 'COL' THEN '$collosses'
								WHEN teamShort = 'DET' THEN '$detlosses'
								WHEN teamShort = 'EDM' THEN '$edmlosses'
								WHEN teamShort = 'MTL' THEN '$mtllosses'
								WHEN teamShort = 'ANA' THEN '$analosses'
								WHEN teamShort = 'FLA' THEN '$flalosses'
								WHEN teamShort = 'OTT' THEN '$ottlosses'
								WHEN teamShort = 'MIN' THEN '$minlosses'
								WHEN teamShort = 'NYR' THEN '$nyrlosses'
								WHEN teamShort = 'NYI' THEN '$nyilosses'
								WHEN teamShort = 'PHI' THEN '$philosses'
								WHEN teamShort = 'VAN' THEN '$vanlosses'
								WHEN teamShort = 'VGK' THEN '$vgklosses'
								WHEN teamShort = 'BUF' THEN '$buflosses'
								WHEN teamShort = 'PIT' THEN '$pitlosses'
								WHEN teamShort = 'NSH' THEN '$nshlosses'
								WHEN teamShort = 'DAL' THEN '$dallosses'
								WHEN teamShort = 'TOR' THEN '$torlosses'
								WHEN teamShort = 'WSH' THEN '$wshlosses'
								WHEN teamShort = 'STL' THEN '$stllosses'
								WHEN teamShort = 'LA' THEN '$lalosses'
								WHEN teamShort = 'NJ' THEN '$njlosses'
								WHEN teamShort = 'TB' THEN '$tblosses'
end)";

$arzotl = "";
$wpgotl = "";
$sjotl = "";
$bosotl = "";
$chiotl = "";
$cgyotl = "";
$carotl = "";
$cbjotl = "";
$colotl = "";
$detotl = "";
$edmotl = "";
$mtlotl = "";
$anaotl = "";
$laotl = "";
$flaotl = "";
$ottotl = "";
$minotl = "";
$nyrotl = "";
$nyiotl = "";
$njotl = "";
$phiotl = "";
$vanotl = "";
$vgkotl = "";
$bufotl = "";
$pitotl = "";
$nshotl = "";
$tbotl = "";
$dalotl = "";
$torotl = "";
$wshotl = "";
$stlotl = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZotl'])) {
 		$arzotl = $_POST['ARZotl'];
 	}
 	if (isset($_POST['WPGotl'])) {
 		$wpgotl = $_POST['WPGotl'];
 	}
 	if (isset($_POST['SJotl'])) {
 		$sjotl = $_POST['SJotl'];
 	}
	if (isset($_POST['BOSotl'])) {
 		$bosotl = $_POST['BOSotl'];
 	}
	if (isset($_POST['CHIotl'])) {
 		$chiotl = $_POST['CHIotl'];
 	}
	if (isset($_POST['CGYotl'])) {
 		$cgyotl = $_POST['CGYotl'];
 	}
	if (isset($_POST['CARotl'])) {
 		$carotl = $_POST['CARotl'];
 	}
	if (isset($_POST['CBJotl'])) {
 		$cbjotl = $_POST['CBJotl'];
 	}
	if (isset($_POST['COLotl'])) {
 		$colotl = $_POST['COLotl'];
 	}
	if (isset($_POST['DETotl'])) {
 		$detotl = $_POST['DETotl'];
 	}
	if (isset($_POST['EDMotl'])) {
 		$edmotl = $_POST['EDMotl'];
 	}
	if (isset($_POST['MTLotl'])) {
 		$mtlotl = $_POST['MTLotl'];
 	}
	if (isset($_POST['ANAotl'])) {
 		$anaotl = $_POST['ANAotl'];
 	}
	if (isset($_POST['LAotl'])) {
 		$laotl = $_POST['LAotl'];
 	}
	if (isset($_POST['FLAotl'])) {
 		$flaotl = $_POST['FLAotl'];
 	}
	if (isset($_POST['OTTotl'])) {
 		$ottotl = $_POST['OTTotl'];
 	} 	
	if (isset($_POST['MINotl'])) {
 		$minotl = $_POST['MINotl'];
 	}
	if (isset($_POST['NYRotl'])) {
 		$nyrotl = $_POST['NYRotl'];
 	}
	if (isset($_POST['NYIotl'])) {
 		$nyiotl = $_POST['NYIotl'];
 	}
	if (isset($_POST['NJotl'])) {
 		$njotl = $_POST['NJotl'];
 	}
	if (isset($_POST['PHIotl'])) {
 		$phiotl = $_POST['PHIotl'];
 	}
	if (isset($_POST['VANotl'])) {	
 		$vanotl = $_POST['VANotl'];
 	}
	if (isset($_POST['VGKotl'])) {
 		$vgkotl = $_POST['VGKotl'];
 	} 	
	if (isset($_POST['BUFotl'])) {
 		$bufotl = $_POST['BUFotl'];
 	}
	if (isset($_POST['PITotl'])) {
 		$pitotl = $_POST['PITotl'];
 	}
	if (isset($_POST['NSHotl'])) {
 		$nshotl = $_POST['NSHotl'];
 	} 	
	if (isset($_POST['TBotl'])) {
 		$tbotl = $_POST['TBotl'];
 	}
	if (isset($_POST['DALotl'])) {
 		$dalotl = $_POST['DALotl'];
 	}
	if (isset($_POST['TORotl'])) {
 		$torotl = $_POST['TORotl'];
 	} 	
	if (isset($_POST['WSHotl'])) {
 		$wshotl = $_POST['WSHotl'];
 	}
 	if (isset($_POST['STLotl'])) {
 		$stlotl = $_POST['STLotl'];
 	}
 }

$sqlotl = "UPDATE nhlteams 
			   SET otl = (CASE WHEN teamShort = 'ARZ' THEN '$arzotl'
								WHEN teamShort = 'WPG' THEN '$wpgotl'
								WHEN teamShort = 'SJ' THEN '$sjotl'
								WHEN teamShort = 'BOS' THEN '$bosotl'
								WHEN teamShort = 'CHI' THEN '$chiotl'
								WHEN teamShort = 'CGY' THEN '$cgyotl'
								WHEN teamShort = 'CAR' THEN '$carotl'
								WHEN teamShort = 'CBJ' THEN '$cbjotl'
								WHEN teamShort = 'COL' THEN '$colotl'
								WHEN teamShort = 'DET' THEN '$detotl'
								WHEN teamShort = 'EDM' THEN '$edmotl'
								WHEN teamShort = 'MTL' THEN '$mtlotl'
								WHEN teamShort = 'ANA' THEN '$anaotl'
								WHEN teamShort = 'FLA' THEN '$flaotl'
								WHEN teamShort = 'OTT' THEN '$ottotl'
								WHEN teamShort = 'MIN' THEN '$minotl'
								WHEN teamShort = 'NYR' THEN '$nyrotl'
								WHEN teamShort = 'NYI' THEN '$nyiotl'
								WHEN teamShort = 'PHI' THEN '$phiotl'
								WHEN teamShort = 'VAN' THEN '$vanotl'
								WHEN teamShort = 'VGK' THEN '$vgkotl'
								WHEN teamShort = 'BUF' THEN '$bufotl'
								WHEN teamShort = 'PIT' THEN '$pitotl'
								WHEN teamShort = 'NSH' THEN '$nshotl'
								WHEN teamShort = 'DAL' THEN '$dalotl'
								WHEN teamShort = 'TOR' THEN '$torotl'
								WHEN teamShort = 'WSH' THEN '$wshotl'
								WHEN teamShort = 'STL' THEN '$stlotl'
								WHEN teamShort = 'LA' THEN '$laotl'
								WHEN teamShort = 'NJ' THEN '$njotl'
								WHEN teamShort = 'TB' THEN '$tbotl'
end)";

$arzrow = "";
$wpgrow = "";
$sjrow = "";
$bosrow = "";
$chirow = "";
$cgyrow = "";
$carrow = "";
$cbjrow = "";
$colrow = "";
$detrow = "";
$edmrow = "";
$mtlrow = "";
$anarow = "";
$larow = "";
$flarow = "";
$ottrow = "";
$minrow = "";
$nyrrow = "";
$nyirow = "";
$njrow = "";
$phirow = "";
$vanrow = "";
$vgkrow = "";
$bufrow = "";
$pitrow = "";
$nshrow = "";
$tbrow = "";
$dalrow = "";
$torrow = "";
$wshrow = "";
$stlrow = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZrowins'])) {
 		$arzrow = $_POST['ARZrowins'];
 	}
 	if (isset($_POST['WPGrowins'])) {
 		$wpgrow = $_POST['WPGrowins'];
 	}
 	if (isset($_POST['SJrowins'])) {
 		$sjrow = $_POST['SJrowins'];
 	}
	if (isset($_POST['BOSrowins'])) {
 		$bosrow = $_POST['BOSrowins'];
 	}
	if (isset($_POST['CHIrowins'])) {
 		$chirow = $_POST['CHIrowins'];
 	}
	if (isset($_POST['CGYrowins'])) {
 		$cgyrow = $_POST['CGYrowins'];
 	}
	if (isset($_POST['CARrowins'])) {
 		$carrow = $_POST['CARrowins'];
 	}
	if (isset($_POST['CBJrowins'])) {
 		$cbjrow = $_POST['CBJrowins'];
 	}
	if (isset($_POST['COLrowins'])) {
 		$colrow = $_POST['COLrowins'];
 	}
	if (isset($_POST['DETrowins'])) {
 		$detrow = $_POST['DETrowins'];
 	}
	if (isset($_POST['EDMrowins'])) {
 		$edmrow = $_POST['EDMrowins'];
 	}
	if (isset($_POST['MTLrowins'])) {
 		$mtlrow = $_POST['MTLrowins'];
 	}
	if (isset($_POST['ANArowins'])) {
 		$anarow = $_POST['ANArowins'];
 	}
	if (isset($_POST['LArowins'])) {
 		$larow = $_POST['LArowins'];
 	}
	if (isset($_POST['FLArowins'])) {
 		$flarow = $_POST['FLArowins'];
 	}
	if (isset($_POST['OTTrowins'])) {
 		$ottrow = $_POST['OTTrowins'];
 	} 	
	if (isset($_POST['MINrowins'])) {
 		$minrow = $_POST['MINrowins'];
 	}
	if (isset($_POST['NYRrowins'])) {
 		$nyrrow = $_POST['NYRrowins'];
 	}
	if (isset($_POST['NYIrowins'])) {
 		$nyirow = $_POST['NYIrowins'];
 	}
	if (isset($_POST['NJrowins'])) {
 		$njrow = $_POST['NJrowins'];
 	}
	if (isset($_POST['PHIrowins'])) {
 		$phirow = $_POST['PHIrowins'];
 	}
	if (isset($_POST['VANrowins'])) {	
 		$vanrow = $_POST['VANrowins'];
 	}
	if (isset($_POST['VGKrowins'])) {
 		$vgkrow = $_POST['VGKrowins'];
 	} 	
	if (isset($_POST['BUFrowins'])) {
 		$bufrow = $_POST['BUFrowins'];
 	}
	if (isset($_POST['PITrowins'])) {
 		$pitrow = $_POST['PITrowins'];
 	}
	if (isset($_POST['NSHrowins'])) {
 		$nshrow = $_POST['NSHrowins'];
 	} 	
	if (isset($_POST['TBrowins'])) {
 		$tbrow = $_POST['TBrowins'];
 	}
	if (isset($_POST['DALrowins'])) {
 		$dalrow = $_POST['DALrowins'];
 	}
	if (isset($_POST['TORrowins'])) {
 		$torrow = $_POST['TORrowins'];
 	} 	
	if (isset($_POST['WSHrowins'])) {
 		$wshrow = $_POST['WSHrowins'];
 	}
 	if (isset($_POST['STLrowins'])) {
 		$stlrow = $_POST['STLrowins'];
 	}
 }

$sqlrow = "UPDATE nhlteams 
			   SET row = (CASE WHEN teamShort = 'ARZ' THEN '$arzrow'
								WHEN teamShort = 'WPG' THEN '$wpgrow'
								WHEN teamShort = 'SJ' THEN '$sjrow'
								WHEN teamShort = 'BOS' THEN '$bosrow'
								WHEN teamShort = 'CHI' THEN '$chirow'
								WHEN teamShort = 'CGY' THEN '$cgyrow'
								WHEN teamShort = 'CAR' THEN '$carrow'
								WHEN teamShort = 'CBJ' THEN '$cbjrow'
								WHEN teamShort = 'COL' THEN '$colrow'
								WHEN teamShort = 'DET' THEN '$detrow'
								WHEN teamShort = 'EDM' THEN '$edmrow'
								WHEN teamShort = 'MTL' THEN '$mtlrow'
								WHEN teamShort = 'ANA' THEN '$anarow'
								WHEN teamShort = 'FLA' THEN '$flarow'
								WHEN teamShort = 'OTT' THEN '$ottrow'
								WHEN teamShort = 'MIN' THEN '$minrow'
								WHEN teamShort = 'NYR' THEN '$nyrrow'
								WHEN teamShort = 'NYI' THEN '$nyirow'
								WHEN teamShort = 'PHI' THEN '$phirow'
								WHEN teamShort = 'VAN' THEN '$vanrow'
								WHEN teamShort = 'VGK' THEN '$vgkrow'
								WHEN teamShort = 'BUF' THEN '$bufrow'
								WHEN teamShort = 'PIT' THEN '$pitrow'
								WHEN teamShort = 'NSH' THEN '$nshrow'
								WHEN teamShort = 'DAL' THEN '$dalrow'
								WHEN teamShort = 'TOR' THEN '$torrow'
								WHEN teamShort = 'WSH' THEN '$wshrow'
								WHEN teamShort = 'STL' THEN '$stlrow'
								WHEN teamShort = 'LA' THEN '$larow'
								WHEN teamShort = 'NJ' THEN '$njrow'
								WHEN teamShort = 'TB' THEN '$tbrow'
end)";

$arzgf = "";
$wpggf = "";
$sjgf = "";
$bosgf = "";
$chigf = "";
$cgygf = "";
$cargf = "";
$cbjgf = "";
$colgf = "";
$detgf = "";
$edmgf = "";
$mtlgf = "";
$anagf = "";
$lagf = "";
$flagf = "";
$ottgf = "";
$mingf = "";
$nyrgf = "";
$nyigf = "";
$njgf = "";
$phigf = "";
$vangf = "";
$vgkgf = "";
$bufgf = "";
$pitgf = "";
$nshgf = "";
$tbgf = "";
$dalgf = "";
$torgf = "";
$wshgf = "";
$stlgf = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZgf'])) {
 		$arzgf = $_POST['ARZgf'];
 	}
 	if (isset($_POST['WPGgf'])) {
 		$wpggf = $_POST['WPGgf'];
 	}
 	if (isset($_POST['SJgf'])) {
 		$sjgf = $_POST['SJgf'];
 	}
	if (isset($_POST['BOSgf'])) {
 		$bosgf = $_POST['BOSgf'];
 	}
	if (isset($_POST['CHIgf'])) {
 		$chigf = $_POST['CHIgf'];
 	}
	if (isset($_POST['CGYgf'])) {
 		$cgygf = $_POST['CGYgf'];
 	}
	if (isset($_POST['CARgf'])) {
 		$cargf = $_POST['CARgf'];
 	}
	if (isset($_POST['CBJgf'])) {
 		$cbjgf = $_POST['CBJgf'];
 	}
	if (isset($_POST['COLgf'])) {
 		$colgf = $_POST['COLgf'];
 	}
	if (isset($_POST['DETgf'])) {
 		$detgf = $_POST['DETgf'];
 	}
	if (isset($_POST['EDMgf'])) {
 		$edmgf = $_POST['EDMgf'];
 	}
	if (isset($_POST['MTLgf'])) {
 		$mtlgf = $_POST['MTLgf'];
 	}
	if (isset($_POST['ANAgf'])) {
 		$anagf = $_POST['ANAgf'];
 	}
	if (isset($_POST['LAgf'])) {
 		$lagf = $_POST['LAgf'];
 	}
	if (isset($_POST['FLAgf'])) {
 		$flagf = $_POST['FLAgf'];
 	}
	if (isset($_POST['OTTgf'])) {
 		$ottgf = $_POST['OTTgf'];
 	} 	
	if (isset($_POST['MINgf'])) {
 		$mingf = $_POST['MINgf'];
 	}
	if (isset($_POST['NYRgf'])) {
 		$nyrgf = $_POST['NYRgf'];
 	}
	if (isset($_POST['NYIgf'])) {
 		$nyigf = $_POST['NYIgf'];
 	}
	if (isset($_POST['NJgf'])) {
 		$njgf = $_POST['NJgf'];
 	}
	if (isset($_POST['PHIgf'])) {
 		$phigf = $_POST['PHIgf'];
 	}
	if (isset($_POST['VANgf'])) {	
 		$vangf = $_POST['VANgf'];
 	}
	if (isset($_POST['VGKgf'])) {
 		$vgkgf = $_POST['VGKgf'];
 	} 	
	if (isset($_POST['BUFgf'])) {
 		$bufgf = $_POST['BUFgf'];
 	}
	if (isset($_POST['PITgf'])) {
 		$pitgf = $_POST['PITgf'];
 	}
	if (isset($_POST['NSHgf'])) {
 		$nshgf = $_POST['NSHgf'];
 	} 	
	if (isset($_POST['TBgf'])) {
 		$tbgf = $_POST['TBgf'];
 	}
	if (isset($_POST['DALgf'])) {
 		$dalgf = $_POST['DALgf'];
 	}
	if (isset($_POST['TORgf'])) {
 		$torgf = $_POST['TORgf'];
 	} 	
	if (isset($_POST['WSHgf'])) {
 		$wshgf = $_POST['WSHgf'];
 	}
 	if (isset($_POST['STLgf'])) {
 		$stlgf = $_POST['STLgf'];
 	}
 }

$sqlgf = "UPDATE nhlteams 
			   SET gf = (CASE WHEN teamShort = 'ARZ' THEN '$arzgf'
								WHEN teamShort = 'WPG' THEN '$wpggf'
								WHEN teamShort = 'SJ' THEN '$sjgf'
								WHEN teamShort = 'BOS' THEN '$bosgf'
								WHEN teamShort = 'CHI' THEN '$chigf'
								WHEN teamShort = 'CGY' THEN '$cgygf'
								WHEN teamShort = 'CAR' THEN '$cargf'
								WHEN teamShort = 'CBJ' THEN '$cbjgf'
								WHEN teamShort = 'COL' THEN '$colgf'
								WHEN teamShort = 'DET' THEN '$detgf'
								WHEN teamShort = 'EDM' THEN '$edmgf'
								WHEN teamShort = 'MTL' THEN '$mtlgf'
								WHEN teamShort = 'ANA' THEN '$anagf'
								WHEN teamShort = 'FLA' THEN '$flagf'
								WHEN teamShort = 'OTT' THEN '$ottgf'
								WHEN teamShort = 'MIN' THEN '$mingf'
								WHEN teamShort = 'NYR' THEN '$nyrgf'
								WHEN teamShort = 'NYI' THEN '$nyigf'
								WHEN teamShort = 'PHI' THEN '$phigf'
								WHEN teamShort = 'VAN' THEN '$vangf'
								WHEN teamShort = 'VGK' THEN '$vgkgf'
								WHEN teamShort = 'BUF' THEN '$bufgf'
								WHEN teamShort = 'PIT' THEN '$pitgf'
								WHEN teamShort = 'NSH' THEN '$nshgf'
								WHEN teamShort = 'DAL' THEN '$dalgf'
								WHEN teamShort = 'TOR' THEN '$torgf'
								WHEN teamShort = 'WSH' THEN '$wshgf'
								WHEN teamShort = 'STL' THEN '$stlgf'
								WHEN teamShort = 'LA' THEN '$lagf'
								WHEN teamShort = 'NJ' THEN '$njgf'
								WHEN teamShort = 'TB' THEN '$tbgf'
end)";

$arzga = "";
$wpgga = "";
$sjga = "";
$bosga = "";
$chiga = "";
$cgyga = "";
$carga = "";
$cbjga = "";
$colga = "";
$detga = "";
$edmga = "";
$mtlga = "";
$anaga = "";
$laga = "";
$flaga = "";
$ottga = "";
$minga = "";
$nyrga = "";
$nyiga = "";
$njga = "";
$phiga = "";
$vanga = "";
$vgkga = "";
$bufga = "";
$pitga = "";
$nshga = "";
$tbga = "";
$dalga = "";
$torga = "";
$wshga = "";
$stlga = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {

 	if (isset($_POST['ARZga'])) {
 		$arzga = $_POST['ARZga'];
 	}
 	if (isset($_POST['WPGga'])) {
 		$wpgga = $_POST['WPGga'];
 	}
 	if (isset($_POST['SJga'])) {
 		$sjga = $_POST['SJga'];
 	}
	if (isset($_POST['BOSga'])) {
 		$bosga = $_POST['BOSga'];
 	}
	if (isset($_POST['CHIga'])) {
 		$chiga = $_POST['CHIga'];
 	}
	if (isset($_POST['CGYga'])) {
 		$cgyga = $_POST['CGYga'];
 	}
	if (isset($_POST['CARga'])) {
 		$carga = $_POST['CARga'];
 	}
	if (isset($_POST['CBJga'])) {
 		$cbjga = $_POST['CBJga'];
 	}
	if (isset($_POST['COLga'])) {
 		$colga = $_POST['COLga'];
 	}
	if (isset($_POST['DETga'])) {
 		$detga = $_POST['DETga'];
 	}
	if (isset($_POST['EDMga'])) {
 		$edmga = $_POST['EDMga'];
 	}
	if (isset($_POST['MTLga'])) {
 		$mtlga = $_POST['MTLga'];
 	}
	if (isset($_POST['ANAga'])) {
 		$anaga = $_POST['ANAga'];
 	}
	if (isset($_POST['LAga'])) {
 		$laga = $_POST['LAga'];
 	}
	if (isset($_POST['FLAga'])) {
 		$flaga = $_POST['FLAga'];
 	}
	if (isset($_POST['OTTga'])) {
 		$ottga = $_POST['OTTga'];
 	} 	
	if (isset($_POST['MINga'])) {
 		$minga = $_POST['MINga'];
 	}
	if (isset($_POST['NYRga'])) {
 		$nyrga = $_POST['NYRga'];
 	}
	if (isset($_POST['NYIga'])) {
 		$nyiga = $_POST['NYIga'];
 	}
	if (isset($_POST['NJga'])) {
 		$njga = $_POST['NJga'];
 	}
	if (isset($_POST['PHIga'])) {
 		$phiga = $_POST['PHIga'];
 	}
	if (isset($_POST['VANga'])) {	
 		$vanga = $_POST['VANga'];
 	}
	if (isset($_POST['VGKga'])) {
 		$vgkga = $_POST['VGKga'];
 	} 	
	if (isset($_POST['BUFga'])) {
 		$bufga = $_POST['BUFga'];
 	}
	if (isset($_POST['PITga'])) {
 		$pitga = $_POST['PITga'];
 	}
	if (isset($_POST['NSHga'])) {
 		$nshga = $_POST['NSHga'];
 	} 	
	if (isset($_POST['TBga'])) {
 		$tbga = $_POST['TBga'];
 	}
	if (isset($_POST['DALga'])) {
 		$dalga = $_POST['DALga'];
 	}
	if (isset($_POST['TORga'])) {
 		$torga = $_POST['TORga'];
 	} 	
	if (isset($_POST['WSHga'])) {
 		$wshga = $_POST['WSHga'];
 	}
 	if (isset($_POST['STLga'])) {
 		$stlga = $_POST['STLga'];
 	}
 }

$sqlga = "UPDATE nhlteams 
			   SET ga = (CASE WHEN teamShort = 'ARZ' THEN '$arzga'
								WHEN teamShort = 'WPG' THEN '$wpgga'
								WHEN teamShort = 'SJ' THEN '$sjga'
								WHEN teamShort = 'BOS' THEN '$bosga'
								WHEN teamShort = 'CHI' THEN '$chiga'
								WHEN teamShort = 'CGY' THEN '$cgyga'
								WHEN teamShort = 'CAR' THEN '$carga'
								WHEN teamShort = 'CBJ' THEN '$cbjga'
								WHEN teamShort = 'COL' THEN '$colga'
								WHEN teamShort = 'DET' THEN '$detga'
								WHEN teamShort = 'EDM' THEN '$edmga'
								WHEN teamShort = 'MTL' THEN '$mtlga'
								WHEN teamShort = 'ANA' THEN '$anaga'
								WHEN teamShort = 'FLA' THEN '$flaga'
								WHEN teamShort = 'OTT' THEN '$ottga'
								WHEN teamShort = 'MIN' THEN '$minga'
								WHEN teamShort = 'NYR' THEN '$nyrga'
								WHEN teamShort = 'NYI' THEN '$nyiga'
								WHEN teamShort = 'PHI' THEN '$phiga'
								WHEN teamShort = 'VAN' THEN '$vanga'
								WHEN teamShort = 'VGK' THEN '$vgkga'
								WHEN teamShort = 'BUF' THEN '$bufga'
								WHEN teamShort = 'PIT' THEN '$pitga'
								WHEN teamShort = 'NSH' THEN '$nshga'
								WHEN teamShort = 'DAL' THEN '$dalga'
								WHEN teamShort = 'TOR' THEN '$torga'
								WHEN teamShort = 'WSH' THEN '$wshga'
								WHEN teamShort = 'STL' THEN '$stlga'
								WHEN teamShort = 'LA' THEN '$laga'
								WHEN teamShort = 'NJ' THEN '$njga'
								WHEN teamShort = 'TB' THEN '$tbga'
end)";
		   					
$sqlpts = "UPDATE nhlteams SET pts = (2*w)+otl";
$sqlpp = "UPDATE nhlteams SET pp = pts / (2*(w+l+otl))";
$sqlgd = "UPDATE nhlteams SET gd = gf - ga";

$updatewins = mysqli_query($db, $sqlwins);
$updatelosses = mysqli_query($db, $sqllosses);
$updateotl = mysqli_query($db, $sqlotl);
$updatepts = mysqli_query($db, $sqlpts);
$updaterow = mysqli_query($db, $sqlrow);
$updategf = mysqli_query($db, $sqlgf);
$updatega = mysqli_query($db, $sqlga);
$updategd = mysqli_query($db, $sqlgd);
$updatepp = mysqli_query($db, $sqlpp);


//Top 3 teams in each division earn playoff spots
$pacsql = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' AND division = 'Pacific' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$i=1;
while($i <= 3 && $r=mysqli_fetch_array($pacsql)){
	$wins = $r['w'];
	$losses = $r['l'];
	$otl = $r['otl'];
	$rowins = $r['row'];
	$pp = $r['pp'];
	$gf = $r['gf'];
	$ga = $r['ga'];
	$gd = $r['gd'];
	$pts = $r['pts'];
	$team = $r['team'];
	$short = $r['teamShort'];
	echo $short . $n;
	mysqli_query($db, "UPDATE pacific_leaders SET team = '$team', teamShort = '$short', wins = $wins, losses = $losses, otl = $otl, row = $rowins, pp = $pp, pts = $pts, gf = $gf, ga = $ga, gd = $gd WHERE place = $i");
	$i++;
}

$censql = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'West' AND division = 'Central' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$i=1;
while($i <= 3 && $r=mysqli_fetch_array($censql)){
	$wins = $r['w'];
	$losses = $r['l'];
	$otl = $r['otl'];
	$rowins = $r['row'];
	$pp = $r['pp'];
	$gf = $r['gf'];
	$ga = $r['ga'];
	$gd = $r['gd'];
	$pts = $r['pts'];
	$team = $r['team'];
	$short = $r['teamShort'];
	echo $short . $n;
	mysqli_query($db, "UPDATE central_leaders SET team = '$team', teamShort = '$short', wins = $wins, losses = $losses, otl = $otl, row = $rowins, pp = $pp, pts = $pts, gf = $gf, ga = $ga, gd = $gd WHERE place = $i");
	$i++;
}

$metsql = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND division = 'Metropolitan' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$i=1;
while($i <= 3 && $r=mysqli_fetch_array($metsql)){
	$wins = $r['w'];
	$losses = $r['l'];
	$otl = $r['otl'];
	$rowins = $r['row'];
	$pp = $r['pp'];
	$gf = $r['gf'];
	$ga = $r['ga'];
	$gd = $r['gd'];
	$pts = $r['pts'];
	$team = $r['team'];
	$short = $r['teamShort'];
	echo $i . ". " . $team . " (" . $short . ") ". $wins . "-" . $losses . "-" . $otl . " (" . $pts . " pts) " . $n;
	mysqli_query($db, "UPDATE metro_leaders SET team = '$team', teamShort = '$short', wins = $wins, losses = $losses, otl = $otl, row = $rowins, pp = $pp, pts = $pts, gf = $gf, ga = $ga, gd = $gd WHERE place = $i");
	$i++;
}

$atlsql = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND division = 'Atlantic' ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$i=1;
while($i <= 3 && $r=mysqli_fetch_array($atlsql)){
	$wins = $r['w'];
	$losses = $r['l'];
	$otl = $r['otl'];
	$rowins = $r['row'];
	$pp = $r['pp'];
	$gf = $r['gf'];
	$ga = $r['ga'];
	$gd = $r['gd'];
	$pts = $r['pts'];
	$team = $r['team'];
	$short = $r['teamShort'];
	echo $short . $n;
	mysqli_query($db, "UPDATE atlantic_leaders SET team = '$team', teamShort = '$short', wins = $wins, losses = $losses, otl = $otl, row = $rowins, pp = $pp, pts = $pts, gf = $gf, ga = $ga, gd = $gd WHERE place = $i");
	$i++;
}

//Put teams in playoff spots
$sql = mysqli_query($db, "SELECT * FROM central_leaders");
$i=1;
while($i <=3 && $r = mysqli_fetch_array($sql)){
	if ($i == 1){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'cen14'");
	}
	if ($i == 2){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'cen23'");
	}	
	if ($i == 3){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$team' WHERE series = 'cen23'");
	}
	$i++;	
}

$sql = mysqli_query($db, "SELECT * FROM pacific_leaders");
$i=1;
while($i <=3 && $r = mysqli_fetch_array($sql)){
	$team = $r['teamShort'];
	if ($i == 1){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'pac14'");
	}
	if ($i == 2){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'pac23'");
	}	
	if ($i == 3){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$team' WHERE series = 'pac23'");
	}
	$i++;	
}

$sql = mysqli_query($db, "SELECT * FROM metro_leaders");
$i=1;
while($i <=3 && $r = mysqli_fetch_array($sql)){
	$team = $r['teamShort'];
	if ($i == 1){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'met14'");
	}
	if ($i == 2){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'met23'");
	}	
	if ($i == 3){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$team' WHERE series = 'met23'");
	}
	$i++;	
}

$sql = mysqli_query($db, "SELECT * FROM atlantic_leaders");
$i=1;
while($i <=3 && $r = mysqli_fetch_array($sql)){
	$team = $r['teamShort'];
	if ($i == 1){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'atl14'");
	}
	if ($i == 2){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET hometeam = '$team' WHERE series = 'atl23'");
	}	
	if ($i == 3){
		$team = $r['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$team' WHERE series = 'atl23'");
	}
	$i++;	
}

$westtop = "";
$westtwo = "";
$sqlw = mysqli_query($db, "SELECT * FROM pacific_leaders WHERE place = 1 UNION ALL SELECT * FROM central_leaders WHERE place = 1 ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$j=1;
while ($j <=2 && $rw = mysqli_fetch_array($sqlw)){
	if ($j == 1){
		$westtop = $rw['teamShort'];
	}
	elseif ($j == 2){
		$westtwo = $rw['teamShort'];
	}
	$j++;
}

//Next 2 best teams in each conference get Wild Card playoff spots
$easttop = "";
$easttwo = "";
$sqle = mysqli_query($db, "SELECT * FROM atlantic_leaders WHERE place = 1 UNION ALL SELECT * FROM metro_leaders WHERE place = 1 ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$j=1;
while ($j <=2 && $rw = mysqli_fetch_array($sqle)){
	if ($j == 1){
		$easttop = $rw['teamShort'];
	}
	elseif ($j == 2){
		$easttwo = $rw['teamShort'];
	}
	$j++;
}

$sqlwest = mysqli_query($db,"SELECT * FROM nhlteams WHERE conference = 'West' AND team NOT IN (SELECT team FROM pacific_leaders UNION ALL SELECT team FROM central_leaders) ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$k=1;
while($k <= 2 && $roww = mysqli_fetch_array($sqlwest)){
	if ($k == 1){
		$topwc = $roww['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$topwc' WHERE hometeam = '$westtwo'");
	}
	else if ($k == 2){
		$botwc = $roww['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$botwc' WHERE hometeam = '$westtop'");		
	}
	$k++;
}


$sqleast = mysqli_query($db, "SELECT * FROM nhlteams WHERE conference = 'East' AND team NOT IN (SELECT team FROM atlantic_leaders UNION ALL SELECT team FROM metro_leaders) ORDER BY pts DESC, pp DESC, row DESC, gd DESC, team ASC");
$k=1;
while($k <= 2 && $rowe = mysqli_fetch_array($sqleast)){
	if ($k == 1){
		$topwc = $rowe['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$topwc' WHERE hometeam = '$easttwo'");
	}
	else if ($k == 2){
		$botwc = $rowe['teamShort'];
		mysqli_query($db, "UPDATE nhlround1 SET awayteam = '$botwc' WHERE hometeam = '$easttop'");		
	}
	$k++;
}

//Award the Presidents' trophy (most points) when the season is over
$finished = [];
$len = count($finished);
for ($i = 1; $i <= 31; $i++){
	$sqlpres = mysqli_query($db, "SELECT w, l, otl, teamShort FROM nhlteams WHERE tid = $i");	
	$r = mysqli_fetch_array($sqlpres);
	$team = $r['teamShort'];
	$w = $r['w'];
	$l = $r['l'];
	$otl = $r['otl'];
	$gp = $w + $l + $otl;
	echo $team . ": " . $gp . $n;
	if ($gp == 82){
		array_push($finished, $team);
	}
}

if ($len == 31){
	$sql = mysqli_query($db, "SELECT tid, pres FROM nhlteams ORDER BY pts DESC, w DESC");
	$r = mysqli_fetch_array($sql);
	$id = $r['tid'];
	$pres = $r['pres'];
	$pres = $pres + 1;
	mysqli_query($db, "UPDATE nhlteams SET pres = $pres WHERE tid = $id");
}

header("location: updateStandings.php");

?>