<?php

class AccountController extends BaseController
{
    private $db;

    public function onInit()
    {
        $this->db = new AccountModel();
    }

    public function register()
    {
        if ($this->isPost()) {
            $username = $_POST["username"];

            if ($username == null || strlen($username) < 2) {
                $this->addErrorMessage("Invalid username");
                $this->redirect("account", "register");
            }
            $password = $_POST["password"];
            $isRegistered = $this->db->register($username, $password);
            if ($isRegistered) {
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Register successful!");
                $this->redirect("home");
            } else {
                $this->addErrorMessage("Registration failed!");
            }
        }

        $this->renderView("register");
    }

    public function login()
    {
        if ($this->isPost()) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $isLoggedIn = $this->db->login($username, $password);

            if($isLoggedIn){
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Login successful!");
                $this->redirect("home");
            } else {
                $this->addErrorMessage("Login failed!");
                $this->redirect("account", "login");
            }
        }
        $this->renderView("login");
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['isAdmin']);
        $this->addInfoMessage("Logout successful!");
        $this->redirect("home");
    }
}
