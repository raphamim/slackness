<?php 


// Définition de la bdd
define('DSN', 'mysql:host=localhost;dbname=slackness');
define('USER', 'root');
define('MDP', '');

Class Ajax {
 

 	
	public function sendDatas() 
	{
				try {
					$pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					echo 'La bdd est indisponible <br/>'.$e;
				}
				$player = htmlspecialchars($_POST['player']);
				$level = htmlspecialchars($_POST['level']);
				$score = htmlspecialchars($_POST['score']);
					

					$score_sent= $pdo->prepare('INSERT INTO `result` (`player`, `level`, `score`) VALUES (:player, :level, :score)');

					$score_sent->execute(array(
						'player' => $player,
                        'level' =>  $level,
						'score' =>  $score
					));
	} 		
}
 
$ajax = new Ajax();
$ajax->sendDatas();