<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		 Page d'inscription 
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
                    document.getElementById("erreur_laboratoire").innerHTML = " veuillez chosir un labratoire de recherche.";
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

    <form name ="inscription" method="get" onsubmit="return validation(this)" action='inscription_finie.php'>
 
   <fieldset>
       <legend>S'inscrire</legend> <!-- Titre du fieldset -->
        
       <label for="label">Nom</label> 
       <input type="text" name="nom" id="nom"><span id="erreur_nom"></span><br/>

    
       <label for="label">Prénom</label> 
       <input type="text" name="prenom" id="prenom"/><span id="erreur_prenom"></span><br/> 
           
       <label for="label">Laboratoire de recherche</label> 
       <select name="laboratoire" id="laboratoire">
       <option selected disabled="">Choisir
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select><span id="erreur_laboratoire"></span><br/>
       
       <label for="label">Organisation</label> 
       <input type="text" name="organisation" id="organisation"/><span id="erreur_organisation"></span><br/>
    
       <label for="label">Adresse email</label> 
       <input type="email" name="email" id="email"/><span id="erreur_email"></span><br/>
 
       <label for="année">Mot de passe</label> 
       <input type="password" name="mdp" id="mdp"/><span id="erreur_mdp"></span><br/>

       <label for="passagers">Retapez votre mot de passe </label> 
       <input type="password" name="confirm_mdp" id="confirm_mdp"/><span id="erreur_confirm_mdp"></span><br/>
       </p>
       <input type="submit" value="S'inscrire" >

</fieldset>
</form>
</div><!-- #global --></body>
</html>