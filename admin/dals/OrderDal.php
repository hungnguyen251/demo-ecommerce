<?php
require_once 'DB.php';
require_once 'ICrud.php';

class OrderDal extends DB implements ICrud
{
    public function __construct()
    {
        //gọi lên constructor của thằng cha
        parent::__construct();
        $this->setTableName('orders');
    }

    function getOrderById($id)
    {
        /**
         * 
         * @var object $this
        */
        $order = $this->db->query("SELECT * FROM $this->tableName WHERE id = $id");
        return $order->fetchAll(PDO::FETCH_OBJ);
    }

    function add($payload)
    {
        // TODO: Implement add() method.
        /**
         * 
         * @var object $this
        */
        $order = $this->db->prepare("INSERT INTO $this->tableName(order_code,full_name,phone,email,address,total_price,note,status) VALUES (:order_code,:full_name,:phone,:email,:address,:total_price,:note,:status)");
        $order->bindParam(":order_code", $payload['order_code']);
        $order->bindParam(":full_name", $payload['full_name']);
        $order->bindParam(":email", $payload['email']);
        $order->bindParam(":phone", $payload['phone']);
        $order->bindParam(":address", $payload['address']);
        $order->bindParam(":total_price", $payload['total_price']);
        $order->bindParam(":note", $payload['note']);
        $order->bindParam(":status", $payload['status']);
        try {
            $order->execute();
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
        $order = $this->db->prepare("UPDATE $this->tableName SET order_code = :order_code,full_name = :full_name,email=:email,phone=:phone,address=:address,total_price=:total_price,note=:note,status=:status,updated_at=:updated_at WHERE id=:id");
        $order->bindParam(":order_code", $payload['order_code']);
        $order->bindParam(":full_name", $payload['full_name']);
        $order->bindParam(":email", $payload['email']);
        $order->bindParam(":phone", $payload['phone']);
        $order->bindParam(":address", $payload['address']);
        $order->bindParam(":total_price", $payload['total_price']);
        $order->bindParam(":note", $payload['note']);
        $order->bindParam(":status", $payload['status']);
        $order->bindParam(":updated_at", $payload['updated_at']);
        $order->bindParam(":id", $id);
        try {
            $order->execute();
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
        $order = $this->db->prepare("DELETE FROM $this->tableName WHERE id=:id");
        $order->bindParam(":id", $id);
        try {
            $order->execute();
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