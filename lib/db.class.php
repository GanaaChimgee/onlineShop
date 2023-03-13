<?php
class Db
{
    protected $connection; // charset
    protected $error;

    public function __construct($host, $db, $user, $password)
    {
        $this->connection = new mysqli($host, $user, $password, $db);

        if (mysqli_connect_error()) {
            //error dotroo aldaanii code-g hij ogno..
            $this->error = mysqli_connect_error();
            die("Mysql сэрвэртэй холбогдох үед алдаа гарлаа: " . $this->error . " ( Алдааны дугаар: #" . mysqli_connect_errno() . " )");
        }
    }

    public function query($sql)
    {
        // Холбогдсон эсэхийг шалгах
        if (!$this->connection) {
            return false;
        }

        // SQL Командыг ажиллуулах
        /**
         * @return $result is boolean then stop the code and return it.
         *
         */
        $result = $this->connection->query($sql);

        if (mysqli_error($this->connection)) {
            $this->error = mysqli_error($this->connection);
            die("SQL командыг ажиллуулж чадсангүй: " . mysqli_error($this->connection));
        }

        if (is_bool($result)) {
            return $result;
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function escape($value)
    {

        // ' " \n escape ni edgeer tusgai temdegtuuudiig zailuulj ogno..
        // mysqli_real_escape_string ni $connection-g charset ashiglan medeelliig awaad escape hj ogno. 
        return mysqli_real_escape_string($this->connection, $value);
    }
}
