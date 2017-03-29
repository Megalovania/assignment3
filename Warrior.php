<?php
	// This is the file for the parent class

	class Warrior {
		protected $def;
    protected $att;
    protected $health;
    protected $name;
    
    public function __CONSTRUCT($name){
      $this->health = 100;
      $this->def = 30;
      $this->att = 50;
      $this->name = $name;      
    }
    
    
    /*
    How attacking works: 
    The enemies defense is subtracted from the warriors attack
    If the result is positive, enemy loses the difference
    otherwise the attacker loses half the difference
    */
    public function attack($enemy){
      $result = 0;
      if($this->isInjured()){
        $result = $this->att - 10 - $enemy->getDef();
        echo($this->name . " is injured, but attacks!");
      }
      else{
        $result = $this->att - $enemy->getDef();
        echo($this->name . " attacks!");
      }
      
      if($result > 0){
        $enemy->loseHealth($result);
      }
      else if($result < 0){
        $this->loseHealth((int)$result/2);
      }
      
    }
    
    //Extra state the decrements warrior's attack
    private function isInjured(){
      if($this->health < 30) return TRUE;
      else return FALSE;
    }
    
    //lower's health
    public function loseHealth($h){
      if($h > 0) $this->health -= $h;
      else $this->health += $h;
    }
    
    //returns whether or not warrior is dead
    public function isDead(){
      if($this->health <= 0){
        $this->health = 0;
        return TRUE;
      }
      else return FALSE;
    }
    
    //returns the warriors defense
    public function getDef(){
      return $this->def;
    }
    
    //prints warrior name
    public function __TOSTRING(){
      return($this->name);
      
    }
	}

?>