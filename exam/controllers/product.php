<?php 

header("Access-Control-Allow-Method: POST,PUT");
header("Content-Type: application/json");
include ("../config.php");

$product = new Config();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];

    if(!empty($product_name) $$ !empty($price))
    {
        $res = $product->insertProduct($product_name,$price);
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
else if($_SERVER['REQUEST_METHOD'] == "PUT")
{
    $data = file_get_contents("php://input");
    parse_str($data,$result);

    $id = $result['id'];
    $product_name = $result['product_name'];
    $price = $result['price'];

    if(!empty($id) && !empty($product_name) && !empty($price))
    {
        $res = $product->updateProduct($id,$product_name,$price);

        if($res)
        {
            $arr['msg'] = "Data update sucessfully";
        }
        else{
            $arr['msg'] = "Data not Updated";
        }
        }
    else{
        $arr['error'] = "value is empty";
    }
}
else
{
    $arr['error'] = "only Post or Update method allowed";
}
echo json_encode($arr);
?>