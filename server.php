<?php 
$db =mysqli_connect('localhost','root','','Registration');

if(isset($_POST['register'])){
  $username=mysql_real_escape_string($_POST['username']);
  $email=mysql_real_escape_string($_POST['email']);
  $password_1=mysql_real_escape_string($_POST['password_1']);
  $password_2=mysql_real_escape_string($_POST['password_2']);


//ensure that form field are filled properly
  if(empty($username)) {
  	 array_push($errors, "username is required");

  }

    if(empty($email)) {
  	 array_push($errors, "email is required");

  }
    if(empty($password_1)) {
  	 array_push($errors, "password is required");

  }
    if(empty($password_2)) {
  	 array_push($errors, "The two passwords do not match");

  }

//if there are no errors save user to database
  if(count(errors)==0){
  	$password=mds($password_1);//encrypt password before storing in database(security)
  	$sql="INSERT INTO users (username,email,password) 
  	         VALUES('$username','$email','$password')";
  	mysqli_query($db,$sql);
  }

}




?>