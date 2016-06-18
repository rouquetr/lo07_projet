<?php
    require_once(".\database.php");
    session_start();
    
    $erreur = "";
    if(!empty($_POST['old_mdp'])&&!empty($_POST['new_mdp'])&&!empty($_POST['confirm_new_mdp'])){
        $test_mdp_requete= "select * from compte where mdp = '".$_POST['old_mdp']."' AND email = '".$_SESSION['email']."';";
        $test_mdp_resultat = mysqli_query($database, $test_mdp_requete);
        $test_mdp = mysqli_fetch_array($test_mdp_resultat);
        if(empty($test_mdp['mdp'])) $erreur = "L'ancien mot de passe est incorrect.";
        else {
            $changer_mdp_requete = "update compte set mdp = '".$_POST['new_mdp']."' where id_compte =".$test_mdp['id_compte'].";";
            $test_mdp_resultat = mysqli_query($database, $changer_mdp_requete);
            
            if ($test_mdp_resultat)echo "Le mot de passe a bien été changé";
            else {
                  echo ("Erreur: ");
                  echo (mysqli_errno($database));
            }
            
        }
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
            
           function validation_mdp(){
               
                    if (document.mon_compte.new_mdp.value=='') {
                    document.getElementById("erreur_new_mdp").innerHTML = " Veuillez saisir votre nouveau mot de passe.";
                    document.getElementById("erreur_old_mdp").innerHTML = "";
                    document.getElementById("erreur_confirm_new_mdp").innerHTML = "";
                    erreur = false;
                    }
                    else document.getElementById("erreur_new_mdp").innerHTML = "";
                    
                    if (document.mon_compte.new_mdp.value!==''){
                    if (document.mon_compte.confirm_new_mdp.value=='') {
                    document.getElementById("erreur_confirm_new_mdp").innerHTML = " Veuillez confirmer votre nouveau mot de passe.";
                    erreur = false;
                    }
                    else if (document.mon_compte.new_mdp.value!==document.mon_compte.confirm_new_mdp.value) {
                    document.getElementById("erreur_confirm_new_mdp").innerHTML = " Les nouveaux mots de passe ne sont pas identiques.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_confirm_new_mdp").innerHTML = "";
                    }
                    
                    if (document.mon_compte.old_mdp.value=='') {
                    document.getElementById("erreur_old_mdp").innerHTML = " Veuillez saisir votre ancien mot de passe.";
                    document.getElementById("erreur_new_mdp").innerHTML = "";
                    document.getElementById("erreur_confirm_new_mdp").innerHTML = "";
                    erreur = false;
                    }
                    else document.getElementById("erreur_old_mdp").innerHTML = "";
                    
                    return erreur;
           }       
        </script>
</head>

<body onload="document.mon_compte.reset();">
   <div class ="container">
       
   <h2>Mon compte</h2>
   
       
   
       <form class ="form-horizontal" name ="mon_compte" method="post" onsubmit="return validation_mdp(this)" action="mon_compte.php">
       <table>
       <tbody>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Mot de passe actuel</label></td>
       <td><input class="form-control" name="old_mdp" size="30" type="password" id ="old_mdp"></input></td>
       <td><span style="color:red" id="erreur_old_mdp"><?php echo $erreur?></span></td>
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
   
      <h2>Ajouter une publication</h2>
   
       
   
       <form class ="form-horizontal" name ="Ajouter une publication" method="post" onsubmit="return validation(this)" action="mon_compte.php">
       <table>
       <tbody>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Titre</label></td>
       <td><input class="form-control" name="titre" size="30" type="text" id ="titre"></input></td>
       <td><span style="color:red" id="erreur_titre"></span></td>
       </tr>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Categorie</label></td>
       <td><select class="form-control" name="categorie" id = "categorie">
       <option selected disabled="">Choisir
       <option>RI
       <option>CI
       <option>RF
       <option>CF
       <option>OS
       <option>TD
       <option>BV
       <option>AP</select></td>
       <td><span style="color:red" id="erreur_categorie"></span></td>
       </tr>
       
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Label</label></td>
       <td><input class="form-control" name="titre" size="30" type="label" id ="label"></input></td>
       <td><span style="color:red" id="erreur_label"></span></td>
       </tr>
       
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Date</label></td>
       <td><input class="form-control" name="date" size="30" type="date" id ="date"></input></td>
       <td><span style="color:red" id="erreur_date"></span></td>
       </tr>
           
       </tbody>
       </table>
       </p>
       <input class ="btn btn-success btn-lg" type="submit" value="Changer le mot de passe" >
        </form>
       
    </div>
<!-- #global --></body>
</html>