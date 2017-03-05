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
echo "Aces will be counted as 11." . "<br/>" . "Closest to 21 Wins." . "<br/>" . "<br/>";
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'Restart':
            session_unset();
            echo "Your Hand: ";
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
            echo "Your hand's value is $playerValue";
            echo "<br/>";
            echo "<br/>";
            echo "Dealer's Hand: ";
            echo "<br/>";

            $_SESSION['dealNumber'] = 0;
            shuffle($master);
            $_SESSION['deck'] = $master;
            $dealerHand = [];
            $card1 = deal();
            array_push($dealerHand, $card1);
            $card1 = deal();
            array_push($dealerHand, $card1);


            echo $dealerHand[0]['name'];
            echo "<br/>";
            echo "HIDDEN";
            $dealerValue = 0;
            for($x=0;$x<count($_SESSION['playerHand']); $x++){
                $dealerValue = $dealerValue + $_SESSION['playerHand'][$x]['value'];
            }
            $_SESSION['dealerValue'] = $dealerValue;
            $_SESSION['dealerHand'] = $dealerHand;
            break;
        case 'Hit':
            $card1 = deal();
            array_push($_SESSION['playerHand'], $card1);
            echo "Your Hand: ";
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
            echo "Your hand's value is $playerValue";
            echo "<br/>";
            echo "<br/>";
            echo "Dealer's Hand:";
            echo "<br/>";
            echo $_SESSION['dealerHand'][0]['name'];
            echo "<br/>";
            echo "HIDDEN";
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            if ($_SESSION['playerValue'] > 21){
                echo "You Have Lost. If you want to play again, press 'restart'";
            }




            break;
        case 'Pass':
            if($_SESSION['dealerValue'] < 17){
                $card1 = deal();
                array_push($_SESSION['dealerHand'], $card1);
                echo $_SESSION['dealerHand'][0]['name'];
                echo "<br/>";
                echo "HIDDEN";
                echo "<br/>";
                echo $_SESSION['dealerHand'][2]['name'];
                echo "<br/>";
                if ($_SESSION['dealerValue'] >= $_SESSION['playerValue']) {
                    echo "YOU LOSE!";
                }
            } else {
                if ($_SESSION['dealerValue'] >= $_SESSION['playerValue']){
                    echo "Dealer's hand:";
                    echo "<br/>";
                    echo $_SESSION['dealerHand'][0]['name'];
                    echo "<br/>";
                    echo $_SESSION['dealerHand'][1]['name'];;
                    echo "<br/>";
                    echo "<br/>";
                    echo "Dealer's hand value: " . $_SESSION['dealerValue'];
                    echo "<br/>";
                    echo "Your hand value: " . $_SESSION['playerValue'];
                    echo "<br/>";
                    echo "<br/>";




                    echo "YOU LOSE!";
                    } else {
                    echo "Dealer's Hand:";
                    echo "<br/>";
                    echo $_SESSION['dealerHand'][0]['name'];
                    echo "<br/>";
                    echo $_SESSION['dealerHand'][1]['name'];;
                    echo "<br/>";
                    echo "<br/>";
                    echo "Dealer's hand value: " . $_SESSION['dealerValue'];
                    echo "<br/>";
                    echo "Your hand value: " . $_SESSION['playerValue'];
                    echo "<br/>";
                    echo "<br/>";
                    echo "YOU WIN";
                }
            }


            break;
        default:
            break;

    }

}


