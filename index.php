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

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'Restart':
            session_unset();
            echo "Player's Hand: ";
            $_SESSION['dealNumber'] = 0;
            shuffle($master);
            $_SESSION['deck'] = $master;
            $playerHand = [];
            $card1 = deal();
            array_push($playerHand, $card1);
            $card1 = deal();
            array_push($playerHand, $card1);
            print_r($playerHand);
            $_SESSION['playerHand'] = $playerHand;
            echo "<br/>";
            echo "<br/>";
            echo "Dealer's Hand: ";
            $_SESSION['dealNumber'] = 0;
            shuffle($master);
            $_SESSION['deck'] = $master;
            $dealerHand = [];
            $card1 = deal();
            array_push($dealerHand, $card1);
            $card1 = deal();
            array_push($dealerHand, $card1);
            print_r($dealerHand);
            $_SESSION['dealerHand'] = $dealerHand;
            break;
        case 'Hit':
            $card1 = deal();
            array_push($_SESSION['playerHand'], $card1);
            print_r($_SESSION['playerHand']);
            $value = 0;
            for($x=0;$x<count($_SESSION['playerHand']); $x++){
                $value = $value + $_SESSION['playerHand'][$x]['value'];
            }
            echo "<br/>";
            echo "<br/>";
            echo "Your hand is worth $value";

            break;
        case 'Pass':
            break;
        default:
            break;

    }

}

if (!isset($_SESSION['deck'])) {
    $_SESSION['deck'] = makeDeck();
    shuffle($_SESSION['deck']);
}

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = [
        'player' => [dealCard(), dealCard()],
        'computer' => [dealCard(), dealCard()],
    ];

}


