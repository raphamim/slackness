<?php

class Personnage {
	protected $name;
	protected $life;
	protected $isAlive= true;

	public function moveLeft() {}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getLife(){
		return $this->life;
	}

	public function setLife($life){
		$this->life = $life;
	}

	// fonction pour savoir si le personnage Elève ou Ennemi est en vie.
	public function alive(){
		if ($this->life == 0) {
			$this->isAlive= false;
			return $this->name." a clamsé ! <br/>";
		} else {
			return $this->name." est encore en vie !";
		}
	}

	//Construct de l'objet sans paramètre obligatoire
	public function __construct($name='' ,$life=''){
		
		if ($name == '') {
			$this->name = "no_name";
		} else {
			$this->name = $name;
		}
		
		if ($life === '' OR !is_numeric($life)) 
		{
			$this->life = 1;
		} else {
			$this->life = $life;
		}
	}
}







// CLASS DE NOTRE PERSONNAGE
class Eleve extends Personnage { 

	//Pour récupérer la face du mec
	protected $face;

	public function setFace($face){
		$this->face = $face;
	}

	public function getFace(){
		return $this->face;
	}

	public function moveRight(){}
	public function jump(){}
	public function kill(){}
	//il gagne le niveau + passe au suivant
	public function win(){}
	//pour modif la face du personnage selon le bonus ou le malus qu'il prend
	public function face(){}
}
/*$test = new Eleve("fdp");
$test->setFace("cheum");
echo $test->getName()." est plutot ".$test->getFace();
*/




//CLASS DES ENNEMIS
class Enemy extends Personnage {
	//on récupère la nature du pouvoir avec un name 
	protected $power;

	public function attack() {}



}

class Laziness extends Enemy {
	//fonction qui ralentit le personnage
	public function slowPerso(){}
}


class Sncf extends Enemy {
	// fonction qui accélère la vitesse de déplacement de l'ennemi
	public function speedMove(){}
}
class Graduation extends Enemy {
	// fonction qui fait reculer le personnage
	public function recul(){}
}
class Disease extends Enemy {
	// fonction qui contamine le perso d'un futur effet determiné
	public function contamine(){}

}



// CLASS ITEM
abstract class Item {
	protected $name;

	//changes l'apparence du personnage
	public function changePhys(){}
}

class Coffee extends Item {
	// fonction qui accélère le User
	public function speedHeart(){}
}

class Drug extends Item {
	//fonction qui soigne le User
	public function heal(){}
}

class Shoes extends Item {
	//fonction qui permet de sauter plus haut
	public function doubleJump(){}
}

class SchoolBook extends Item {
	//fonction qui élimine tout les ennemis sur la ligne
	public function learn(){} 
}



//CLASS USER BASE DE DONNEES


class User {
	public $name;
	public $score;

}
