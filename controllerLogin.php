<?php 
include 'vues/vueLogin.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $db->accessLogin($_POST['username'], $_POST['password']);
}