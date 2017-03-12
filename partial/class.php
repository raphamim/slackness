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

	public function getIsAlive(){
		return $this->isAlive;
	}

	public function setIsAlive($isAlive){
		$this->isAlive = $isAlive;
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

	protected $face;
	protected $isLogged= false;
	protected $score;
	protected $level;
	protected $time;

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

	public function setLevel($level){
		$this->level = $level;
	}

	public function getLevel(){
		return $this->level;
	}

	public function setTime($time){
		$this->time = $time;
	}

	public function getTime(){
		return $this->time;
	}

	public function alive(){
		if ($this->life == 0) {
			$this->isAlive= false;
			/*header('Location: game_over.php');
			exit();*/
			session_start();
			$_SESSION['name'] = $this->name;
			$_SESSION['score'] = $this->score;
			$_SESSION['time'] = $this->time;
			$_SESSION['level'] = $this->level;
		} else {
			return $this->name." est encore en vie !";
		}
	}

	// Fonction pour afficher le résultats lors du game over
	public function result(){
		return 'Bien essayé <span>'.$this->name.'</span>! Tu as atteint un score de <span>'.$this->score.'</span> en seulement'.$this->time.' secondes<br/> 
		Es-tu assez bon pour rentrer dans notre classement ? Réponse ci-dessous !';
	}

	// Fonction pour le choix du personnage
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
								return 'captamerica';
				break;
			case 'homer':
								return 'homersimpson';
				break;
			case 'iron':
								return 'ironman';
				break;
			case 'mickey':
								return 'mickey';
				break;
			case 'stitch':
								return 'stitch';
				break;
			case 'winnie':
								return 'winnie';
				break;
			case 'yoda':
								return 'yoda';
				break;
		}
	}
}


