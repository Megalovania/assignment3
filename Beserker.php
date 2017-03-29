<?php 
	// this file will extend ParentClass.php

	class Beserker extends Warrior {
		
    //Unique attack, raises attack and lowers defense until next attack
    public function heavyAttack($enemy){
      $this->def = 20;
      $result = 0;
      if($this->isInjured()){
        $result = $this->att + 30 - 10 - $enemy->getDef();
        echo($this->name . " is injured, but uses a heavy attack!");
      }
      else{
        $result = $this->att + 30 - $enemy->getDef();
        echo($this->name . " uses a heavy attack!");
      }
      
      if($result > 0){
        $enemy->loseHealth($result);
      }
      else if($result < 0){
        $this->loseHealth((int)$result/2);
      }
    }
    
    //----------------------------
    
    public function __CONSTRUCT($name){
      $this->health = 100;
      $this->def = 30;
      $this->att = 60;
      $this->name = $name . " the Mad";      
    }
    
    /*
    How attacking works: 
    The enemies defense is subtracted from the warriors attack
    If the result is positive, enemy loses the difference
    otherwise the attacker loses half the difference
    
    Kight will randomly decide to use parent attack method or his unique attack
    */
    public function attack($enemy){
      if(rand(0, 99) >= 50){
        $this->def = 30;
        parent::attack($enemy);
      }
      else $this->heavyAttack($enemy);
      
    }
    
    //changes injury tolerance
    private function isInjured(){
      if($this->health < 20) return TRUE;
      else return FALSE;
    }
    
    //returns name
    public function getName(){
      return $this->name;
    }
    
    //prints health status
    public function __TOSTRING(){
      return($this->name . "'s health: " . $this->health);
      
    }
    
	}

  ?>