<?php
include_once("../model/functions.php");

// if(!empty($_SESSION["id"])){
//   header("Location: home.php");
// }


if(!empty($_SESSION["id"])){
  header("Location: home.php");

}

if(isset($_POST["submit"])){

  $login = new Login();
  $result = $login->login($_POST["username"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location:http://localhost/mvcpattern/view/home.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}



if(isset($_POST["submit"])){
include_once("/model/functions.php");
  $register = new Register();
  $result = $register->registration($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
    header("Location: view/login.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
}



if(isset($_POST['submit'])){
    $productname=$_POST['productname'];
    $sku=$_POST['sku'];
    $price=$_POST['price'];
    $size=$_POST['size'];
    $pic = $_FILES['photo']['name']; 
    $folder = "upload/".$pic;
    move_uploaded_file($_FILES['photo']['tmp_name'],$folder);

    $fileName = $_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0){
      $file = fopen($fileName, "r");


    }

    $res= new Database();
    $res->insert('prolist',['productname'=>$productname,'sku'=>$sku,'price'=>$price ,'size'=>$size ,'image'=>$folder]);
    
    if ($res == true) {
      header('location:view/home.php');
    }
}



?>