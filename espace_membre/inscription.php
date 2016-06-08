<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		 Page d'inscription 
	</title>
        <script language ="javascript" type ="text/javascript">
            
           function validation(){
               
                    var resultat = true;
                    
                    if (document.inscription.nom.value=='') {
                    alert("Le nom est vide");
                    return false;
                    }
                    if (document.inscription.prenom.value=='') {
                    alert("Le prenom est vide");
                    return false;
                    }
                    if (document.inscription.laboratoire.value=='Choisir') {
                    alert("Veuillez choisir un laboratoire de recherche");
                    return false;
                    }
                    if (document.inscription.organisation.value=='') {
                    alert("L'organisation est vide");
                    return false;
                    }
                    if (document.inscription.email.value=='') {
                    alert("L'email est vide");
                    return false;
                    }
                    if (document.inscription.mdp.value=='') {
                    alert("Le mot de passe est vide");
                    return false;
                    }
                    if (document.inscription.mdp.value!==document.inscription.confirm_mdp.value) {
                    alert("Le mot de passe n'est pas le même");
                    return false;
                    }
           }       
        </script>
</head>

<body>

    <form name ="inscription" method="get" onsubmit="return validation(this)" action='inscription_finie.php'>
 
   <fieldset>
       <legend>S'inscrire</legend> <!-- Titre du fieldset -->
        
       <label for="label">Nom</label> 
       <input type="text" name="nom" id="nom"><br/>
    
       <label for="label">Prénom</label> 
       <input type="text" name="prenom" id="prenom"/><br/> 
           
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
       <option>Tech-CICO</select><br/>
       
       <label for="label">Organisation</label> 
       <input type="text" name="organisation" id="organisation"/><br/>
    
       <label for="label">Adresse email</label> 
       <input type="email" name="email" id="email"/><br/>
 
       <label for="année">Mot de passe</label> 
       <input type="password" name="mdp" id="mdp"/><br/>

       <label for="passagers">Retapez votre mot de passe </label> 
       <input type="password" name="confirm_mdp" id="confirm_mdp"/><br/>
       </p>
       <input type="submit" value="S'inscrire" >

</fieldset>
</form>
</div><!-- #global --></body>
</html>