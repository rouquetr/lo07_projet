<?php

$erreur = ['nom'=>0,'prenom'=>0,'laboratoire'=>0,'organisation'=>0,'email'=>0,'mdp'=>0];

if (!empty($_GET['prenom'])) {

    foreach ($_GET as $key => $value) {
        switch ($key) {
            case 'nom':
                if (empty($_GET['nom'])) $erreur['nom'] = 'La case nom est vide.';
            case 'prenom':
                if (empty($_GET['prenom'])) $erreur['prenom'] = 'La case prénom est vide.';
            case 'laboratoire':
                if (empty($_GET['laboratoire'])) $erreur['laboratoire'] = 'Veuillez choisir un laboratoire de recherche.';
            case 'organisation':
                if (empty($_GET['organisation'])) $erreur['organisation'] = 'La case organisation est vide.';
            case 'email':
                if (empty($_GET['email'])) $erreur['email'] = 'La case adresse email est vide.';
            case 'mdp':
                if (empty($_GET['mdp'])) $erreur['mdp'] = 'La case mot de passe est vide.';
                if ($_GET['mdp']!=$_GET['confirm_mdp']) $erreur['mdp'] = 'les deux mots de passe sont différents.';
        }
    }
    
}

function action(){
    
    require_once(".\database.php");
    $creer_compte = "insert into compte(id_compte,email,mdp) values(0,'".$_GET['email']."','".$_GET['mdp']."')";
    $resultat = mysqli_query($database, $creer_compte);
    
    echo("? -> $creer_compte<br>\n");
    
    if($resultat){
        echo ("Requête effectuée");
    }
    else {
        echo ("Erreur: ");
        echo (mysqli_errno($database));
    }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>
		 Formulaire 
	</title>
        <script language ="javascript" type ="text/javascript">
           function check_mdp(){
                if (document.lo07.mdp.value!==document.lo07.confirm_mdp.value) alert("Le mot de passe n'est pas le même")
            }
            
            function check_age(){                
                if (document.lo07.age.value < 18) alert("Vous êtes mineur");
            }            
        </script>
</head>

<body>

<form name ="lo07" action="inscription.php">
 
   <fieldset>
       <legend>S'inscrire</legend> <!-- Titre du fieldset -->
        
       <label for="label">Nom</label> 
       <input type="text" name="nom" id="nom" /><?php if ($erreur['nom']!==0) echo $erreur['nom'];?><br/>
    
       <label for="label">Prénom</label> 
       <input type="text" name="prenom" id="prenom" /><?php if ($erreur['prenom']!==0) echo $erreur['prenom'];?><br/> 
           
       <label for="label">Laboratoire de recherche</label> 
       <select name="laboratoire" id="laboratoire">
       <option>CREIDD
       <option>ERA
       <option>GAMMA3
       <option>LASMIS
       <option>LM2S
       <option>LNIO
       <option>LOSI
       <option>Tech-CICO</select><?php if ($erreur['laboratoire']!==0) echo $erreur['laboratoire'];?><br/>
       
       <label for="label">Organisation</label> 
       <input type="text" name="organisation" id="organisation" /> <?php if ($erreur['organisation']!==0) echo $erreur['organisation'];?><br/>
    
       <label for="label">Adresse email</label> 
       <input type="email" name="email" id="email" /><?php if ($erreur['email']!==0) echo $erreur['email'];?><br/>
 
       <label for="année">Mot de passe</label> 
       <input type="password" name="mdp" id="mdp" /><?php if ($erreur['mdp']!==0) echo $erreur['mdp'];?><br/>

       <label for="passagers">Retapez votre mot de passe </label> 
       <input type="password" name="confirm_mdp" id="confirm_mdp" onchange="check_mdp()" /><br/>
       </p>
       <input type="submit" value="S'inscrire" >

</fieldset>
</form>
</div><!-- #global --></body>
</html>