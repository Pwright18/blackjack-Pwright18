<?php
session_start();
require_once ("deck.php");

?>
    <form action="index.php">
        <input type="submit" value="Restart" name="action"  />
        <input type="submit" value="Hit" name="action"  />
        <input type="submit" value="Pass" name="action"  />
    </form>
<?php

array($master = [
    ['name' => 'Ace of Spades', 'value' => 11,],
    ['name' => 'Two of Spades', 'value' => 2],
    ['name' => 'Three of Spades', 'value' => 3],
    ['name' => 'Four of Spades', 'value' => 4],
    ['name' => 'Five of Spades', 'value' => 5],
    ['name' => 'Six of Spades', 'value' => 6],
    ['name' => 'Seven of Spades', 'value' => 7],
    ['name' => 'Eight of Spades', 'value' => 8],
    ['name' => 'Nine of Spades', 'value' => 9],
    ['name' => 'Ten of Spades', 'value' => 10],
    ['name' => 'Jack of Spades', 'value' => 10],
    ['name' => 'Queen of Spades', 'value' => 10],
    ['name' => 'King of Spades', 'value' => 10],

    ['name' => 'Ace of Clubs', 'value' => 11,],
    ['name' => 'Two of Clubs', 'value' => 2],
    ['name' => 'Three of Clubs', 'value' => 3],
    ['name' => 'Four of Clubs', 'value' => 4],
    ['name' => 'Five of Clubs', 'value' => 5],
    ['name' => 'Six of Clubs', 'value' => 6],
    ['name' => 'Seven of Clubs', 'value' => 7],
    ['name' => 'Eight of Clubs', 'value' => 8],
    ['name' => 'Nine of Clubs', 'value' => 9],
    ['name' => 'Ten of Clubs', 'value' => 10],
    ['name' => 'Jack of Clubs', 'value' => 10],
    ['name' => 'Queen of Clubs', 'value' => 10],
    ['name' => 'King of Clubs', 'value' => 10],

    ['name' => 'Ace of Diamonds', 'value' => 11,],
    ['name' => 'Two of Diamonds', 'value' => 2],
    ['name' => 'Three of Diamonds', 'value' => 3],
    ['name' => 'Four of Diamonds', 'value' => 4],
    ['name' => 'Five of Diamonds', 'value' => 5],
    ['name' => 'Six of Diamonds', 'value' => 6],
    ['name' => 'Seven of Diamonds', 'value' => 7],
    ['name' => 'Eight of Diamonds', 'value' => 8],
    ['name' => 'Nine of Diamonds', 'value' => 9],
    ['name' => 'Ten of Diamonds', 'value' => 10],
    ['name' => 'Jack of Diamonds', 'value' => 10],
    ['name' => 'Queen of Diamonds', 'value' => 10],
    ['name' => 'King of Diamonds', 'value' => 10],

    ['name' => 'Ace of Hearts', 'value' => 11,],
    ['name' => 'Two of Hearts', 'value' => 2],
    ['name' => 'Three of Hearts', 'value' => 3],
    ['name' => 'Four of Hearts', 'value' => 4],
    ['name' => 'Five of Hearts', 'value' => 5],
    ['name' => 'Six of Hearts', 'value' => 6],
    ['name' => 'Seven of Hearts', 'value' => 7],
    ['name' => 'Eight of Hearts', 'value' => 8],
    ['name' => 'Nine of Hearts', 'value' => 9],
    ['name' => 'Ten of Hearts', 'value' => 10],
    ['name' => 'Jack of Hearts', 'value' => 10],
    ['name' => 'Queen of Hearts', 'value' => 10],
    ['name' => 'King of Hearts', 'value' => 10],
]);


function dealPlayer($who)
{
    $_SESSION['game'][$who][] = dealCard();



}


function deal(){
    $_SESSION['dealNumber']++;
    return ($_SESSION['deck'][$_SESSION['dealNumber']]);
}
echo "<strong>Aces will be counted as 11." . "<br/>" . "Closest to 21 Wins." . "<br/>" . "<br/></strong>";
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'Restart':
            session_unset();
            echo "<strong><i>Your Hand: </i></strong>";
            $_SESSION['dealNumber'] = 0;
            shuffle($master);
            $_SESSION['deck'] = $master;
            $playerHand = [];
            $card1 = deal();
            array_push($playerHand, $card1);
            $card1 = deal();
            array_push($playerHand, $card1);
            $_SESSION['playerHand'] = $playerHand;
            echo "<br/>";
            for($y = 0;$y<count($_SESSION['playerHand']);$y++){
                echo $_SESSION['playerHand'][$y]['name'],"<br/>";
            }
            $playerValue = 0;
            for($x=0;$x<count($_SESSION['playerHand']); $x++){
                $playerValue = $playerValue + $_SESSION['playerHand'][$x]['value'];
            }
            $_SESSION['playerValue'] = $playerValue;
            echo "<br/>";
            echo "Your hand's value is <strong>$playerValue</strong>";
            echo "<br/>";
            echo "<br/>";

            $_SESSION['dealNumber'] = 0;
            shuffle($master);
            $_SESSION['deck'] = $master;
            $dealerHand = [];
            $card1 = deal();
            array_push($dealerHand, $card1);
            $card1 = deal();
            array_push($dealerHand, $card1);

            $_SESSION['dealerHand'] = $dealerHand;


            echo "<strong><i>Dealer's Hand:</i></strong>";
            echo "<br/>";
            echo $_SESSION['dealerHand'][0]['name'];
            echo "<br/>";
            echo "----HIDDEN----";
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][2])){
                echo $_SESSION['dealerHand'][2]['name'];
            }
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][3])){
                echo $_SESSION['dealerHand'][3]['name'];
            }
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][4])){
                echo $_SESSION['dealerHand'][4]['name'];
            }
            echo "<br/>";







            $dealerValue = 0;
            for($x=0;$x<count($_SESSION['dealerHand']); $x++){
                $dealerValue = $dealerValue + $_SESSION['dealerHand'][$x]['value'];
            }
            $_SESSION['dealerValue'] = $dealerValue;

            break;
        case 'Hit':
            $card1 = deal();
            array_push($_SESSION['playerHand'], $card1);
            echo "<strong><i>Your Hand: </i></strong>";
            echo "<br/>";
            for($y = 0;$y<count($_SESSION['playerHand']);$y++){
                echo $_SESSION['playerHand'][$y]['name'],"<br/>";
            }

            //GET THE VALUE OF THE PLAYER HAND

            $playerValue = 0;
            for($x=0;$x<count($_SESSION['playerHand']); $x++){
                $playerValue = $playerValue + $_SESSION['playerHand'][$x]['value'];
            }
            $_SESSION['playerValue'] = $playerValue;

            //IF THE DEALER IS LESS THAN 17 DRAW

            if ($_SESSION['dealerValue'] <17){
                $card1 = deal();
                array_push($_SESSION['dealerHand'], $card1);
            }

            //GET THE VALUE OF THE DEALER'S HAND

            $dealerValue = 0;
            for($x=0;$x<count($_SESSION['dealerHand']); $x++){
                $dealerValue = $dealerValue + $_SESSION['dealerHand'][$x]['value'];
            }
            $_SESSION['dealerValue'] = $dealerValue;


            echo "<br/>";
            echo "Your hand's value is <strong>$playerValue</strong>";
            echo "<br/>";
            echo "<br/>";
            echo "<strong><i>Dealer's Hand:</i></strong>";
            echo "<br/>";
            echo $_SESSION['dealerHand'][0]['name'];
            echo "<br/>";
            echo "----HIDDEN----";
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][2])){
                echo $_SESSION['dealerHand'][2]['name'];
            }
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][3])){
                echo $_SESSION['dealerHand'][3]['name'];
            }
            echo "<br/>";
            if(isset($_SESSION['dealerHand'][4])){
                echo $_SESSION['dealerHand'][4]['name'];
            }
            echo "<br/>";
/*
            for($y = 0;$y<count($_SESSION['dealerHand']);$y++){
                echo $_SESSION['dealerHand'][$y]['name'],"<br/>";
            }
*/


            if ($_SESSION['playerValue'] > 21){
                echo "<strong>You have Lost. If you want to play again, press 'restart'</strong>";
            }
            if (($_SESSION['dealerValue'] > 21) &&($_SESSION['playerValue'] <21)){
                    echo "<strong>You have won! If you want to play again, press 'restart'</strong>";

            }




            break;
        case 'Pass':

            //ECHO YOUR HAND
            echo "<strong><i>Your Hand: </i></strong>";
            echo "<br/>";
            for($y = 0;$y<count($_SESSION['playerHand']);$y++){
                echo $_SESSION['playerHand'][$y]['name'],"<br/>";
            }

            //GET YOUR PLAYER VALUE
            $playerValue = 0;
            for($x=0;$x<count($_SESSION['playerHand']); $x++){
                $playerValue = $playerValue + $_SESSION['playerHand'][$x]['value'];
            }
            $_SESSION['playerValue'] = $playerValue;


            //MORE ECHOING
            echo "<br/>";
            echo "Your hand's value is <strong>$playerValue</strong>";
            echo "<br/>";
            echo "<br/>";


            if($_SESSION['dealerValue'] < 17){
                $card1 = deal();
                array_push($_SESSION['dealerHand'], $card1);
            }

            echo "<strong><i>Dealer's Hand: </i></strong>";
            echo "<br/>";
            for($y = 0;$y<count($_SESSION['dealerHand']);$y++){
                echo $_SESSION['dealerHand'][$y]['name'],"<br/>";
            }

            if($_SESSION['dealerValue'] >21){
                echo "<strong>You have won! If you want to play again, press 'restart'</strong>";
            }
            if($_SESSION['dealerValue'] >= $_SESSION['playerValue']){
                echo "<strong>You have Lost. If you want to play again, press 'restart'</strong>";
            } else {
                echo "<strong>You have won! If you want to play again, press 'restart'</strong>";
            }
            break;
        default:
            break;

    }

}


