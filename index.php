<?php
session_start();
?>
    <form >
        <input type="submit" value="Restart" name="action"  />
        <input type="submit" value="Hit" name="action"  />
        <input type="submit" value="Pass" name="action"  />
    </form>
<?php

$master = [
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
];

function deal(){
    return array_pop($_SESSION['deck']);
}

function printPlayerHand() {
    echo "<strong><i>Your Hand: </i></strong><br/>";
    $_SESSION['playerValue'] = 0;
    for($y = 0; $y < count($_SESSION['playerHand']); $y++){
        echo "{$_SESSION['playerHand'][$y]['name']}, <br/>";
        $_SESSION['playerValue'] += $_SESSION['playerHand'][$y]['value'];
    }
    echo "<br/>";
    echo "Your hand's value is <strong>{$_SESSION['playerValue']}</strong><br/><br/>";
}

function printDealerHand() {
    $showing = 0;
    $_SESSION['dealerValue'] = 0;
    echo "<strong><i>Dealer's Hand:</i></strong><br/>";
    for($y = 0; $y < count($_SESSION['dealerHand']); $y++){
        if ($y > 0) {
            echo "{$_SESSION['dealerHand'][$y]['name']}, <br/>";
            $showing += $_SESSION['dealerHand'][$y]['value'];
        }
        $_SESSION['dealerValue'] += $_SESSION['dealerHand'][$y]['value'];
    }
    echo "----HIDDEN----<br />";
    echo "Dealer hand's value is <strong>{$showing}</strong><br/><br/>";
}

function checkWinner() {
    $d = $_SESSION['dealerValue'];
    $p = $_SESSION['playerValue'];

    if ($d > 21) {
        return "Dealer Busts. Player Wins!";
    }
    if ($p > 21) {
        return "Player Busts. Dealer Wins!";
    }
    if ($d > $p) {
        return "Dealer Wins with $d and Player loses with $p!";
    }
    return "Player wins with $p and Dealer loses with $d!";
}

echo "<strong>Aces will be counted as 11." . "<br/>" . "Closest to 21 Wins." . "<br/>" . "<br/></strong>";
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'Restart':
            session_unset();

            shuffle($master);
            $_SESSION['deck'] = $master;
            $_SESSION['playerHand'] = [];
            $_SESSION['dealerHand'] = [];
            $_SESSION['playerValue'] = 0;
            $_SESSION['dealerValue'] = 0;

            for ($x = 0; $x < 2; $x++) {
                $_SESSION['playerHand'][] = deal();
                $_SESSION['dealerHand'][] = deal();
            }

            printPlayerHand();
            printDealerHand();
            break;

        case 'Hit':
            $_SESSION['playerHand'][] = deal();
            printPlayerHand();
            printDealerHand();
            echo checkWinner();
            break;

        case 'Pass':
            printPlayerHand();
            while ($_SESSION['dealerValue'] < 17) {
                $_SESSION['dealerHand'][] = deal();
                printDealerHand();
            }
            echo checkWinner();
            break;
        default:
            break;
    }
}