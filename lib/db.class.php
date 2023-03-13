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
            die("da ist ein Fehler treten: " . $this->error . " ( Error Nummer: #" . mysqli_connect_errno() . " )");
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

    /**
     * It escapes the string by adding a backslash in front of the following characters: \x00, \n, \r,
     * \, ', " and \x1a
     * 
     * @param value The value to be escaped. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and
     * Control-Z.
     */
    public function escape($value)
    {

        // ' " \n escape ni edgeer tusgai temdegtuuudiig zailuulj ogno..
        // mysqli_real_escape_string ni $connection-g charset ashiglan medeelliig awaad escape hj ogno. 
        return mysqli_real_escape_string($this->connection, $value);
    }
}
