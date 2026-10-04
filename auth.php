<?php
// Shared authentication helpers; compatible with PHP 5.2.5.
if (session_id() == '') { session_start(); }
if (!function_exists('h')) {
    function h($value) { return htmlspecialchars($value, ENT_QUOTES); }
}
function is_logged_in() { return isset($_SESSION['user_id']); }
function require_login() {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
?>
