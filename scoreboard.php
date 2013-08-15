<?php
/*
 * Codejudge
 * Copyright 2012, Sankha Narayan Guria (sankha93@gmail.com)
 * Licensed under MIT License.
 *
 * Scoreboard page
 */
	require_once('functions.php');
	if(!loggedin())
		header("Location: login.php");
	else
		include('header.php');
		connectdb();
?>
              <li><a href="index.php">Problemas</a></li>
              <li><a href="submissions.php">Submissões</a></li>
              <li class="active"><a href="scoreboard.php">Quadro de resultados</a></li>
              <li><a href="account.php">Conta</a></li>
              <li><a href="logout.php">Sair</a></li>

     
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
As posições atuais de todos os participantes, o número de problemas que eles tentaram resolver.
    <table class="table table-striped">
      <thead><tr>
        <th>Nome</th>
        <th>Resolvido</th>
        <th>Tentativas</th>
      </tr></thead>
      <tbody>
      <?php
        $query = "SELECT username, status, score FROM users WHERE username!='admin' ORDER BY score DESC";
        $result = mysql_query($query);
       	while($row = mysql_fetch_array($result)) {
       		// displays the user, problems solved and attempted
       		$sql = "SELECT * FROM solve WHERE (status='2' AND username='".$row['username']."')";
       		$res = mysql_query($sql);
       		echo("<tr><td>".$row['username']." ");
       		if($row['status'] == 0) echo("</a> <span class=\"label label-important\">Banned</span>");
       		echo("</td><td><span class=\"badge badge-success\">".mysql_num_rows($res));
       		$sql = "SELECT * FROM solve WHERE (status='1' AND username='".$row['username']."')";
       		$res = mysql_query($sql);
       		echo("</span></td><td><span class=\"badge badge-warning\">".mysql_num_rows($res)."</span></td></tr>");
       	}
      ?>
      </tbody>
      </table>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
