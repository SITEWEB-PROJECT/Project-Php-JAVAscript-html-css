<?php
$Name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$Message = $_POST['message'];
$conn=mysqli_connect('localhost','root','','opinion');//on cree opinion c'est le de la base de donnee dans php admin
if($conn->connect_error){//verfication des erreurs
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user(Name,phone,email,Message) values(?, ?, ?, ?)");
    //Dans la base opinion en cree un table nommee user 
		$stmt->bind_param("siss", $Name, $phone, $email, $Message);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>