<?php
include "config.php";

$userid = $_POST['userid'];

$temp="update session set id=".$userid." where name= 'a'";
$rtemp=mysqli_query($con,$temp);
if(!$temp){
    echo("error:".mysqli_error($con));
}
$sql = "select * from user where id = ".$userid;

$result = mysqli_query($con,$sql);



$response = "<table border='0' width='100%'>";
while( $row=mysqli_fetch_array($result) ){
    $name = $row['name'];
    $credit = $row['credit'];
    $gender=$row['gender'];
    $city=$row['city'];
    $email=$row['email'];
    
    $response .= "<tr>";
    $response .= "<td>Name : </td><td>".$name."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Credit : </td><td>".$credit."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Gender : </td><td>".$gender."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>City : </td><td>".$city."</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>E-mail : </td><td>".$email."</td>";
    $response .= "</tr>";

}
$response .= "</table>";

echo $response;
exit;