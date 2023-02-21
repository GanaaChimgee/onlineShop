<?php

class Page extends Model
{
    // Блог хуудсыг засварлах
    public function savePage($data, $id)
    {
        // SQL injection хамгаалалт
        $id = (int) $id;

        // Хадгалах өгөгдлүүд бүрэн дамжуулагдсан эсэх
        if (!isset($data['title']) || !isset($data['content'])) {
            return false;
        }

        // SQL injection халдлагаас сэргийлэх
        $title = $this->db->escape(trim($data['title']));
        $alias = str_replace(" ", "-", $title);
        $content = $this->db->escape($data['content']);

        $is_published = ($data['is_published'] == 'on') ? 1 : 0;

        // Мэссэжийг хадгална
        $sql = "update pages set
                     title='$title',
                     content='$content',
                     alias='$alias',
                     is_published=$is_published
                where id = $id
                     ";

        return $this->db->query($sql);
    }

    // Шинэ вэб хуудас нэмэх
    public function addNewPage($data)
    {
        // Хадгалах өгөгдлүүд бүрэн дамжуулагдсан эсэх
        if (!isset($data['title']) || !isset($data['content'])) {
            return false;
        }

        // SQL injection халдлагаас сэргийлэх
        $title = $this->db->escape(trim($data['title']));
        $alias = str_replace(" ", "-", $title);
        $content = $this->db->escape($data['content']);
        $is_published = ($data['is_published'] == 'on') ? 1 : 0;

        // Мэссэжийг хадгална
        $sql = "insert into pages set
                    title='$title',
                    content='$content',
                    alias='$alias',
                    is_published=$is_published
                    ";

        return $this->db->query($sql);
    }

    // Вэб хуудсыг устгана
    public function delete($id)
    {
        $id = (int) $id;
        $sql = "delete from pages where id=$id";
        return $this->db->query($sql);
    }

    // Бүх вэбүүдийг базаас уншиж авах функц
    public function getList($is_published = false)
    {
        $sql = "SELECT * FROM pages where 1 ";

        if ($is_published) {
            $sql .= " and is_published=1 ";
        }

        return $this->db->query($sql);
    }

    // Вэб хуудсыг alias (slug) аар нь шүүж авч өгөх функц
    public function getByAlias($alias)
    {
        $alias = $this->db->escape($alias);
        $sql = "select * from pages where alias='$alias' limit 1";
        return $this->db->query($sql) ?? null;
    }

    // Вэб хуудсыг ID-аар нь шүүж авч өгөх функц
    public function getById($id)
    {
        $id = (int) $id;
        $sql = "select * from pages where id=$id limit 1";
        return $this->db->query($sql) ?? null;
    }
}