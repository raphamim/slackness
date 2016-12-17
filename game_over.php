<?php 
	include 'partial/header.php';
 ?>

<div id="enter-game"> 
    <a href="index.php"><img src="web/img/logo_slackness.png" alt="logo"></a>
    <div class="gameov">Bien tenté, cliques sur <span>Rejouer</span> pour passer aux rattrapages ! </div>
    <form action="index.php" method="POST">
    <button type="submit" class="button-css">Rejouer</button>
    <div class="gameov">
  <table class="table">
      <thead>
        <tr>
          <th> # </th>
          <th> Player </th>
          <th> Score </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>  Kevin_leBoss  </td>
          <td>  19785 pts  </td>
        </tr>
        <tr>
          <td>2</td>
          <td>  Mickey  </td>
          <td>  8745 pts  </td>
        </tr>
        <tr>
          <td>3</td>
          <td>  Toto  </td>
          <td>  7454 pts  </td>
        </tr>
        <tr>
          <td>4</td>
          <td>  Tata  </td>
          <td>  5444 pts  </td>
        </tr>
        <tr>
          <td>5</td>
          <td>  tniarcorac  </td>
          <td>  450 pts  </td>
        </tr>
        
      </tbody>
    </table>
</div>
    </form>
</div>


 <?php include 'partial/footer.php'; ?>