<?php

class PostsController extends BaseController {
    private $postsModel;

    protected function onInit() {
        $this->title = 'Posts';
        $this->postsModel = new PostsModel();
    }

    public function index() {
        $this->posts = $this->postsModel->getAll();
    }

    public function create() {
        if ($this->isPost()) {
            $title = $_POST['title'];
            $text = $_POST['text'];

            if ($this->postsModel->create($title, $text)) {
                $this->addInfoMessage("Post created.");
                $this->redirect("posts");
            } else {
                $this->addErrorMessage("Cannot create post.");
            }
        }
    }

    public function edit($id) {
        if ($this->isPost()) {
            // Edit the post in the database
            $name = $_POST['name'];
            if ($this->postsModel->edit($id, $name)) {
                $this->addInfoMessage("Post edited.");
                $this->redirect("posts");
            } else {
                $this->addErrorMessage("Cannot edit post.");
            }
        }

        // Display edit post form
        $this->post = $this->postsModel->find($id);
        if (!$this->post) {
            $this->addErrorMessage("Invalid post.");
            $this->redirect("posts");
        }
    }

    public function delete($id) {
        if ($this->postsModel->delete($id)) {
            $this->addInfoMessage("Post deleted.");
        } else {
            $this->addErrorMessage("Cannot delete post #" . htmlspecialchars($id) . '.');
            $this->addErrorMessage("Maybe it is in use.");
        }
        $this->redirect("posts");
    }
}
