<?php
/*
 * Codejudge
 * Copyright 2012, Sankha Narayan Guria (sankha93@gmail.com)
 * Licensed under MIT License.
 *
 * Account Settings page
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
              <li><a href="scoreboard.php">Quadro de resultados</a></li>
              <li class="active"><a href="account.php">Conta</a></li>
              <li><a href="logout.php">Sair</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <?php
        if(isset($_GET['changed']))
          echo("<div class=\"alert alert-success\">\nAccount settings updated!\n</div>");
        else if(isset($_GET['passerror']))
          echo("<div class=\"alert alert-error\">\nThe old password you entered is wrong. Please enter the correct password and try again.\n</div>");
        else if(isset($_GET['derror']))
          echo("<div class=\"alert alert-error\">\nPlease enter all the details asked before you can continue!\n</div>");
    ?>
    Configurações da Conta de usuário para: <?php echo($_SESSION['username']);?><hr/>
    	  <form method="post" action="update.php">
          <input type="hidden" name="action" value="password"/>
          <h1><small>Change Password</small></h1>
          Antiga senha: <input type="password" name="oldpass"/><br/>
          Nova senha: <input type="password" name="newpass"/><br/><br/>
          <input class="btn" type="submit" name="submit" value="Mudar senha"/>
          </form>
          <hr/>
          
          <form method="post" action="update.php">
          <input type="hidden" name="action" value="email"/>
          <h1><small>Trocar E-mail</small></h1>
          <?php
          	$query = "SELECT email FROM users WHERE username='".$_SESSION['username']."'";
          	$result = mysql_query($query);
          	$fields = mysql_fetch_array($result);
          ?>
          Email: <input type="email" name="email" value="<?php echo $fields['email'];?>"/><br/><br/>
          <input class="btn" type="submit" name="submit" value="Trocar e-mail"/>
          </form>
    </div> <!-- /container -->

<?php
	include('footer.php');
?>
