<?php
class User extends Model
{

    // Логин нэрээр нь хэрэглэгчийг шүүнэ
    /**
     * It takes a login, escapes it, and then queries the database for a customer with that login
     * 
     * @param login the login of the user
     * 
     * @return An array of objects.
     */
    public function getByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from customer where login='$login' limit 1";
        return $this->db->query($sql);
    }

    /**
     * It takes an email and password, checks if the email exists in the database, if it does, it
     * checks if the password is correct, if it is, it sets the user session and returns true, if not,
     * it returns false.
     * 
     * @param string email The email address of the user
     * @param string password y$/X.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q.Q
     * 
     * @return bool a boolean value.
     */
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

    /**
     * It takes in a string, a string, and a string, and returns a boolean.
     * 
     * @param string email the email address of the user
     * @param string pwd the password that the user entered
     * @param name string
     */
    public function handleRegister(string $email, string $pwd, $name): bool
    {
        $password = password_hash($pwd, PASSWORD_BCRYPT);
        $sql = "INSERT INTO customer(email, password, name) values('$email', '$password', ' $name')";
        $this->db->query($sql);
        Session::delete('user');

        return true;
    }
}
