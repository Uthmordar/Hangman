<?php
use Hangman\Game;
use Hangman\Word;

class GameTest extends \PHPUnit_Framework_TestCase{
    protected $game;

    protected function setUp(){
        $this->game=new Game(new Word('phpunit'));
    }
    
    /**
    * @test testIsLetterFound($letter)
    * @dataProvider listData
    */
    public function testIsLetterFound($letter, $presence){
        $this->assertEquals($presence, $this->game->tryLetter($letter));
    }
    public function listData(){
        return [['p', true], ['k', false], ['u', true]];
    }
    
    /**
     * @test test word recognition 
     */
    public function testTryWord(){
        $this->assertEquals(true, $this->game->tryWord('phpunit'));
        $this->assertEquals(false, $this->game->tryWord('phpunil'));
    }
    
    /**
     * @test test initial number of attempts
     */
    public function testInitialAttempts(){
        $this->assertEquals(10, $this->game->getRemainingAttempts());
    }
    
    /**
     * @test test increments attempts if wrong letter
     */
    public function testIncrementAttempts(){
        $this->game->tryLetter('p');
        $this->assertEquals(10, $this->game->getRemainingAttempts());
        $this->game->tryLetter('k');
        $this->assertEquals(9, $this->game->getRemainingAttempts());
    }
}