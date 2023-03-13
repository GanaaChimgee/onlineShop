<?php
abstract class Controller
{
    protected $model;
    protected $data;
    protected $params;

    /**
     * The function is a constructor that takes an array of data and sets it to the data property of the
     * class. It also sets the params property of the class to the params property of the router class
     * 
     * @param data This is the data that is passed to the view.
     */
    public function __construct($data = [])
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }


    /**
     * It returns the model.
     * 
     * @return The model.
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * It returns the data.
     * 
     * @return The data property of the object.
     */
    public function getData()
    {

        return $this->data;
    }

    /**
     * It returns the value of the private property .
     * 
     * @return The params array.
     */
    public function getParams()
    {

        return $this->params;
    }
}
