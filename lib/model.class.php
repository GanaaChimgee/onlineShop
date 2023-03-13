<?php
class Model
{
    /**
     * This function is called when the class is instantiated, and it sets the  property to the
     * database connection.
     */
    /**
     * It's a constructor function that creates a new instance of the class and assigns the database
     * connection to the  property.
     */
    protected $db;

    /* It's a constructor function that creates a new instance of the class and assigns the database
       * connection to the  property. */
    public function __construct()
    {
        $this->db = App::$db;
    }
}
