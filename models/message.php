<?php
class Message extends Model
{
    // Бүх мэссэжийг базаас авна
    public function getList()
    {
        return $this->db->query("select * from messages");
    }

    // Message table рүү санал хүсэлтийг шинээр нэмж өгнө
    public function addNewMessage($data)
    {
        // Хадгалах өгөгдлүүд бүрэн дамжуулагдсан эсэх
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {
            return false;
        }

        // SQL injection халдлагаас сэргийлэх
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        // Мэссэжийг хадгална
        $sql = "insert into messages set
                    name='$name',
                    email='$email',
                    message='$message'";

        return $this->db->query($sql);
    }
}