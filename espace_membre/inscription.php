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
		 Inscription 
	</title>
        <script language ="javascript" type ="text/javascript">
            
           function validation(){
                    
                    var erreur = true;
                    
                    if (document.inscription.nom.value=='') {
                    document.getElementById("erreur_nom").innerHTML = " Veuillez saisir votre nom.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_nom").innerHTML = "";
                    
                    if (document.inscription.prenom.value=='') {
                    document.getElementById("erreur_prenom").innerHTML = " Veuillez saisir votre prénom.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_prenom").innerHTML = "";
                    
                    if (document.inscription.laboratoire.value=='Choisir') {
                    document.getElementById("erreur_laboratoire").innerHTML = " Veuillez chosir un laboratoire de recherche.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_laboratoire").innerHTML = "";
                    
                    if (document.inscription.organisation.value=='') {
                    document.getElementById("erreur_organisation").innerHTML = " Veuillez saisir votre organisation.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_organisation").innerHTML = "";
                    
                    if (document.inscription.email.value=='') {
                    document.getElementById("erreur_email").innerHTML = " Veuillez saisir votre adresse email.";
                    erreur = false;
                    }
                    else if(document.inscription.email.value.indexOf('@') == -1) {
                    document.getElementById("erreur_email").innerHTML = " Veuillez saisir une adresse email valide.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_email").innerHTML = "";
                    
                    if (document.inscription.mdp.value!==''){
                    if (document.inscription.confirm_mdp.value=='') {
                    document.getElementById("erreur_confirm_mdp").innerHTML = " Veuillez confirmer votre mot de passe.";
                    erreur = false;
                    }
                    else if (document.inscription.mdp.value!==document.inscription.confirm_mdp.value) {
                    document.getElementById("erreur_confirm_mdp").innerHTML = " Les mots de passe ne sont pas identiques.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_confirm_mdp").innerHTML = "";
                    }
                    
                    if (document.inscription.mdp.value=='') {
                    document.getElementById("erreur_mdp").innerHTML = " Veuillez saisir un mot de passe.";
                    document.getElementById("erreur_confirm_mdp").innerHTML = "";
                    erreur = false;
                    }
                    else document.getElementById("erreur_mdp").innerHTML = "";
                    
                    return erreur;
           }       
        </script>
</head>

<body onload="document.inscription.reset();">
   <div class ="container">
       
   <h2>Inscription:</h2>
   <form class ="form-horizontal" name ="inscription" method="post" onsubmit="return validation(this)" action='inscription_finie.php'>
 
       <table>
       <tbody>
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Nom</label></td>
       <td><input class="form-control" name="nom" size="30" type="text" id = "nom"></input></td>
       <td><span style="color:red" id="erreur_nom"></span></td>
       </tr>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Prénom</label></td>
       <td><input class="form-control" name="prenom" size="30" type="text" id = "prenom"></input></td>
       <td><span style="color:red" id="erreur_prenom"></span></td>
       </tr>
           
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Laboratoire de recherche</label></td>
       <td><select class="form-control" name="laboratoire" id = "laboratoire">
       <option selected disabled="">Choisir
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select></td>
       <td><span style="color:red" id="erreur_laboratoire"></span></td>
       </tr>
       
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Organisation</label> </td>
       <td><input class="form-control" name="organisation" size="30" type="text" id="organisation"></input></td>
       <td><span style="color:red" id="erreur_organisation"></span></td>
       </tr>

       <tr>
       <td align="left" valign="top" width="150"><label for="label">Adresse email</label></td>
       <td><input class="form-control" name="email" size="30" type="email" id ="email"></input></td>
       <td><span style="color:red" id="erreur_email"></span></td>
       </tr>

       <tr>
       <td align="left" valign="top" width="150"><label for="label">Mot de passe</label></td>
       <td><input class="form-control" name="mdp" size="30" type="password" id ="mdp"></input></td>
       <td><span style="color:red" id="erreur_mdp"></span></td>
       </tr>
          
       <tr>
       <td align="left" valign="top" width="150"><label for="label">Retapez votre mot de passe</label></td>
       <td><input class="form-control" name="confirm_mdp" size="30" type="password" id ="confirm_mdp"></input></td>
       <td><span style="color:red" id="erreur_confirm_mdp"></span></td>
       </tr>
           
       </tbody>
       </table>
       </p>
       <input class ="btn btn-success btn-lg" type="submit" value="S'inscrire" >
</form>
       
    </div>
<!-- #global --></body>
</html>