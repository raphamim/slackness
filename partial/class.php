<?php

class Personnage {
	protected $name;
	protected $life;
	
	protected $isAlive= true;

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

	//Pour récupérer la face du personnage
	protected $face;
	protected $isLogged= false;
	protected $score;

	public function setFace($face){
		$this->face = $face;
	}

	public function getFace(){
		return $this->face;
	}

	public function getIsLogged(){
		return $this->isLogged;
	}

	public function setIsLogged($isLogged){
		$this->isLogged = $isLogged;
	}

	public function setScore($score){
		$this->score = $score;
	}

	public function getScore(){
		return $this->score;
	}
	public function charChoice(){
		switch ($this->getFace()) {
		case 'basic':
			echo '<style type="text/css">
                        .player-right {
                                background-image: url("web/pictures/right.png");
                                background-size: 100% 87%;
                                        }

                                .player-left {
                                    background-image: url("web/pictures/left.png");
                                    background-size: 100% 87%;
                                                }
                                                </style>';
			break;

		case 'captamerica':
            		echo '<style type="text/css">
                .player-right, .player-left {
                background-image: url("web/pictures/char/captamerica.png");
                background-size: 100% 87%;
            }

           
            </style>';
			break;

		case 'homer':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/homersimpson.png");
                    background-size: 100% 87%;
                }

    
                </style>';
			break;

		case 'iron':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/ironman.png");
                    background-size: 100% 87%;
                }

               
                </style>';
			break;

		case 'mickey':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/mickey.png");
                    background-size: 100% 87%;
                }

               
                </style>';
			break;
			
		case 'stitch':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/stitch.png");
                    background-size: 100% 87%;
                }

                
                </style>';
			break;
			
		case 'winnie':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/winnie.png");
                    background-size: 100% 87%;
                }

                </style>';
			break;

		case 'yoda':
                			echo '<style type="text/css">
                    .player-right, .player-left {
                    background-image: url("web/pictures/char/yoda.png");
                    background-size: 100% 87%;
                }

                
                </style>';
			break;		
		
		default:
                			echo '<style type="text/css">
                    .player-right {
                    background-image: url("web/pictures/right.png");
                    background-size: 100% 87%;
                }

                .player-left {
                    background-image: url("web/pictures/left.png");
                    background-size: 100% 87%;
                }
                </style>';
			break;
	}

	}


	
	// public function jump(){}
	// public function kill(){}

	//il gagne le niveau + passe au suivant
	public function win(){}
}




//CLASS DES ENNEMIS
class Enemy extends Personnage {
	//on récupère la nature du pouvoir avec un name 
	protected $power;

	public function attack() {}



}

// class Laziness extends Enemy {
// 	//fonction qui ralentit le personnage
// 	public function slowPerso(){}
// }


// class Sncf extends Enemy {
// 	// fonction qui accélère la vitesse de déplacement de l'ennemi
// 	public function speedMove(){}
// }
// class Graduation extends Enemy {
// 	// fonction qui fait reculer le personnage
// 	public function recul(){}
// }
// class Disease extends Enemy {
// 	// fonction qui contamine le perso d'un futur effet determiné
// 	public function contamine(){}

// }



// CLASS ITEM
abstract class Item {
	protected $name;

	//changes l'apparence du personnage
	public function changePhys(){}
}

// class Coffee extends Item {
// 	// fonction qui accélère le User
// 	public function speedHeart(){}
// }

// class Drug extends Item {
// 	//fonction qui soigne le User
// 	public function heal(){}
// }

// class Shoes extends Item {
// 	//fonction qui permet de sauter plus haut
// 	public function doubleJump(){}
// }

// class SchoolBook extends Item {
// 	//fonction qui élimine tout les ennemis sur la ligne
// 	public function learn(){} 
// }


