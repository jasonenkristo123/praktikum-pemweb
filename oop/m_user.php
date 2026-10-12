<?php

require 'koneksiMVC.php';

class m_user
{
    public function login($username, $password)
    {
        global $mysqli;
        $username = $mysqli->real_escape_string($username);
        $rs = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
        $user = $rs->fetch_assoc();

        if ($user && $user['password'] === $password) {
            return $user;
        }
        return null;
    }
}
?>
