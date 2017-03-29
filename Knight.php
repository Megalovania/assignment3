<?php 
	// this file will extend PArentClass.php

	class Knight extends Warrior {
		
    
    
    //Unique attack, raises defense until next attack
    public function guard(){
      $this->def = 80;
      echo($this->name . " is on guard!");
    }
    
    //------------------------------------------
    public function __CONSTRUCT($name){
      $this->health = 100;
      $this->def = 40;
      $this->att = 50;
      $this->name = "Sir " . $name;      
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
        $this->def = 40;
        parent::attack($enemy);
      }
      else $this->guard();
      
    }
    
    //changes injury tolerance
    private function isInjured(){
      if($this->health < 40) return TRUE;
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