<?php


class connect_db
{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="magebit";
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:host=$this->host;dbname=$this->db",
            $this->user,
            $this->pass);
    }


    public function showData()
    {
        $sql="SELECT * FROM tbl";
        $q= $this->conn->query($sql) or die("failed!");

        while($r = $q->fetch(PDO::FETCH_ASSOC))
        {
            $data[]=$r;
        }
        return $data;
    }

    public function insertData($email)
    {

        $sql = "INSERT INTO tbl(email) VALUES (?)";
        $q = $this->conn->prepare($sql);

        $data = [
            $email
        ];

        $q->execute($data);

        return true;

    }

    public function deleteData($id)
    {
        $sql="DELETE FROM tbl WHERE id=:id";
        $q = $this->conn->prepare($sql);
        $q->execute(array(':id'=>$id));
        return true;
    }

    public function sort()
    {
        $sql="SELECT * FROM tbl ORDER BY email";
        $q= $this->conn->query($sql) or die("failed!");

        while($r = $q->fetch(PDO::FETCH_ASSOC))
        {
            $data[]=$r;
        }
        return $data;
    }
}
?>
