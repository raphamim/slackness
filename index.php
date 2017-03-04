
<?php 
include 'partial/header.php';
$onoff = false;
$my_id = '';

if (!empty($_POST['my_id']) && (strlen($_POST['my_id']) < 16)) {
    // On réceptionne le champ depuis le POST dans une variable
    $my_id = htmlspecialchars($_POST['my_id']);
    $player = new Eleve($my_id, 3);
    $player->setFace($_POST['choix']);
    $player->setIsLogged(true);
    $onoff = $player->getIsLogged();
    $player->charChoice();
} 

 if ($onoff === false) {
     
 
 ?>

    <div id="enter-game">
    <a href="index.php"><img src="web/img/logo_slackness.png" alt="logo"></a>
    <form action="index.php" method="POST">
    <input name="my_id" type="text" placeholder="maximum 15 char">
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
    <button type="submit" class="button-css">Jouer</button>
    </form>
    </div>
    <?php } else { 
            
        ?>
        <embed src="web/img/theme.mp3" autostart="true" loop="false" hidden="true"></embed>
        <div id="game-area"></div>
        <div id="game-infos">
            <div id="pseudo-first">Tu es en retard <span><?= $player->getName();?></span>, fonces à l'école ! </div>
            <div id="lifepoints"></div>
            <div id="levels"></div>
            <div id="game-time">Temps de jeu : 0 seconde</div>
        </div>
    <?php } 

    include 'partial/footer.php';?>    
    



    