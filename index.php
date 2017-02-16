<?php
session_start();

$_SESSION['deck'] = array(
    "SA" => 1, 11,
    "S2" => 2,
    "S3" => 3,
    "S4" => 3,
    "S5" => 5,
    "S6" => 6,
    "S7" => 7,
    "S8" => 8,
    "S9" => 9,
    "S10" =>10,
    "SJ" => 10,
    "SQ" => 10,
    "SK" => 10,
    "CA" => 1, 11,
    "C2" => 2,
    "C3" => 3,
    "C4" => 3,
    "C5" => 5,
    "C6" => 6,
    "C7" => 7,
    "C8" => 8,
    "C9" => 9,
    "C10" =>10,
    "CJ" => 10,
    "CQ" => 10,
    "CK" => 10,
    "DA" => 1, 11,
    "D2" => 2,
    "D3" => 3,
    "D4" => 3,
    "D5" => 5,
    "D6" => 6,
    "D7" => 7,
    "D8" => 8,
    "D9" => 9,
    "D10" =>10,
    "DJ" => 10,
    "DQ" => 10,
    "DK" => 10,
    "HA" => 1, 11,
    "H2" => 2,
    "H3" => 3,
    "H4" => 3,
    "H5" => 5,
    "H6" => 6,
    "H7" => 7,
    "H8" => 8,
    "H9" => 9,
    "H10" =>10,
    "HJ" => 10,
    "HQ" => 10,
    "HK" => 10,
);


/*
$_SESSION['deck'] = array(
    'SA','S2','S3','S4','S5','S6','S7','S8','S9','S10','SJ','SQ','SK',
    'CA','C2','C3','C4','C5','C6','C7','C8','C9','C10','CJ','CQ','CK',
    'DA','D2','D3','D4','D5','D6','D7','D8','D9','D10','DJ','DQ','DK',
    'HA','H2','H3','H4','H5','H6','H7','H8','H9','H10','HJ','HQ','HK', );

*/

$_SESSION['hand'] = array();


function shuffleDeck(){
    shuffle($_SESSION['deck']);
    return $_SESSION['deck'];
}

function associateTag(){

}

function dealHand(){
shuffleDeck();
for($x=0;$x<2;$x++){
    $_SESSION['hand'][$x]=$_SESSION['deck'][$x];
    }
}



shuffleDeck();
print_r($_SESSION['deck']);

