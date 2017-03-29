<?php 
  include "Warrior.php";
  include "Knight.php";
  include "Beserker.php";
  
  //make knight
  $k = new Knight("Walt");
  
  //make beserker
	$b = new Beserker("Dave");
  //define round count
  $round = 1;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment 3</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--put opening here-->
  <h2>WELCOME TO THE ARENA!</h2>
  <h3>Tonight! We shall watch as <?php echo($k->getName());?> engages in deadly combat with <?php echo($b->getName());?>!</h3>
  <br/>
  
  <?php 
    //while (no one is dead) 
    while(! $k->isDead() && ! $b->isDead()):  

  ?>

  <h3>ROUND <?php echo($round); ?>!</h3>
  <h4><?php echo($k); ?>&nbsp;&nbsp;vs.&nbsp;&nbsp;<?php echo($b); ?></h4>


  <?php 

    //flip coin
    if(rand(0, 99) >= 50){
      
      ?><h4><?php $k->attack($b);?>
      <br/><?php $b->attack($k);?>
      <br/><?php $k->attack($b);?></h4><?php
    }
    else{
      ?><h4><?php $b->attack($k);?>
      <br/><?php $k->attack($b);?>
      <br/><?php $b->attack($k);?></h4><?php
    }


    //end while loop
    $round += 1;
    endwhile;
  ?>
  <br/>
  
  <h3>
  <?php 
    if(! $k->isDead() && $b->isDead()) echo($k->getName());
    else if($k->isDead() && ! $b->isDead()) echo($b->getName());
    else echo("Death");

  ?> is Victorious!</h3>
  <h4><?php echo($k); ?>&nbsp;&nbsp;vs.&nbsp;&nbsp;<?php echo($b); ?></h4>
    
</body>
</html>