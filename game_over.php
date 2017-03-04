<?php 
	include 'partial/header.php';
 ?>

<div id="enter-game"> 
    <a href="index.php"><img src="web/img/logo_slackness.png" alt="logo"></a>
    <div class="gameov">Bien tenté, cliques sur <span>Rejouer</span> pour passer aux rattrapages ! </div>
    <form action="index.php" method="POST">
    <button type="submit" class="button-css">Rejouer</button>
    <div class="gameov">
    <table>
   <caption class:"caption">Voici nos <em>5</em> meilleurs <em>Slacker</em></caption>

   <tr>
       <th> Slacker </th>
       <th> Scores </th>
   </tr>
   <tr>
       <td>Slacker1</td>
       <td><em>124932</em> pts</td>
   </tr>
    <tr>
       <td>Slacker2sqSQ</td>
       <td><em>12433</em> pts</td>
   </tr>
    <tr>
       <td>Slackersqdqsdsq</td>
       <td><em>1243</em> pts</td>
   </tr>
    <tr>
       <td>Slackersd</td>
       <td><em>124</em> pts</td>
   </tr>
    <tr>
       <td>Slackersd</td>
       <td><em>12</em> pts</td>
   </tr>
</table>
</div>
    </form>
</div>


 <?php include 'partial/footer.php'; ?>