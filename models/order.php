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

        /**
         * @param string $id of order
         * @return array of order and products
         */
        public function getOrder($id)
        {
            //$name db g duudahad url deer gargahad ni tsewerlej ogood gargah func...
            $orderDetail = "SELECT * FROM orders WHERE id = $id";
            $products = "SELECT product_id, NAME, color, price, image FROM product_in_order INNER JOIN product WHERE product_in_order.order_id = '$id' AND product_in_order.product_id = product.id";

            $result['order'] = $this->db->query($orderDetail)[0];
            $result['products'] = $this->db->query($products);
            return $result;
        }

        // note-g batalgaajuulah....
        public function confirm($note)
        {
            $customer_id = Session::get('user')['id'];
            $create_order_script = "INSERT INTO orders(customer_id, note) VALUES('$customer_id', '$note')";
            $this->db->query($create_order_script);

            $get_created_order_id = "SELECT id FROM orders WHERE customer_id = '$customer_id' ORDER BY id DESC";
            $orderId = $this->db->query($get_created_order_id)[0]['id'];

            foreach (Session::get('cart') as $product) {
                $productId = $product['id'];
                $create_order_script = "INSERT INTO product_in_order(order_id, product_id) VALUES('$orderId', '$productId')";
                $this->db->query($create_order_script);
            }
        }

        public function delete($orderId)
        {
            $sql = "DELETE FROM orders WHERE id = '$orderId'";
            return $this->db->query($sql);
        }

        public function update($note, $id)
        {
            $sql = "UPDATE orders SET note = '$note' WHERE orders.id = '$id'";
            return $this->db->query($sql);
        }
    }
