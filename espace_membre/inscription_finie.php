<?php

    require_once(".\database.php");
    $creer_compte = "insert into compte(id_compte,email,mdp) values(0,'".$_GET['email']."','".$_GET['mdp']."')";
    $verification = "select nom, prenom, email from chercheur, compte where nom='".$_GET['nom']."' AND prenom ='".$_GET['prenom']."' AND laboratoire = '".$_GET['laboratoire'].
                    "' AND organisation = '".$_GET['organisation']."'";
    
    $resultat = mysqli_query($database, $creer_compte);
    
    echo("? -> $creer_compte<br>\n");
    
    if($resultat){
        echo ("Requête effectuée");
    }
    else {
        echo ("Erreur: ");
        echo (mysqli_errno($database));
    }
    
    
$erreur = ['nom'=>0,'prenom'=>0,'laboratoire'=>0,'organisation'=>0,'email'=>0,'mdp'=>0];

if (!empty($_GET['tentative'])) {

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
?>