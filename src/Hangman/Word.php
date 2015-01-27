<?php
namespace Hangman;

class Word{
    private $word;
    private $lettersTried=[];
    private $lettersFound=[];
    private $pattern="/^[a-z ]+$/";

    public function __construct($word){
        if(!is_string($word)){
            throw new \InvalidArgumentException('word needed.');
        }
        $word=strtolower(trim($word));
        if(!preg_match($this->pattern, $word)){
            throw new \InvalidArgumentException('only letter allowed.');
        }
        $this->word=$word;
    }
    
    /**
     * 
     * @param type $letter
     * @return type
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function tryLetter($letter){
        if(!is_string($letter) || strlen($letter)!=1 || is_numeric($letter)){
            throw new \InvalidArgumentException('letter needed.');
        }
        $letter=strtolower($letter);
        if(in_array($letter, $this->lettersTried)){
            throw new \RuntimeException('already tried letter');
        }
        $this->lettersTried[]=$letter;
        return $this->searchLetter($letter);
    }
    
    /**
     * 
     * @param type $letter
     * @return boolean
     */
    private function searchLetter($letter){
        if(strrchr($this->word, $letter)){
            $this->lettersFound[]=$letter;
            return true;
        }
        return false;
    }
    
    /**
     * 
     * @return type
     */
    public function getLettersFound(){
        return $this->lettersFound;
    }
    
    /**
     * 
     * @return type
     */
    public function getWord(){
        return $this->word;
    }
    
    /**
     * 
     * @return type
     */
    public function getLettersTried(){
        return $this->lettersTried;
    }
}