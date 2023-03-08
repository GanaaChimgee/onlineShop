 <?php

    class Product extends Model
    {
        //buh web-uudiig baz-aas unshih func..
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

        public function getByName($name)
        {
            //$name db g duudahad url deer gargahad ni tsewerlej ogood gargah func...
            $name = $this->db->escape($name);
            $sql = "select * from product where name='$name' limit 1";
            return $this->db->query($sql) ?? null;
        }
    }
