<?php
class User extends Model
{

    // Логин нэрээр нь хэрэглэгчийг шүүнэ
    public function getByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from customer where login='$login' limit 1";
        return $this->db->query($sql);
    }

    public function handleLogin(string $email, string $password): bool
    {
        $sql = "SELECT * FROM customer WHERE email = '%s'";
        $user = $this->db->query(sprintf($sql, $email));

        $passwordOk = password_verify($password, $user[0]["PASSWORD"]);

        if ($passwordOk === true) {
            Session::set('user', $user[0]);
            return true;
        } else {
            return false;
        }
    }

    public function handleRegister(string $email, string $pwd, $name): bool
    {
        $password = password_hash($pwd, PASSWORD_BCRYPT);
        $sql = "INSERT INTO customer(email, password, name) values('$email', '$password', ' $name')";
        $this->db->query($sql);
        Session::delete('user');

        return true;
    }
}
