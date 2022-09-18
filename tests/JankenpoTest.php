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
    public function testConvertPTo1() {
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
     public function testConvertRTo2() {
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
    public function testConvertSTo3() {
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
    public function testExceptionInErrorOfCharacterUserOptionConversion() {
        $this->expectException(
            \OutOfBoundsException::class
        );

        $this->Jankenpo->convertCharacterOptionToIntegerOption('w');
    }    
}