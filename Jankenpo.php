<?php
namespace andredepaulaterceiro;

class Jankenpo {
    const PAPER = 1;
    const ROCK = 2;
    const SCISSOR = 3;

    /**
     * Process the user input and says if the winner is the user,
     * the computer or is a draw
     * 
     * @access public     
     *
     * @param string $characterUserOption The user option
     *   
     * @return null
     */
    public function process($characterUserOption) {
        $integerUserOption = $this->convertCharacterOptionToIntegerOption($characterUserOption);
        unset($characterUserOption);

        $integerComputerOption = random_int(1, 3);

        $stringUserOption = $this->convertIntegerOptionToStringOption($integerUserOption);
        $stringComputerOption = $this->convertIntegerOptionToStringOption($integerComputerOption);

        if (($integerUserOption == 1 && $integerComputerOption == 2) || ($integerUserOption == 2 && $integerComputerOption == 3) || ($integerUserOption == 3 && $integerComputerOption == 1)) {
            $winnerStringMessage = "player wins";
        } else if ($integerUserOption == $integerComputerOption) {
            $winnerStringMessage = "draw";
        } else {
            $winnerStringMessage = "computer wins";
        }

        echo "Player selected '$stringUserOption' ('$stringUserOption[0]') and computer selected '$stringComputerOption' ($stringComputerOption[0]) - $winnerStringMessage\n";
    }

    /**
     * Converts the option to a integer related to a constant
     * 
     * @access public
     * 
     * @throws \OutOfBoundsException If the $option parameter is not 'p', 'r' or 's'  
     * 
     * @param string $option The character related to the user option
     * 
     * @return int
     */
    public function convertCharacterOptionToIntegerOption($option) {
        if ($option == 'p') {
            return self::PAPER;
        }
        
        if ($option == 'r') {
            return self::ROCK;
        }

        if ($option == 's') {
            return self::SCISSOR;
        }

        throw new \OutOfBoundsException("The option is not 'p', 'r' or 's'");
    }

    /**
     * Converts the integer option a number who can mapped to a integer
     * 
     * @throws \OutOfBoundsException If the $option parameter is not >= 1 an < =3  
     *
     * @access public
     * 
     * @param integer $integerOption The character related to the user option
     * 
     * @return string
     */
    public function convertIntegerOptionToStringOption($option) {
        if ($option == self::PAPER) {
            return 'paper';
        }
        
        if ($option == self::ROCK) {
            return 'rock';
        }

        if ($option == self::SCISSOR) {
            return 'scissor';
        }

        throw new \OutOfBoundsException("The option is not 1, 2 ou 3");
    }
}