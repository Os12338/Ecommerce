<?php

namespace APP\src;
use APP\src\Copon;
use PDO;
use PDOException;

// add product to cart
class Cart
{

    public static function add($pdo, $product_id, $user_id, $qty = 1)
    {
        $stm = $pdo->prepare("INSERT INTO cart (product_id,user_id,qty) VALUES(?,?,?)");
        $result = $stm->execute([$product_id, $user_id, $qty]);

        if(!$result) return false;
        return true ;
    }

        // delete
        public static function delete($pdo, $id)
        {
            $stm = $pdo->prepare("DELETE FROM cart WHERE id = ?");
            
            $result = $stm->execute([ $id]);
            return $result;
        }

        public static function update_qty($pdo, $param, $id)
        {
            // Prepare 
            $stm = $pdo->prepare("
                UPDATE cart SET qty = ? WHERE product_id = ?");
            // Execute 
            $result = $stm->execute([ $param, $id]); 

            if(!$result) return false;
            return true;
    
        }
    
        public static function get_cart($pdo)
        {
                $stm = $pdo->query("SELECT * FROM cart ");
                
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
                if(!$result) return false;

                return $result;
        }

        public static function get_products($pdo)
        {
            $stm = $pdo->query("SELECT * FROM products_cart");
            
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
        }

        public static function totale($pdo, $copon = 1)
        {
            $stm = $pdo->query("SELECT * FROM products_cart");
            
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            $total = 0;
            foreach($result as $product)
            {
                $total += $product['price'] * $product['qty'];
            }
            if($copon != 1)
            {
                return ($total - ($copon * $total));
            }
            return $total;
        }

}