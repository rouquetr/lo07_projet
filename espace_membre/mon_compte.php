<?php
    require_once(".\database.php");
    session_start();
    
    if(empty($_SESSION['nom'])&&empty($_SESSION['prenom'])&&empty($_SESSION['email'])) header('Location:../index.php');
    
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
    
    if(!empty($_POST['titre'])&&!empty($_POST['auteur'])&&!empty($_POST['categorie'])&&!empty($_POST['label'])&&!empty($_POST['date'])&&!empty($_POST['lieu']&&!empty($_POST['type']))){
        
        $titre = mysqli_escape_string($database,$_POST['titre']);
        
        $verification_publication_requete= "select * from publication where titre='".$titre."' AND categorie = '".$_POST['categorie']."' AND label = '".$_POST['label'].
                                           "' AND date = ".$_POST['date']." AND lieu = '".$_POST['lieu']."' AND type = '".$_POST['type']."'";
        $verification_publication_resultat = mysqli_query($database, $verification_publication_requete);
        $verification_publication = mysqli_fetch_array($verification_publication_resultat);
        
        if(!$verification_publication['id_publication']){
        
        $auteur= explode(",",$_POST['auteur']);
        
        foreach($auteur as $value){
            list($cle,$val) = explode(" ",$value);
            $nom = $cle;
            $prenom = $val;
            $test_auteur_requete = "select * from chercheur where nom = '".$nom."' AND prenom = '".$prenom."'";
            $test_auteur_resultat = mysqli_query($database, $test_auteur_requete);
            $test_auteur = mysqli_fetch_array($test_auteur_resultat);
            if(empty($test_auteur['nom'])){
                $auteur_manquant[$nom] = $prenom;
            }
        }
        
        $ajout_publication_requete = "insert into publication(titre,categorie,label,date,lieu,type) values('".$titre."','".$_POST['categorie']."','".$_POST['label']."',".
                             $_POST['date'].",'".$_POST['lieu']."','".$_POST['type']."')";
        $ajout_publication_resultat = mysqli_query($database, $ajout_publication_requete);
        
        $id_publication_resultat = mysqli_query($database, $verification_publication_requete);
        $id_publication = mysqli_fetch_array($id_publication_resultat);
        
        $i=0;
        
        if($ajout_publication_resultat){
            foreach($auteur as $value){
            $i++;
            
            list($cle,$val) = explode(" ",$value);
            $nom = $cle;
            $prenom = $val;
            
            $id_chercheur_requete = "select * from chercheur where nom='".$nom."' AND prenom='".$prenom."'";
            $id_chercheur_resultat = mysqli_query($database, $id_chercheur_requete);
            $id_chercheur = mysqli_fetch_array($id_chercheur_resultat);
            
            $ajout_publie_requete = "insert into publie values(".$id_chercheur['id_chercheur'].",".$id_publication['id_publication'].",".$i.")";
            $ajout_publi_resultat = mysqli_query($database, $ajout_publie_requete);
        }
        }
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
           
           function validation_publication(){
               
                    if (document.publication.titre.value=='') {
                    document.getElementById("erreur_titre").innerHTML = " Veuillez saisir un titre.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_titre").innerHTML = "";
                    
                    if (document.publication.auteur.value=='') {
                    document.getElementById("erreur_auteur").innerHTML = " Veuillez saisir un auteur.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_auteur").innerHTML = "";
                    
                    if (document.publication.categorie.value=='Choisir') {
                    document.getElementById("erreur_categorie").innerHTML = " Veuillez choisir une catégorie.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_categorie").innerHTML = "";
                    
                    if (document.publication.type.value=='Choisir') {
                    document.getElementById("erreur_type").innerHTML = " Veuillez choisir un type.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_type").innerHTML = "";
                    
                    if (document.publication.label.value=='') {
                    document.getElementById("erreur_label").innerHTML = " Veuillez saisir un label.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_label").innerHTML = "";
                    
                    if (document.publication.date.value=='') {
                    document.getElementById("erreur_date").innerHTML = " Veuillez saisir une date.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_date").innerHTML = "";
                    
                    if (document.publication.lieu.value=='') {
                    document.getElementById("erreur_lieu").innerHTML = " Veuillez saisir un lieu.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_lieu").innerHTML = "";
                    
                    return erreur;
           }
           
           function ajouter_compte()
                        {
                                width = 600;
                                height = 450;
                                if(window.innerWidth)
                                {
                                        var left = (window.innerWidth-width)/2;
                                        var top = (window.innerHeight-height)/2;
                                }
                                else
                                {
                                        var left = (document.body.clientWidth-width)/2;
                                        var top = (document.body.clientHeight-height)/2;
                                }
                                window.open('nouveau_auteur.php','Ajouter des auteurs','menubar=no, scrollbars=yes, top='+top+', left='+left+', width='+width+', height='+height+'');
                        }
        </script>
</head>
       <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Institut Charles Delaunay</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="../index.php"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
<body onload="document.inscription.reset();" style="background-color: #3498db">
   <div class ="container" style="padding-top: 140px">
       
   <h1 style="color: whitesmoke">Mon Compte</h1><br><br>
   
       <form class ="form-horizontal" name ="mon_compte" method="post" onsubmit="return validation_mdp(this)" action="mon_compte.php">
       <table>
       <tbody>
           
       <tr>
       <td class="libelle"><label for="label">Mot de passe actuel</label></td>
       <td><input maxlength="20" class="form-control" name="old_mdp" size="30" type="password" id ="old_mdp"></input></td>
       <td><span class="erreur" id="erreur_old_mdp"><?php echo $erreur?></span></td>
       </tr>           
       
       <tr>
       <td class="libelle"><label for="label">Nouveau mot de passe</label></td>
       <td><input maxlength="20" class="form-control" name="new_mdp" size="30" type="password" id ="new_mdp"></input></td>
       <td><span class="erreur" id="erreur_new_mdp"></span></td>
       </tr>
          
       <tr>
       <td class="libelle"><label for="label">Confirmez</label></td>
       <td><input maxlength="20" class="form-control" name="confirm_new_mdp" size="30" type="password" id ="confirm_new_mdp"></input></td>
       <td><span class="erreur" id="erreur_confirm_new_mdp"></span></td>
       </tr>
           
       </tbody>
       </table>
       </p>
       <input class ="btn btn-outline btn-lg" type="submit" value="Changer le mot de passe" >
</form>
   </div>
    <div class = "container">
      <h1 style="color: whitesmoke">Ajouter une publication</h1><br><br>
   
       <form class ="form-horizontal" name ="publication" method="post" onsubmit="return validation_publication(this)" action="mon_compte.php">
       <table>
       <tbody>
           
       <tr>
       <td class="libelle"><label for="label">Titre</label></td>
       <td><input class="form-control" name="titre" size="30" type="text" id ="titre"></input></td>
       <td><span class="erreur" id="erreur_titre"></span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Auteur(s)</label></td>
       <td><input class="form-control" name="auteur" size="30" type="text" id ="auteur" placeholder="Nom Prénom, Nom2 Prénom2,..."></input></td>
       <td><span class="erreur" id="erreur_auteur"></span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Categorie</label></td>
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
       <td><span class="erreur" id="erreur_categorie"></span></td>
       </tr>
           
        <tr>
       <td class="libelle"><label for="label">Type</label></td>
       <td><select class="form-control" name="type" id = "type">
       <option selected disabled="">Choisir
       <option>Conférence
       <option>Revue
       <option>Ouvrage</select></td>
       <td><span class="erreur" id="erreur_type"></span></td>
       </tr>
       
       <tr>
       <td class="libelle"><label for="label">Label</label></td>
       <td><input class="form-control" name="label" size="30" type="label" id ="label"></input></td>
       <td><span class="erreur" id="erreur_label"></span></td>
       </tr>
       
       <tr>
       <td class="libelle"><label for="label">Date</label></td>
       <td><input class="form-control" name="date" size="30" type="date" id ="date" placeholder="Année"></input></td>
       <td><span class="erreur" id="erreur_date"></span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Lieu</label></td>
       <td><input class="form-control" name="lieu" size="30" type="text" id ="lieu"></input></td>
       <td><span class="erreur" id="erreur_lieu"></span></td>
       </tr>
           
       </tbody>
       </table>
       </p>
       <input class ="btn btn-outline btn-lg" type="submit" value="Ajouter une publication" >
        </form>
       
    </div>
<!-- #global --></body>
</html>