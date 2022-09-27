<?php

class DB
{
    protected $db;
    protected $dbName = "ecommerce";
    protected $dbUser = "root";
    protected $dbPass = "";
    protected $tableName;

    public function __construct()
    {

        //Mở kết nối đến CSDL
        try {
            $this->db = new PDO("mysql:host=127.0.0.1;dbname=$this->dbName",$this->dbUser, $this->dbPass);
            //sẽ ném ra exception nếu như câu lệnh SQL thực thi bị lỗi
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exception) {
            echo "LOi KN";
            echo $exception->getMessage();
            $this->db = null;
        }
    }

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }
}

?>