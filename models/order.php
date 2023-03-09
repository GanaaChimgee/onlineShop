 <?php

    class Order extends Model
    {
        //buh web-uudiig baz-aas unshih func..
        public function getList()
        {
            $customer_id = Session::get('user')['id'];
            $sql = "SELECT * FROM orders WHERE customer_id = $customer_id";

            return $this->db->query($sql);
        }

        //Web huudsiig alias(slug)-aar ni shuuj ogoh function....

        public function getByName($name)
        {
            //$name db g duudahad url deer gargahad ni tsewerlej ogood gargah func...
            $name = $this->db->escape($name);
            $sql = "select * from product where name='$name' limit 1";
            return $this->db->query($sql) ?? null;
        }

        public function confirm($note)
        {
            $customer_id = Session::get('user')['id'];
            $create_order_script = "INSERT INTO orders(customer_id, note) VALUES('$customer_id', '$note')";
            $this->db->query($create_order_script);

            $get_created_order_id = "SELECT id FROM orders WHERE customer_id = '$customer_id' ORDER BY id DESC";
            $orderId = $this->db->query($get_created_order_id)[0]['id'];

            foreach (Session::get('cart') as $productId) {
                $create_order_script = "INSERT INTO product_in_order(order_id, product_id) VALUES('$orderId', '$productId')";
                $this->db->query($create_order_script);
            }
        }

        public function delete($orderId)
        {
            $sql = "DELETE FROM orders WHERE id = '$orderId'";
            var_dump($orderId, $orderId);
            return $this->db->query($sql);
        }
    }
