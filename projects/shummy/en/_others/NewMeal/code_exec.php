<?php
	session_start();
	$email_session=$_SESSION['login_user'];
	include('connection.php');

	// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['logo']) AND $_FILES['logo']['error'] == 0) $erreur = "Erreur lors du transfert";
    {
        if ($_FILES['logo']['size'] <= 8000000) $erreur = "Le fichier est trop gros";
        {
            $infosfichier = pathinfo($_FILES['logo']['name']);
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                $extension_upload = strtolower(  substr(  strrchr($_FILES['logo']['name'], '.')  ,1)  );
                if (in_array($extension_upload, $extensions_autorisees)) echo "Extention correcte";
                { 
                    $image_sizes = getimagesize($_FILES['logo']['tmp_name']);
                    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
                        {
                            $nom = "avatars/unNomAChangerApres.{$extension_upload}";
                            move_uploaded_file($_FILES['logo']['tmp_name'], '../meals_photos_uploaded/' . basename($_FILES['logo']['name']));
                            echo "L'envoi a bien été effectué !";

							$connection = mysql_connect("localhost", "root", "");
							$db = mysql_select_db("Shummy", $connection);
							$ses_sql=mysql_query("select * from USER where Email='$email_session'", $connection);
							$row = mysql_fetch_assoc($ses_sql);
							$user_id_session =$row['User_Id'];

							$user_id=$user_id_session;
							$title=$_POST['Title'];
							$description=$_POST['Description'];
							$price=$_POST['Price'];
							$link="http://www.shummy.pw/meal?n=" . uniqid();
							mysql_query("INSERT INTO NEW_MEAL(User_Id, Title, Description, Price, Meal_Photo, Meal_Link)VALUES('$user_id', '$title', '$description', '$price', '$nom', '$link')");
							header("location: index.php?remarks=success");
							mysql_close($con); 
							}
                     
                }
         
        }
      
    }
?>