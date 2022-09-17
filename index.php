<?php
const PAPER = 1;
const ROCK = 2;
const SCISSOR = 3;
$characterUserOption = '';

// Getting the user input
while ($characterUserOption != 'p' && $characterUserOption != 'r' && $characterUserOption != 's') {
    $characterUserOption = readline("Please insert 'p' for paper or 's' for scissor or 'r' for rock: ");
}

$integerUserOption = convertCharacterOptionToIntegerOption($characterUserOption);
unset($characterUserOption);

$integerComputerOption = random_int(1, 3);

$stringUserOption = convertIntegerOptionToStringOption($integerUserOption);
$stringComputerOption = convertIntegerOptionToStringOption($integerComputerOption);

if (($integerUserOption == 1 && $integerComputerOption == 2) || ($integerUserOption == 2 && $integerComputerOption == 3) || ($integerUserOption == 3 && $integerComputerOption == 1)) {
    $winnerStringMessage = "player wins";
} else if ($integerUserOption == $integerComputerOption) {
    $winnerStringMessage = "draw";
} else {
    $winnerStringMessage = "computer wins";
}

echo "Player selected '$stringUserOption' ('$stringUserOption[0]') and computer selected '$stringComputerOption' ($stringComputerOption[0]) - $winnerStringMessage\n";


/**
 * Converts the option to a integer related to a constant
 * 
 * @throws \OutOfBoundsException If the $option parameter is not 'p', 'r' or 's'  
 * 
 * @param string $option The character related to the user option
 * 
 * @return int
 */
function convertCharacterOptionToIntegerOption($option) {
    if ($option == 'p') {
        return PAPER;
    }
    
    if ($option == 'r') {
        return ROCK;
    }

    if ($option == 's') {
        return SCISSOR;
    }

    throw new \OutOfBoundsException("The option is not 'p', 'r' or 's'");
}

/**
 * Converts the integer option a number who can mapped to a integer
 * 
 * @throws \OutOfBoundsException If the $option parameter is not >= 1 an < =3  
 * 
 * @param integer $integerOption The character related to the user option
 * 
 * @return string
 */
function convertIntegerOptionToStringOption($option) {
    if ($option == PAPER) {
        return 'paper';
    }
    
    if ($option == ROCK) {
        return 'rock';
    }

    if ($option == SCISSOR) {
        return 'scissor';
    }

    throw new \OutOfBoundsException("The option is not 1, 2 ou 3");
}