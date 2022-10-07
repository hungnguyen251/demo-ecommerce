<?php
require_once 'DB.php';
require_once 'ICrud.php';

class UserDal extends DB implements ICrud
{
    public function __construct()
    {
        //gọi lên constructor của thằng cha
        parent::__construct();
        $this->setTableName('user');
    }

    function getUserById($id)
    {
        /**
         * 
         * @var object $this
        */
        $user = $this->db->query("SELECT * FROM $this->tableName WHERE id = $id");
        return $user->fetchAll(PDO::FETCH_OBJ);
    }

    function add($payload)
    {
        // TODO: Implement add() method.
        /**
         * 
         * @var object $this
        */
        $user = $this->db->prepare("INSERT INTO $this->tableName(email,phone,full_name,address,gendre,birthday,password,status) VALUES (:email,:phone,:full_name,:address,:gendre,:birthday,:password,:status)");
        $user->bindParam(":full_name", $payload['full_name']);
        $user->bindParam(":email", $payload['email']);
        $user->bindParam(":phone", $payload['phone']);
        $user->bindParam(":address", $payload['address']);
        $user->bindParam(":gendre", $payload['gendre']);
        $user->bindParam(":birthday", $payload['birthday']);
        $user->bindParam(":password", $payload['password']);
        $user->bindParam(":status", $payload['status']);
        try {
            $user->execute();
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
        $user = $this->db->prepare("UPDATE $this->tableName SET full_name = :full_name,email=:email,phone=:phone,address=:address,gendre=:gendre,birthday=:birthday,password=:password,status=:status,updated_at=:updated_at WHERE id=:id");
        $user->bindParam(":full_name", $payload['full_name']);
        $user->bindParam(":email", $payload['email']);
        $user->bindParam(":phone", $payload['phone']);
        $user->bindParam(":address", $payload['address']);
        $user->bindParam(":gendre", $payload['gendre']);
        $user->bindParam(":birthday", $payload['birthday']);
        $user->bindParam(":password", $payload['password']);
        $user->bindParam(":status", $payload['status']);
        $user->bindParam(":updated_at", $payload['updated_at']);
        $user->bindParam(":id", $id);
        try {
            $user->execute();
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
        $user = $this->db->prepare("DELETE FROM $this->tableName WHERE id=:id");
        $user->bindParam(":id", $id);
        try {
            $user->execute();
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

