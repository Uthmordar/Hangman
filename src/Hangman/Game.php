<?php
namespace Hangman;

class Game{
    private $word;
    private $attempts=0;
    const MAX_ATTEMPTS=10;

    public function __construct(Word $word){
        $this->word=$word;
    }
    
    /**
     * 
     * @return type
     */
    public function getRemainingAttempts(){
        return self::MAX_ATTEMPTS - $this->attempts;
    }
    /**
     * 
     * @param type $letter
     * @return boolean
     */
    public function tryLetter($letter){
        if($this->word->tryLetter($letter)){
            return true;
        }
        $this->attempts+=1;
        return false;
    } 
    /**
     * 
     * @param type $letter
     * @return type
     */
    public function isLetterFound($letter){
        return in_array($letter, $this->word->getLettersFound());
    }
    
    /**
     * 
     * @return type
     */
    public function getLettersFound(){
        return $this->word->getLettersFound();
    }
    
    /**
     * 
     * @return type
     */
    public function getLettersTried(){
        return $this->word->getLettersTried();
    }
    
    /**
     * 
     * @param type $word
     * @return type
     */
    public function tryWord($word){
        return ($this->word->getWord() === $word)? true:false;
    }
}