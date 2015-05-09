<?php

class PostsController extends BaseController
{
    private $postsModel;

    protected function onInit()
    {
        $this->title = 'Posts';
        $this->postsModel = new PostsModel();
    }

    public function index()
    {
        if (isset($_POST['postId'])) {
            $postId = $_POST['postId'];
            $this->visits = $this->postsModel->increaseVisits($postId);
            $this->post = $this->postsModel->getPost($postId);
        }
    }

    public function create()
    {
        if ($this->isPost()) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $tagsString = $_POST['tags'];
            $tags = preg_split('/\s+/', $tagsString);


            if ($this->postsModel->create($title, $text, $tags)) {
                $this->addInfoMessage("Post created.");
                $this->redirect("home");
            } else {
                $this->addErrorMessage("Cannot create post.");
            }
        }
    }

    public function edit(){
        if ($this->isPost()) {
            $postId = $_POST['postId'];
            $this->post = $this->postsModel->getPost($postId);
        }
    }

    public function confirmEdit()
    {
        if ($this->isPost()) {
            // Edit the post in the database
            $id = $_POST['postId'];
            $title = $_POST['title'];
            $text = $_POST['text'];

            if ($this->postsModel->edit($id, $title, $text)) {
                $this->addInfoMessage("Post edited.");
                $this->redirect("home");
            } else {
                $this->addErrorMessage("Cannot edit post.");
            }
        }
    }

    public function delete()
    {
        if ($this->isPost()) {
            $postId = $_POST['postId'];
            $this->post = $this->postsModel->getPost($postId);
        }
    }

    public function confirmDelete()
    {
        if ($this->isPost()) {
            $postId = $_POST['postId'];

            if ($this->postsModel->delete($postId)) {
                $this->addInfoMessage("Post deleted.");
            } else {
                $this->addErrorMessage("Cannot delete post #" . htmlspecialchars($postId) . '.');
                $this->addErrorMessage("Maybe it is in use.");
            }
        }

        $this->redirect("home");
    }
}
