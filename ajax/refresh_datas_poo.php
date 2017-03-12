<?php
require '../partial/class.php'; 

if (!isset($current_player)){
$current_player = new Eleve($_POST['player'], $_POST['life']);
}

// Envoie des données à chaque actualisation
$current_player->setLevel($_POST['level']);
$current_player->setLife($_POST['life']);
$current_player->setScore($_POST['score']);
$current_player->setTime($_POST['time']);

// Vérif de la bonne réception
/* echo json_encode('Level : '.$current_player->getLevel());
echo json_encode('Score : '.$current_player->getScore());
echo json_encode('Life : '.$current_player->getLife());
echo json_encode('Time : '.$current_player->getTime()); */

// Game over en POO (si life = 0)
// $current_player->alive();

// Récupération des résultats pour l'afficher sur la page game over
echo json_encode($current_player->result());