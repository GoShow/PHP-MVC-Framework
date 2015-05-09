<?php

class PostsModel extends BaseModel
{
    public function getAll()
    {
        $statement = self::$db->query("
          SELECT *
          FROM posts
          WHERE isDeleted = 0
          ORDER BY postedOn DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getTags(){
        $statement = self::$db->query("
          SELECT  tag, COUNT(tag) as tagsCount
          FROM tags
          GROUP BY tag
          ORDER BY COUNT(tag) DESC, tag
          LIMIT 5");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getPost($id){
        $statement = self::$db->prepare(
            "SELECT * FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }



    public function create($title, $text, $tags)
    {
        if ($title == '' || $text == '' ||  count($tags) == 0) {
            return false;
        }

        $statement = self::$db->prepare(
            "INSERT INTO posts(title, text) VALUES(?, ?)");
        $statement->bind_param("ss", $title, $text);
        $statement->execute();

        $statement = self::$db->prepare(
            "SELECT id FROM posts WHERE title = ? AND text = ?");
        $statement->bind_param("ss", $title, $text);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $postId = $result['id'];

        foreach ($tags as $tag) {
            $statement = self::$db->prepare(
            "INSERT INTO tags(tag, post_id) VALUES(?, ?)");
            $statement->bind_param("si", $tag, $postId);
            $statement->execute();
        }
        return $statement->affected_rows > 0;
    }

    public function edit($id, $title, $text)
    {
        if ($title == '' || $text == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE posts SET title = ?, text = ? WHERE id = ?");
        $statement->bind_param("ssi", $title, $text, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id)
    {
        $deleted = 1;
        $statement = self::$db->prepare(
            "UPDATE posts SET isDeleted = ? WHERE id = ?");
        $statement->bind_param("ii", $deleted, $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function increaseVisits($id){
        $statement = self::$db->prepare(
            "SELECT visits FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        $visits = $result['visits'] + 1;

        $statement = self::$db->prepare(
            "UPDATE posts SET visits = ? WHERE id = ?");
        $statement->bind_param("ii", $visits, $id);
        $statement->execute();
        return $statement->errno == 0;
    }
}
