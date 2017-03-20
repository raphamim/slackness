
<?php 
include 'partial/header.php';
 // Variable onoff permet de gérer l'écran de connexion ou l'écran de jeu
    $onoff = false;

    $my_id = ''; 

    // Connexion du $player (non personnelle)
        if (!empty($_POST['my_id']) && (strlen($_POST['my_id']) < 16)) {
            // On réceptionne le champ depuis le POST dans une variable
            $my_id = htmlspecialchars($_POST['my_id']);
            $player = new Eleve($my_id);
            $player->setFace(htmlspecialchars($_POST['choix']));
            $player->setIsLogged(true);
            $onoff = $player->getIsLogged(); 
        }
  // ------------ Ecran de connexion ------------      
 if ($onoff === false) {
     
 
 ?>

    <div id="enter-game">
    <a href="index.php"><img src="web/img/logo_slackness.png" alt="logo"></a>
    <form action="index.php" method="POST">
    <input id="pseudo-value" name="my_id" type="text" placeholder="maximum 15 char">
    <select name="choix">
        <option value="basic">L'étudiant</option>
        <option value="captamerica">Captain America</option>
        <option value="homer">Homer Simpson</option>
        <option value="iron">Iron Man</option>
        <option value="mickey">Mickey</option>
        <option value="stitch">Stitch</option>
        <option value="winnie">Winnie L'ourson</option>
        <option value="yoda">Yoda</option>
    </select>
    <button type="submit" id="valid-pseudo" class="button-css">Jouer</button>
    </form>
    </div>
    <?php } else { 
 // ------------ Ecran de jeu ------------
        //attribution du personnage
           if ($player->getFace() == 'basic') {
                $player->charChoice();
           } else { ?>
                <style type="text/css">
                        .player-right, .player-left {
                            background-image: url("web/pictures/char/<?= $player->charChoice();?>.png");
                            background-size: 100% 87%;
                        }
				</style>
           <?php } ?>

        <!-- Début de l'écran de jeu -->
        <embed src="web/img/theme.mp3" autostart="true" loop="false" hidden="true"></embed>
        <div id="game-area"></div>
        <div id="game-infos">
            <div id="pseudo-first">Tu es en retard <span><?= $player->getName();?></span>, fonces à l'école ! </div>
            <div id="lifepoints"></div>
            <div id="scores"></div>
            <div id="levels"></div>
            <div id="game-time">Temps de jeu : 0 seconde </div><img id="less-life" src="web/img/-life.png" alt="skull-life">
        </div>
    <?php } 

    include 'partial/footer.php';?>    
    



    