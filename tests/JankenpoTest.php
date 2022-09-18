<?php
namespace andredepaulaterceiro;
require_once getcwd() . '/Jankenpo.php';

class JankenpoTest extends \PHPUnit\Framework\TestCase {
    /**
     * Jankenpo class instance
     * 
     * @var andredepaulaterceiro\Jankenpo
     */
    private $Jankenpo;

    /**
     * Method executed once before all tests
     *
     * @access protected
     * 
     * @return void
     */
    protected function setUp(): void {
        parent::setUp();
        $this->Jankenpo = new Jankenpo;
    }

    /**
     * Tests the conversion of 'p' to 1
     * 
     * @access public
     * 
     * @return null
     */
    public function testConversionOfPTo1() {
        $this->assertEquals(
            $this->Jankenpo->convertCharacterOptionToIntegerOption('p'),
            1
        );
    }

    /**
     * Tests the conversion of 'r' to 2
     * 
     * @access public
     * 
     * @return null
     */
     public function testConversionOfRTo2() {
        $this->assertEquals(
            $this->Jankenpo->convertCharacterOptionToIntegerOption('r'),
            2
        );
    }

    /**
     * Tests the conversion of 's' to 3
     * 
     * @access public
     * 
     * @return null
     */
    public function testConversionOfSTo3() {
        $this->assertEquals(
            $this->Jankenpo->convertCharacterOptionToIntegerOption('s'),
            3
        );
    }

    /**
     * Tests the throwing of an exception in the conversion
     * 
     * @access public
     * 
     * @return null
     */
    public function testExceptionInCharacterUserOptionConversion() {
        $this->expectException(
            \OutOfBoundsException::class
        );

        $this->Jankenpo->convertCharacterOptionToIntegerOption('w');
    }

    /**
     * Tests the conversion of '1' to 'paper'
     * 
     * @access public
     * 
     * @return null
     */
    public function testConversionOf1ToPaper() {
        $this->assertEquals(
            $this->Jankenpo->convertIntegerOptionToStringOption(1),
            'paper'
        );
    }

    /**
     * Tests the conversion of '2' to rock
     * 
     * @access public
     * 
     * @return null
     */
     public function testConversionOf2ToRock() {
        $this->assertEquals(
            $this->Jankenpo->convertIntegerOptionToStringOption(2),
            'rock'
        );
    }

    /**
     * Tests the conversion of 's' to 3
     * 
     * @access public
     * 
     * @return null
     */
    public function testConversionOf3ToScissor() {
        $this->assertEquals(
            $this->Jankenpo->convertIntegerOptionToStringOption(3),
            'scissor'
        );
    }

    /**
     * Tests the throwing of an exception in the conversion
     * 
     * @access public
     * 
     * @return null
     */
    public function testExceptionInIntegerUserOptionConversion() {
        $this->expectException(
            \OutOfBoundsException::class
        );

        $this->Jankenpo->convertIntegerOptionToStringOption(4);
    }
    
    /**
     * Test of match:
     * User: Paper
     * Computer: Paper
     * 
     * Result: Draw
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserPaperComputerPaperDraw() {
        $mock = $this->setupProcessTest(Jankenpo::PAPER);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_PAPER),
            Jankenpo::INTEGER_DRAW
        );
    }

    /**
     * Test of match:
     * User: Paper
     * Computer: Rock
     * 
     * Result: Player wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserPaperComputerRockUserWins() {
        $mock = $this->setupProcessTest(Jankenpo::ROCK);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_PAPER),
            Jankenpo::INTEGER_PLAYER_WINS
        );
    }

    /**
     * Test of match:
     * User: Paper
     * Computer: Scissor
     * 
     * Result: Computer wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserPaperComputerScissorComputerWins() {
        $mock = $this->setupProcessTest(Jankenpo::SCISSOR);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_PAPER),
            Jankenpo::INTEGER_COMPUTER_WINS
        );
    }

    /**
     * Test of match:
     * User: Rock
     * Computer: Paper
     * 
     * Result: Computer wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserRockComputerPaperComputerWins() {
        $mock = $this->setupProcessTest(Jankenpo::PAPER);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_ROCK),
            Jankenpo::INTEGER_COMPUTER_WINS
        );
    }

    /**
     * Test of match:
     * User: Rock
     * Computer: Rock
     * 
     * Result: Draw
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserRockComputerRockDraw() {
        $mock = $this->setupProcessTest(Jankenpo::ROCK);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_ROCK),
            Jankenpo::INTEGER_DRAW
        );
    }

    /**
     * Test of match:
     * User: Rock
     * Computer: Scissor
     * 
     * Result: Player wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserRockComputerScissorUserWins() {
        $mock = $this->setupProcessTest(Jankenpo::SCISSOR);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_ROCK),
            Jankenpo::INTEGER_PLAYER_WINS
        );
    }

    /**
     * Test of match:
     * User: Scissor
     * Computer: Paper
     * 
     * Result: Player wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserScissorComputerPaperPlayerWins() {
        $mock = $this->setupProcessTest(Jankenpo::PAPER);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_SCISSOR),
            Jankenpo::INTEGER_PLAYER_WINS
        );
    }

    /**
     * Test of match:
     * User: Scissor
     * Computer: Rock
     * 
     * Result: Computer wins
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserScissorComputerRockPlayerWins() {
        $mock = $this->setupProcessTest(Jankenpo::ROCK);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_SCISSOR),
            Jankenpo::INTEGER_COMPUTER_WINS
        );
    }

    /**
     * Test of match:
     * User: Scissor
     * Computer: Scissor
     * 
     * Result: Draw
     * 
     * @access public
     * 
     * @return null
     */
    public function testProcessUserScissorComputerScissorDraw() {
        $mock = $this->setupProcessTest(Jankenpo::SCISSOR);

        $this->assertEquals(
            $mock->process(Jankenpo::CHARACTER_SCISSOR),
            Jankenpo::INTEGER_DRAW
        );
    }

    /**
     * Auxiliar method to other tests
     * 
     * @access public
     * 
     * @return Mock_Jankenpo
     */
    public function setupProcessTest($integerComputerChoice) {
        $mock = $this->getMockBuilder(\andredepaulaterceiro\Jankenpo::class)
            ->onlyMethods(['getIntegerComputerChoice'])
            ->getMock();

        $mock->expects($this->exactly(1))
            ->method('getIntegerComputerChoice')
            ->will($this->returnValue($integerComputerChoice));

        return $mock;
    }
}