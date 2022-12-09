<?php
include_once("../model/functions.php");

$select = new Select();
if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  header("Location: /mvcpattern/view/home.php");
}
// else{
//   header("Location: /mvcpattern/view/login.php");
// } 

$limit = 4;
if (!isset ($_GET['page']) ) {  
$page_number = 1;  

} else {  
$page_number = $_GET['page'];  

}

if(isset($_POST["loginned"])){

  $login = new Login();
  $result = $login->login($_POST["username"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: ../view/home.php");
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



if(isset($_POST["registered"])){
  $register = new Register();
  $result = $register->registration($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
    header("Location: ../view/login.php");
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
  // if ($res == true) {
  //   header('location:view/home.php');
  // }
}

if(isset($_POST['update']))
{
$id=$_POST["id"];
$productname = $_POST['productname'];
$sku = $_POST['sku'];
$price = $_POST['price'];
$size = $_POST['size'];
$pic = $_FILES['photo']['name'];
$folder = "upload/".$pic;
move_uploaded_file($_FILES['photo']['tmp_name'],$folder);

$res= new Database();
$res->edit('prolist',$id,$productname,$sku,$price, $size, $folder);
// if ($res == true) {
//  header('location:view/home.php');
// }

}



if(isset($_POST["Import"])){
  
  $filename=$_FILES["file"]["tmp_name"];    
    if($_FILES["file"]["size"] > 0)
    {
      $file = fopen($filename, "r");
fgetcsv($file);
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {
            $conn = new mysqli("localhost", "root", "", "product");
            $sql = "INSERT into prolist (id,productname,sku,price,size,image) 
                  values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
                  $result = mysqli_query($conn, $sql);
      if(!isset($result))
      {
        echo "<script type=\"text/javascript\">
            alert(\"Invalid File:Please Upload CSV File.\");
            window.location = \"../view/csvform.php\"
            </script>";    
      }
      else {
          echo "<script type=\"text/javascript\">
          alert(\"CSV File has been successfully Imported.\");
          window.location = \"../view/home.php\"
        </script>";
      }
          }
          fclose($file);  
    }
}
?>