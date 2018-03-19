<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'common.php';
session_start();
?>

<?php
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$last_name= mysqli_real_escape_string($conn,$_POST['second_name']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$gender= mysqli_real_escape_string($conn,$_POST['gender']);
$dob= mysqli_real_escape_string($conn,$_POST['dob']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$reg_no=mysqli_real_escape_string($conn,$_POST['reg_no']);
$roll_no=mysqli_real_escape_string($conn,$_POST['roll_no']);
$dept=mysqli_real_escape_string($conn,$_POST['dept']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
$conf_pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

$quer="SELECT email from users WHERE email='$email'";
$quer_result= mysqli_query($conn,$quer);
$rownum= mysqli_num_rows($quer_result);
if($rownum>=1)
{
    die("Email already present. Go back and login instead of sign up");
}
else
{
$select_query="INSERT INTO stuinfo(first_name,last_name, address, gender, dob,email, reg_no ,roll_no, department,course,password,conf_password) VALUES('$first_name','$last_name','$address','$gender','$dob','$email','$reg_no','$roll_no','$dept','$course',md5('$pwd'),md5('$conf_pwd))";
$select_query_result=mysqli_query($conn,$select_query) or die(mysqli_errno($conn));
$_SESSION['email']=$email;
}
?>      
