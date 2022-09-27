<?php
require_once 'DB.php';
require_once 'ICrud.php';

class AdminDal extends DB implements ICrud
{
    public function __construct()
    {
        //gọi lên constructor của thằng cha
        parent::__construct();
        $this->setTableName('register_admin');
    }

    function add($payload)
    {
        // TODO: Implement add() method.
        /**
         * 
         * @var object $this
        */
        $userAdmin = $this->db->prepare("INSERT INTO $this->tableName(name) VALUES (:full_name,:email,:phone,:type,:status,:created_at)");
        $userAdmin->bindParam(":full_name", $payload['full_name']);
        $userAdmin->bindParam(":email", $payload['email']);
        $userAdmin->bindParam(":phone", $payload['phone']);
        $userAdmin->bindParam(":type", $payload['type']);
        $userAdmin->bindParam(":status", $payload['status']);
        $userAdmin->bindParam(":created_at", $payload['created_at']);
        try {
            $userAdmin->execute();
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    function update($id, $payload)
    {
        // TODO: Implement update() method.
        /**
         * 
         * @var object $this
        */
        $userAdmin = $this->db->prepare("UPDATE $this->tableName SET full_name = :full_name,email=:email,phone=:phone,type=:type,status=:status,created_at=:created_at WHERE id=:id");
        $userAdmin->bindParam(":full_name", $payload['full_name']);
        $userAdmin->bindParam(":email", $payload['email']);
        $userAdmin->bindParam(":phone", $payload['phone']);
        $userAdmin->bindParam(":type", $payload['type']);
        $userAdmin->bindParam(":status", $payload['status']);
        $userAdmin->bindParam(":created_at", $payload['created_at']);
        try {
            $userAdmin->execute();
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    function listAll($page = 1)
    {
        // TODO: Implement listAll() method.
        //thuật toán phân trang
        //LIMIT offset, rows
        //offset = (page-1) * rows
        //(1-1) * rows =0
        //(2-1) * rows =10
        //(3-1) * rows =20
        /**
         * 
         * @var object $this
        */
        $offset = ($page - 1) * 10;
        $rs = $this->db->query("SELECT * FROM $this->tableName ORDER BY created_at DESC LIMIT $offset,10");
        return $rs->fetchAll(PDO::FETCH_OBJ);
    }

    function delete($id)
    {
        /**
         * 
         * @var object $this
        */
        // TODO: Implement delete() method.
        // TODO: Implement update() method.
        $userAdmin = $this->db->prepare("DELETE FROM $this->tableName WHERE id=:id");
        $userAdmin->bindParam(":id", $id);
        try {
            $userAdmin->execute();
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    public function getCount()
    {
        // TODO: Implement getCount() method.
        /**
         * 
         * @var object $this
        */
        $rs = $this->db->query("SELECT COUNT(*) as total FROM $this->tableName");
        return $rs->fetchObject();
    }
}

