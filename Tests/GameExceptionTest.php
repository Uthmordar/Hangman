<?php
use Hangman\Game;
use Hangman\Word;

class GameExceptionTest extends \PHPUnit_Framework_TestCase{
    protected $game;

    protected function setUp(){
        $this->game=new Game(new Word('phpunit'));
    }
    
    /**
    * @expectedException InvalidArgumentException
    * @dataProvider wordList
    */
    public function testIsNoWord($word){
        new Word($word);
    }
    public function wordList(){
        return [[[]], [12], [$this->game], ['word12']];
    }
    
    /**
    * @expectedException InvalidArgumentException
    * @dataProvider letterList
    */
    public function testIsNoLetter($arg){
        $this->game->tryLetter($arg);
    }
    public function letterList(){
        return [[[]], [12], [$this->game], ['ad']];
    }
    
    /**
    * @expectedException RuntimeException
    */
    public function testAlreadyTriedLetter(){
        $this->game->tryLetter('p');
        $this->game->tryLetter('p');
    }
}