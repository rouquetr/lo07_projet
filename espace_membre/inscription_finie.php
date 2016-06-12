<?php

    require_once(".\database.php");
    $verification_requete = "Select id_compte from chercheur, compte where nom='".$_GET['nom']."' AND prenom ='".$_GET['prenom']."' AND laboratoire = '".$_GET['laboratoire'].
                    "' AND organisation = '".$_GET['organisation']."' AND id_compte = id_chercheur;";
    
    $verification_resultat = mysqli_query($database,$verification_requete); 
    
    if ($verification = mysqli_fetch_array($verification_resultat)){
        echo ("Le compte existe déjà");
        //echo "verification_requete:".$verification_requete."<br/>";
    }
    else{
    
    $id_chercheur_requete = "select * from chercheur where nom='".$_GET['nom']."' AND prenom ='".$_GET['prenom']."' AND laboratoire = '".$_GET['laboratoire'].
                    "' AND organisation = '".$_GET['organisation']."'";
    
    //echo "id_chercheur_requete".$id_chercheur_requete."<br/>";
    
    $id_chercheur_resultat = mysqli_query($database, $id_chercheur_requete);
    
    $id_chercheur = mysqli_fetch_array($id_chercheur_resultat);
    
    if(!$id_chercheur[0]){
        $chercheur_requete = "insert into chercheur(nom,prenom,laboratoire,organisation) values('".$_GET['nom']."','".$_GET['prenom']."','"
                             .$_GET['laboratoire']."','".$_GET['organisation']."');";
        
        //echo "$chercheur_requete:".$chercheur_requete."<br/>";
        
        $chercheur_insertion = mysqli_query($database, $chercheur_requete);
        $id_chercheur_resultat = mysqli_query($database, $id_chercheur_requete);
    }
    
    $id_chercheur = mysqli_fetch_array($id_chercheur_resultat);
    
    // printf("id_chercheur: %d <br/>",$id_chercheur['id_chercheur']);
    
    $creer_compte = "insert into compte(id_compte,email,mdp) values(".$id_chercheur[0].",'".$_GET['email']."','".$_GET['mdp']."')";    
    $resultat = mysqli_query($database, $creer_compte);
    
    // echo("créer compte: $creer_compte<br>\n");
    
    if($resultat){
        echo ("Compte créé");
    }
    else {
        echo ("Erreur: ");
        echo (mysqli_errno($database));
    }
    }

?>