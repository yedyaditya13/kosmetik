<?php
    include 'includes/session.php';
    
    $type = 0; // Untuk user
    $act_code = 'newUserCode';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$filename = $_FILES['image']['name'];
            $now = date('Y-m-d');

            // Hardcode generate active code
            $random = (int) substr($act_code, 3, 3);
            $idx++;
            $gen_code = $random . sprintf("%03s", $idx); 

			if(!empty($filename)){
				move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$filename);	
			}
			try{
				$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, address, contact_info, image, status, type, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :address, :contact, :image, :status, :type, :code, :created_on)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'image'=>$filename, 'status'=>1, 'created_on'=>$now, 'type'=>$type, 'code'=>$gen_code]);
				$_SESSION['success'] = 'User added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up user form first';
	}

	header('location: users.php');

?>