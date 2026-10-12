<?php

include_once 'm_user.php';

class c_login
{
    public $model;

    public function __construct()
    {
        $this->model = new m_user();
    }

    public function invoke()
    {
        $action = $_POST['action'] ?? 'form';

        switch ($action) {
            case 'proses':
                $this->proses();
                break;
            default:
                $this->form();
                break;
        }
    }

    public function form()
    {
        $error = '';
        include 'v_login.php';
    }

    public function proses()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->model->login($username, $password);

        if ($user) {
            session_start();
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
            include 'v_login.php';
        }
    }
}
?>
