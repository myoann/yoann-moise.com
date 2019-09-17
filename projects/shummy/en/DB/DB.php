<?php
	
	session_start();
	if (isset($_SESSION['USER_ID'])){
		$idUser=$_SESSION['USER_ID'];
	}

	function connexion(){
		$host='localhost';
		$dbname='Shummy';
		$user='root';
		$pass='';
		$dbh='';
		// -- connexion
		try{
			$dbh= new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$pass);

			//$dbh=null;
		}catch(PDOException $e){
			print 'Erreur ! :'.$e->getMessage().'<br/>';
			die();
		}
		return $dbh;
	}

	$dbh=connexion();

	// -- connexion
	/*try{
		$dbh= new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$pass);

		//$dbh=null;
	}catch(PDOException $e){
		print 'Erreur ! :'.$e->getMessage().'<br/>';
		die();
	}*/

	// -- insert 
	function addNewUser($dbh,$FirstName,$LastName,$Email,$Password){
		$stmt=$dbh->prepare('INSERT INTO user (First_Name,Last_Name,Email,Password) VALUES (:FirstName,:LastName,:Email,:Password)');
		$stmt->bindParam(':FirstName',$FirstName);
		$stmt->bindParam(':LastName',$LastName);
		$stmt->bindParam(':Email',$Email);
		$stmt->bindParam(':Password',$Password);
		$stmt->execute();
	}
	function addNewMeal($dbh,$idUser,$Title,$Description,$Price,$Address,$Meal_Photo){
		$stmt=$dbh->prepare('INSERT INTO meal (User_Id, Title, Description, Price, Address, Meal_Photo) VALUES (:User_Id, :Title,:Description,:Price,:Address,:Meal_Photo)');
		$stmt->bindParam(':User_Id', $idUser);
		$stmt->bindParam(':Title',$Title);
		$stmt->bindParam(':Description',$Description);
		$stmt->bindParam(':Price',$Price);
		$stmt->bindParam(':Address',$Address);
		$stmt->bindParam(':Meal_Photo',$Meal_Photo);
		$stmt->execute();
	}
	// update
	function updateUser($dbh,$idUser,$user_photo,$user_firstName,$user_lastName,$user_description,$user_email,$user_phone,$user_adress,$user_fb_link){
		$stmt =$dbh->prepare('UPDATE user SET User_Photo=:user_photo,
		First_Name=:user_firstName,
		Last_Name=:user_lastName,
		User_Description=:user_description,
		Email=:user_email,
		Phone_Number=:user_phone,
		User_Address=:user_adress,
		Facebook_Account=:user_fb_link WHERE User_Id=:user_id');
		$stmt->bindParam(':user_id',$idUser);
		$stmt->bindParam(':user_photo',$user_photo);
		$stmt->bindParam(':user_firstName',$user_firstName);
		$stmt->bindParam(':user_lastName',$user_lastName);
		$stmt->bindParam(':user_description',$user_description);
		$stmt->bindParam(':user_email',$user_email);
		$stmt->bindParam(':user_phone',$user_phone);
		$stmt->bindParam(':user_adress',$user_adress);
		$stmt->bindParam(':user_fb_link',$user_fb_link);
		$stmt->execute();
	}
	// -- delete 
	function deletePeintre($dbh,$id){
		$stmt=$dbh->prepare('DELETE FROM PEINTRE WHERE id=:id');
		$stmt->bindParam(':id',strtoupper($id));
		$stmt->execute();
	}

	// -- selectALL
	function selectAllPeintre(){
	}

	// -- select 
	function loginUser($id){
	}
	
	function getMealByTitle($titleMeal){
		$sql = 'SELECT * FROM meal WHERE Title LIKE '.'"%'.$titleMeal.'%"';
		//$stmt->bindParam(':titleMeal',$titleMeal);
		$stmt =  connexion()->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}
	function getMeals(){
		$sql = 'SELECT * FROM meal ORDER BY Posted_Time';
		$stmt =  connexion()->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}
	function getLocations(){
		$sql = 'SELECT address, Meal_Lat, Meal_Long FROM meal ORDER BY Posted_Time';
		$stmt =  connexion()->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}

	function getMeal($meal_id,$user_id){
		$sql = 'SELECT * FROM user u, meal m WHERE m.meal_id=:meal_id AND m.user_id=u.user_id AND u.user_id=:user_id ORDER BY Posted_Time';
		$stmt =  connexion()->prepare($sql);
		$stmt->bindParam(':meal_id',$meal_id);
		$stmt->bindParam(':user_id',$user_id);
		
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}
	function getUser($user_id){
		$sql = 'SELECT * FROM user WHERE User_Id=:user_id';
		$stmt =  connexion()->prepare($sql);
		$stmt->bindParam(':user_id',$user_id);
		
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}

	function getUsers(){		
		$sql = 'SELECT Address FROM meal';
		$stmt =  connexion()->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_OBJ);
	 
		//Compiler et exécuter la requête
		$stmt->execute();

		//Récupérer toutes les données retournées
		$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultJSON);
	}

	// -- liste des actions possible
	$action=null;
	if (isset($_POST['action'])) $action=$_POST['action'];
	if (isset($_GET['action'])) $action=$_GET['action'];
	if (isset($action)){

		switch($action){
			// -- ajouter
			case "addNewUser":
			addNewUser($dbh,$_POST['FirstName'],$_POST['LastName'],$_POST['Email'],$_POST['Password']);
			break;
			case "addNewMeal":
			addNewMeal($dbh,$_SESSION['USER_ID'], $_POST['Title'],$_POST['Description'],$_POST['Price'],$_POST['Address'],$_POST['Meal_Photo']);
			break;
			// update
			case "updateUser":
			updateUser($dbh,$_SESSION['USER_ID'],$_POST['UserPhoto'],$_POST['FirstName'],$_POST['LastName'],$_POST['Description'],$_POST['Email'],$_POST['Phone'],$_POST['Adress'],$_POST['Facebook']);
			break;
			// supprimer un peintre
			case "deletePeintre":
			deletePeintre($dbh,$_POST['peintre_id']);
			break;
			// getQuestions
			case "getMeals":
				getMeals();
			break;
			case "getMealByTitle":
			if (isset($_GET['title_meal'])){
				getMealByTitle($_GET['title_meal']);
			}
			break;
			case "getMeal":
			getMeal($_GET['meal_id'],$_GET['user_id']);
			break;
			case "getUser":
			getUser($_GET['user_Id']);
			break;
			case "getUsers":
			getUsers();
			break;
			case "getQuestions":
			//$idUser=1;
			$sql = 'SELECT * FROM question q, user u WHERE q.IDUSER=u.IDUSER  ORDER BY dateQuestion DESC';
			//$sql = 'SELECT * FROM question q, user u WHERE q.IDUSER=u.IDUSER  ORDER BY dateQuestion';
			/*$sql = 'SELECT * FROM question q, user u WHERE q.IDUSER=u.IDUSER AND q.IDUSER=:idUser ORDER BY idQuestion';*/
			$stmt = $dbh->prepare($sql);
			//$stmt->bindParam(':idUser',$idUser);
			
			$stmt->setFetchMode(PDO::FETCH_OBJ);
		 
			//Compiler et exécuter la requête
			$stmt->execute();

			//Récupérer toutes les données retournées
			$resultJSON=$stmt->fetchAll(PDO::FETCH_ASSOC);

			echo json_encode($resultJSON,JSON_FORCE_OBJECT);
			break;
			// recherche des peintres
			case "selectAllPeintre":
			$stmt=$dbh->query('SELECT ID,NOM,PRENOM,PAYS FROM PEINTRE');
			$stmt->execute();
			echo json_encode($stmt->fetchAll());
			break;
			// recherche un peintre
			case "loginUser":
			//$stmt=$dbh->prepare('SELECT ID FROM USER WHERE (USERNAME=:username AND PASSWORD=:password)');
			$stmt=$dbh->prepare('SELECT count(User_Id) as nbUser, User_Id, First_Name, Last_Name, Email FROM user WHERE (Email=:email AND Password=:password)');
			$stmt->bindParam(':email',$_POST['Email']);
			$stmt->bindParam(':password',$_POST['Password']);
			$stmt->execute();
			$f=$stmt->fetch();
			/*if (){

			}*/
			$_SESSION['USER_ID']=$f['User_Id'];
			$_SESSION['EMAIL']=$f['Email'];
			echo json_encode($f);
			break;

		}
	}
?>