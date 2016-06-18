<?php

    require_once(".\database.php");
    
    if(isset($_POST['old_mdp'])&&isset($_POST['new_mdp'])&&isset($_POST['confirm_new_mdp'])){
        $test_mdp_requete= "select * from compte where mdp = '".$_POST['old_mdp']."' AND email = '".$_SESSION['email']."';";
        $test_mdp_resultat = mysqli_query($database, $test_mdp_requete);
        $test_mdp = mysqli_fetch_array($test_mdp_resultat);
    }

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		 Mon compte
	</title>
          <script language ="javascript" type ="text/javascript">
            
           function validation(){
                    
                    if (document.mon_compte.mdp.value!==''){
                    if (document.mon_compte.confirm_mdp.value=='') {
                    document.getElementById("erreur_confirm_new_mdp").innerHTML = " Veuillez confirmer votre nouveau mot de passe.";
                    erreur = false;
                    }
                    else if (document.mon_compte.mdp.value!==document.mon_compte.confirm_mdp.value) {
                    document.getElementById("erreur_confirm_mdp").innerHTML = " Les nouveaux mots de passe ne sont pas identiques.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_confirm_mdp").innerHTML = "";
                    }
                    
                    if (document.mon_compte.mdp.value=='') {
                    document.getElementById("erreur_mdp").innerHTML = " Veuillez saisir un mot de passe.";
                    document.getElementById("erreur_confirm_mdp").innerHTML = "";
                    erreur = false;
                    }
                    else document.getElementById("erreur_mdp").innerHTML = "";
                    
                    return erreur;
           }       
        </script>
</head>

<body onload="document.mon_compte.reset();">
   <div class ="container">
       
   <h2>Mon compte</h2>
   
       <form class ="form-horizontal" name ="mon_compte" method="post" onsubmit="return validation(this)" action='mon_compte.php'>
       <table>
       <tbody>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Mot de passe actuel</label></td>
       <td><input class="form-control" name="old_mdp" size="30" type="password" id ="old_mdp"></input></td>
       <td><span style="color:red" id="erreur_old_mdp"></span></td>
       </tr>           
       
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Nouveau mot de passe</label></td>
       <td><input class="form-control" name="new_mdp" size="30" type="password" id ="new_mdp"></input></td>
       <td><span style="color:red" id="erreur_new_mdp"></span></td>
       </tr>
          
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Confirmez</label></td>
       <td><input class="form-control" name="confirm_new_mdp" size="30" type="password" id ="confirm_new_mdp"></input></td>
       <td><span style="color:red" id="erreur_confirm_new_mdp"></span></td>
       </tr>
           
       </tbody>
       </table>
       </p>
       <input class ="btn btn-success btn-lg" type="submit" value="Changer le mot de passe" >
</form>
       
    </div>
<!-- #global --></body>
</html>