<?php
session_start();
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
		 Ajouter des auteurs 
	</title>
        <script language ="javascript" type ="text/javascript">
            
           function validation(){
                    
                    var erreur = true;
                    
                    if (document.inscription.nom.value=='') {
                    document.getElementById("erreur_nom").innerHTML = " Veuillez saisir le nom d'auteur.";
                    erreur = false;
                    }
                    else document.getElementById("erreur_nom").innerHTML = "";
                    
                    if (document.inscription.prenom.value=='') {
                    document.getElementById("erreur_prenom").innerHTML = " Veuillez saisir le prénom de l'auteur.";
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
                    
                    return erreur;
           }       
        </script>
</head>
    <body onload="document.ajout_auteur.reset();" style="background-color: #3498db">
   <div class ="container" style="padding-top: 10px">
       
       <h1 style="color: whitesmoke">Ajouter des auteurs</h1><br>
           <div  style="color:whitesmoke" text-align: left valign: center padding-right:20px>Indiquez les informations des auteurs puis validez de nouveau l'ajout de la publication.</div><br>
   <form  name ="inscription" method="post" onsubmit="return validation(this)" action='#'>
 
       <table>
       <tbody>
       <tr>
           <td class="libelle"><label for="label">Nom</label></td>
       <td><input class="form-control" name="nom" size="30" type="text" id = "nom"></input></td>
       <td><span class="erreur" id="erreur_nom"></span></td>
       </tr>
           
       <tr>
           <td class="libelle"><label for="label">Prénom</label></td>
       <td><input class="form-control" name="prenom" size="30" type="text" id = "prenom"></input></td>
       <td><span class="erreur" id="erreur_prenom"></span></td>
       </tr>
           
       <tr>
       <td class="libelle"><label for="label">Laboratoire de recherche</label></td>
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
       <td><span class="erreur" id="erreur_laboratoire"></span></td>
       </tr>
       
       <tr>
       <td class="libelle"><label for="label">Organisation</label> </td>
       <td><input class="form-control" name="organisation" size="30" type="text" id="organisation"></input></td>
       <td><span class="erreur" id="erreur_organisation"></span></td>
       </tr>
           
       </tbody>
       </table>
   </p><br>
       <input class ="btn btn-outline btn-lg" type="submit" value="Ajouter les auteurs" >
</form>
    
<!-- #global --></body>
</html>