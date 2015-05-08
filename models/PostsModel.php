<?php

class PostsModel extends BaseModel
{
    public function getAll()
    {
        $statement = self::$db->query("SELECT * FROM posts WHERE isDeleted = 0 ORDER BY postedON");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }



    public function find($id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($title, $text)
    {
        if ($title == '' || $text == '') {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO posts(title, text) VALUES(?, ?)");
        $statement->bind_param("ss", $title, $text);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name)
    {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE posts SET name = ? WHERE id = ?");
        $statement->bind_param("si", $name, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}
