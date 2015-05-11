<?php

class HomeController extends BaseController {
    private $postsModel;

    protected function onInit() {
        $this->title = 'Home';
        $this->postsModel = new PostsModel();
    }

    public function index() {
        $this->posts = $this->postsModel->getAll();
        $this->tags = $this->postsModel->getTags();
        if(!isset($_SESSION['tags'])){
            $_SESSION['tags'] = [];

            foreach ($this->tags as $currentTag) {
                array_push($_SESSION['tags'], $currentTag);
            }
        } else{
            unset ($_SESSION['tags']);
            $_SESSION['tags'] = [];

            foreach ($this->tags as $currentTag) {
                array_push($_SESSION['tags'], $currentTag);
            }
        }
    }


}
