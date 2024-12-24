<?php 

class Config
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'exam';
    private $connection;
    

    public function __construct() {
        $this->connection = mysqli_connect($this->host,$this->username,$this->password,$this->database);
    }

    public function insertUser($name,$email,$phone){
        $query = "INSERT INTO users (name,email,phone) VALUES('$name','$email',$phone)";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    public function fetchUser()
    {
        $query = "SELECT * FROM users";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    public function insertProduct($product_name,$price){
        $query = "INSERT INTO products (product_name,price) VALUES('$product_name','$price')";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    public function updateProduct($id,$product_name,$price)
    {
        $query = "UPDATE products SET product_name = '$product_name', price = '$price' WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function insertOrder($order_date,$status){
        $query = "INSERT INTO ordertable (order_date,status) VALUES('$order_date','$status')";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    public function deleteOrder($id)
    {
        $query = "DELETE FROM ordertable WHERE id = $id";
        $res =  mysqli_query($this->connection,$query);
        return $res;
    }

    
}
    

?>