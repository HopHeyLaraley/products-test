<?php

class CProducts{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select($count){
        $sql = "select * from products order by date_create desc limit " . $count;

        return $this->pdo->query($sql)->fetchAll();
    }

    public function hideProduct($id){
        $sql = "UPDATE products SET visible = 0 WHERE id = " . $id;
        $query = $this->pdo->prepare($sql);

        return $query->execute();
    }

    public function increaseQuantity($id){
        $sql = "UPDATE products SET product_quantity = product_quantity+1 WHERE id = " . $id;
        $query = $this->pdo->prepare($sql);

        return $query->execute();
    }

    public function decreaseQuantity($id){
        $sql = "UPDATE products SET product_quantity = product_quantity-1 WHERE id = " . $id;
        $query = $this->pdo->prepare($sql);

        return $query->execute();
    }
}

?>