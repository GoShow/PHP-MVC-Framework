<?php

class SearchModel extends BaseModel
{
    public function getPostsByTag($tag){
        $statement = self::$db->prepare("
          SELECT *
          FROM posts p
            JOIN tags t
              ON p.id = t.post_id
          WHERE t.tag = ? AND p.isDeleted = 0
          ORDER BY p.postedOn DESC");
        $statement->bind_param("s", $tag);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}