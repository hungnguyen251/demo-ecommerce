<?php
require_once 'DB.php';
require_once 'ICrud.php';

class ProductDal extends DB implements ICrud
{
    public function __construct()
    {
        //gọi lên constructor của thằng cha
        parent::__construct();
        $this->setTableName('products');
    }

    function getProductById($id)
    {
        /**
         * 
         * @var object $this
        */
        $product = $this->db->query("SELECT * FROM $this->tableName WHERE id = $id");
        return $product->fetchAll(PDO::FETCH_OBJ);
    }

    function add($payload)
    {
        // TODO: Implement add() method.
        /**
         * 
         * @var object $this
        */
        $product = $this->db->prepare("INSERT INTO $this->tableName(name,brand,gendre,price,promo,description,url,status) VALUES (:name,:brand,:gendre,:price,:promo,:description,:url,:status)");
        $product->bindParam(":name", $payload['name']);
        $product->bindParam(":brand", $payload['brand']);
        $product->bindParam(":gendre", $payload['gendre']);
        $product->bindParam(":price", $payload['price']);
        $product->bindParam(":promo", $payload['promo']);
        $product->bindParam(":description", $payload['description']);
        $product->bindParam(":url", $payload['url']);
        $product->bindParam(":status", $payload['status']);
        try {
            $product->execute();
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
        $product = $this->db->prepare("UPDATE $this->tableName SET name=:name,brand=:brand,gendre=:gendre,price=:price,promo=:promo,description=:description,url=:url,status=:status,updated_at=:updated_at WHERE id=:id");
        $product->bindParam(":name", $payload['name']);
        $product->bindParam(":brand", $payload['brand']);
        $product->bindParam(":gendre", $payload['gendre']);
        $product->bindParam(":price", $payload['price']);
        $product->bindParam(":promo", $payload['promo']);
        $product->bindParam(":description", $payload['description']);
        $product->bindParam(":url", $payload['url']);
        $product->bindParam(":status", $payload['status']);
        $product->bindParam(":updated_at", $payload['updated_at']);
        $product->bindParam(":id", $id);
        try {
            $product->execute();
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
        $product = $this->db->prepare("DELETE FROM $this->tableName WHERE id=:id");
        $product->bindParam(":id", $id);
        try {
            $product->execute();
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

