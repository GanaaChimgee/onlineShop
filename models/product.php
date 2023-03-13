 <?php

    class Product extends Model
    {
        //buh web-uudiig baz-aas unshih func..
        /**
         * It returns a list of products from the database
         * 
         * @param price If true, the query will return only products with a price of 1.
         */
        public function getList($price = false)
        {
            $sql = "SELECT * FROM product WHERE 1";

            if ($price) {
                // .= ene hoinoos shuud zalgaj bgaa gsen ug...
                $sql .= " and price=1 ";
            }

            return $this->db->query($sql);
        }

        //Web huudsiig alias(slug)-aar ni shuuj ogoh function....

        /**
         * It returns the first row of the product table where the name column matches the name
         * parameter
         * 
         * @param name The name of the product
         */
        public function getByName($name)
        {
            //$name db g duudahad url deer gargahad ni tsewerlej ogood gargah func...
            $name = $this->db->escape($name);
            $sql = "select * from product where name='$name' limit 1";
            return $this->db->query($sql) ?? null;
        }
    }
