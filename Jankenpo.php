<?php
namespace andredepaulaterceiro;

class Jankenpo {
    const PAPER = 1;
    const ROCK = 2;
    const SCISSOR = 3;

    const CHARACTER_PAPER = 'p';
    const CHARACTER_ROCK = 'r';
    const CHARACTER_SCISSOR = 's';

    const INTEGER_COMPUTER_WINS = -1;
    const INTEGER_DRAW = 0;
    const INTEGER_PLAYER_WINS = 1;

    /**
     * Process the user input and says if the winner is the user,
     * the computer or is a draw
     * 
     * @access public     
     *
     * @param string  $characterUserOption The user option
     * @param boolean [$quiet=true]        If true, the result is not echoed
     *   
     * @return null
     */
    public function process($characterUserOption, $quiet = true) {
        $integerUserOption = $this->convertCharacterOptionToIntegerOption($characterUserOption);
        unset($characterUserOption);

        $integerComputerOption = $this->getIntegerComputerChoice();

        $stringUserOption = $this->convertIntegerOptionToStringOption($integerUserOption);
        $stringComputerOption = $this->convertIntegerOptionToStringOption($integerComputerOption);

        $dataToReturn = self::INTEGER_DRAW; 
        if (($integerUserOption == 1 && $integerComputerOption == 2) || ($integerUserOption == 2 && $integerComputerOption == 3) || ($integerUserOption == 3 && $integerComputerOption == 1)) {
            $winnerStringMessage = "player wins";
            $dataToReturn = self::INTEGER_PLAYER_WINS;
        } else if ($integerUserOption == $integerComputerOption) {
            $winnerStringMessage = "draw";
        } else {
            $winnerStringMessage = "computer wins";
            $dataToReturn = self::INTEGER_COMPUTER_WINS;
        }

        if (! $quiet) {
            echo "Player selected '$stringUserOption' ('$stringUserOption[0]') and computer selected '$stringComputerOption' ($stringComputerOption[0]) - $winnerStringMessage\n";
        }
        return $dataToReturn;
    }

    /**
     * Returns an integer (1 to 3) related to a random computer choice
     *
     * @access public
     *
     * @return integer
     */
    public function getIntegerComputerChoice() {
        return random_int(1, 3);
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
        if ($option == self::CHARACTER_PAPER) {
            return self::PAPER;
        }
        
        if ($option == self::CHARACTER_ROCK) {
            return self::ROCK;
        }

        if ($option == self::CHARACTER_SCISSOR) {
            return self::SCISSOR;
        }

        throw new \OutOfBoundsException("The option is not '" . self::CHARACTER_PAPER . "', " . self::CHARACTER_ROCK . " or '" . self::CHARACTER_SCISSOR . "'");
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
    public function convertIntegerOptionToStringOption($integerOption) {
        if ($integerOption == self::PAPER) {
            return 'paper';
        }
        
        if ($integerOption == self::ROCK) {
            return 'rock';
        }

        if ($integerOption == self::SCISSOR) {
            return 'scissor';
        }

        throw new \OutOfBoundsException("The option is not 1, 2 ou 3");
    }
}