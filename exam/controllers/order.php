<?php 

header("Access-Control-Allow-Method: POST,DELETE");
header("Content-Type: application/json");
include ("../config.php");

$order = new Config();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $order_date = $_POST['order_date'] ;
    $status = $_POST['status'];

    if(!empty($order_date) && !empty($status))
    {
        $res = $order->insertOrder($order_date,$status);
        if($res)
        {
            $arr['msg'] = "Data Insert Sucessfully";
        }
        else{
            $arr['msg'] = "Data Insert Not Sucessfully";
        }
    }
    else{
        $arr['error'] = "value is empty";
    }
}
else if($_SERVER['REQUEST_METHOD'] == "DELETE")
{
    $data = file_get_contents("php://input");
    parse_str($data,$result);
    $id = $result['id'];

    if(!empty($id))
    {
        $res = $order->deleteOrder($id);
        if($res)
        {
            $arr['msg'] = "Data Delete Sucessfully";
        }
        else{
            $arr['msg'] = "Data not Deleted Sucessfully";
        }
    }
    else{
        $arr['error'] = "value is empty";
    }
}
else
{
    $arr['error'] = "only Post or Delete method allowed";
}
echo json_encode($arr);
?>