<?php

    require_once(".\database.php");
    
    $verification_email_requete = "Select * from compte where '".$_POST['email']."' = email";
    
    $verification_email_resultat = mysqli_query($database,$verification_email_requete);
    $verification_email = mysqli_fetch_array($verification_email_resultat);
    
    if(!$verification_email['email']){
    
    $verification_requete = "Select id_compte from chercheur, compte where nom='".$_POST['nom']."' AND prenom ='".$_POST['prenom']."' AND laboratoire = '".$_POST['laboratoire'].
                    "' AND organisation = '".$_POST['organisation']."' AND id_compte = id_chercheur;";
    
    $verification_resultat = mysqli_query($database,$verification_requete); 
    
    if ($verification = mysqli_fetch_array($verification_resultat)){
        echo ("Le compte existe déjà");
        //=echo "verification_requete:".$verification_requete."<br/>";
    }
    else{
    
    $id_chercheur_requete = "select * from chercheur where nom='".$_POST['nom']."' AND prenom ='".$_POST['prenom']."' AND laboratoire = '".$_POST['laboratoire'].
                    "' AND organisation = '".$_POST['organisation']."'";
    
    //echo "id_chercheur_requete".$id_chercheur_requete."<br/>";
    
    $id_chercheur_resultat = mysqli_query($database, $id_chercheur_requete);
    
    $id_chercheur = mysqli_fetch_array($id_chercheur_resultat);
    
    if(!$id_chercheur['id_chercheur']){
        $chercheur_requete = "insert into chercheur(nom,prenom,laboratoire,organisation) values('".$_POST['nom']."','".$_POST['prenom']."','"
                             .$_POST['laboratoire']."','".$_POST['organisation']."');";
        
        //echo "$chercheur_requete:".$chercheur_requete."<br/>";
        
        $chercheur_insertion = mysqli_query($database, $chercheur_requete);
        $id_chercheur_resultat = mysqli_query($database, $id_chercheur_requete);
        $id_chercheur = mysqli_fetch_array($id_chercheur_resultat);
    }
    
    //printf("id_chercheur: %d <br/>",$id_chercheur['id_chercheur']);
    
    $creer_compte = "insert into compte(id_compte,email,mdp) values(".$id_chercheur['id_chercheur'].",'".$_POST['email']."','".$_POST['mdp']."')";    
    $resultat = mysqli_query($database, $creer_compte);
    
    //echo("créer compte: $creer_compte<br>\n");
    
    if($resultat){
        echo ("Compte créé");
    }
    else {
        echo ("Erreur: ");
        echo (mysqli_errno($database));
    }
    }
    }
    else echo "Cette adresse e-mail est déjà utilisée";

?>