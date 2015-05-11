<?php
class SearchController extends BaseController {
    private $db;
    public function onInit(){
        $this->db = new SearchModel();
    }

    public function tags (){
        if($this->isPost()){
            $this->tag = $_POST['tag'];
            $this->postsByTag = $this->db->getPostsByTag($this->tag);
        }
    }
}