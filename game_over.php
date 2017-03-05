<?php 
	include 'partial/header.php';

    define('DSN', 'mysql:host=localhost;dbname=slackness');
    define('USER', 'root');
    define('MDP', '');

                try {
				        $pdo = new PDO(DSN, USER, MDP);
				} catch (Exception $e) {
					    echo 'La bdd est indisponible <br/>';
				}

            $list_score = 'SELECT * FROM `result` ORDER BY `score` DESC LIMIT 5';

			$read_list_score = $pdo->query($list_score);

			$list_scores = $read_list_score->fetchAll(PDO::FETCH_OBJ);
 ?>

<div id="enter-game"> 
    <a href="index.php"><img src="web/img/logo_slackness.png" alt="logo"></a>
    <div class="gameov">Bien tenté, cliques sur <span>Rejouer</span> pour passer aux rattrapages ! </div>
    <form action="index.php" method="POST">
    <button type="submit" class="button-css">Rejouer</button>
    <div id="result"></div>
    <div class="gameov">
    <table>
   <caption class:"caption">Voici nos <em>5</em> meilleurs <em>Slacker</em></caption>

   <tr>
       <th> Slacker </th>
       <th> Scores </th>
       <th> Niveau </th>
   </tr>
  <?php foreach($list_scores as $lines) {?>
   <tr>
       <td><?= $lines->player; ?> </td>
       <td><em><?= $lines->score; ?></em> pts</td>
       <td> <?= $lines->level; ?></td>
   </tr>
   <?php } ?>
</table>
</div>
    </form>
</div>


 <?php include 'partial/footer.php'; ?>