<?php 

header("Access-Control-Allow-Method: POST,GET");
header("Content-Type: application/json");
include ("../config.php");

$user = new Config();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($name) && !empty($email) && !empty($phone))
    {
        $res = $user->insertUser($name,$email,$phone);
        if($res)
        {
            $arr['msg'] = "Data Insert Sucessfully";
        }
        else{
            $arr['msg'] = "Data Insert Not Sucessfully";
        }
    }
    else {
        $arr['error'] = "valus is empty";
    }
}
else if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $arr = [];
    $res = $user->fetchUser();
    if($res)
    {
        while($data = mysqli_fetch_assoc($res))
        {
            array_push($arr,$data);
        }
    }
    else{
        $arr['err'] = "Failed to Fetch data";
    }
}
else
{
    $arr['error'] = "only post or Get method allowed";
}
echo json_encode($arr);
?>