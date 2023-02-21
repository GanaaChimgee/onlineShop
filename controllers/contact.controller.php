<?php
class ContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Message();
    }

    // Контакт формыг үзүүлэх ба submit хийхэд баз руу хадгална
    public function index()
    {
        // Илгээ товчийг дарсан эсэх
        if ($_POST) {
            // Илгээ товчийг дарсан байгаа тул мэдээллийг базд хадгална.
            if ($this->model->addNewMessage($_POST)) {
                Session::setMessage("Баярлалаа. Таны илгээсэн мэссэжийг бид амжилттай хүлээж авлаа!");
            }
        }

        return (new View(['site_title' => $this->params[0] . ' блог',
        ], 'contact' . DS . 'index.html'))->render();
    }

    // Админ хүнд контакт формыг үзүүлэх ба submit хийхэд баз руу хадгална
    public function admin_index()
    {
        $messages = $this->model->getList();

        return (new View(['site_title' => $this->params[0] . ' блог',
            'messages' => $messages,
        ], 'contact' . DS . 'admin_index.html'))->render();
    }

}