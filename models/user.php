<?php
class User extends Model
{

    // Логин нэрээр нь хэрэглэгчийг шүүнэ
    public function getByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from users where login='$login' limit 1";
        return $this->db->query($sql);
    }
}