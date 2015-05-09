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
    }


}
