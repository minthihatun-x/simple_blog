<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();  // ✅ Starts session only if none is active
}
function setSession($key,$value) {   
    $_SESSION[$key] = $value;
}

function checkSession ($key) {
    return isset($_SESSION[$key]);
}

function getSession($key) {
    return $_SESSION [$key] ?? null;
}



?>