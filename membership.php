<?php 
include_once("DB_Hacker.php");
function registerUser($username, $email, $password) 
{
    if (usernameCheck($username) && emailCheck($email) && passwordCheck($password)) {
        return insertUser($username, $email, $password);
    }else {
        return "Fail";
    }

}

// ---------------------------------------------------------------------------------

function loginUser ($email, $password){
    if (emailCheck($email) && passwordCheck($password)) {
        return userLogin($email, $password);
    }else {
        return "Auth Fail";
    }
}


// ---------------------------------------------------------------------------------


function usernameCheck($username)
{
    if(strlen($username) >= 6){
        $bol = preg_match('/^[\w]+$/', $username);
        return $bol;
    } else {
        return False;
    }
}
// $bol = usernameCheck("minthiha");
// echo $bol ? "True" : "False";

// ---------------------------------------------------------------------------------

function emailCheck ($email)
{
    if (strlen($email) >= 15) {
        $bol = preg_match('/[a-zA-z0-9]+@[a-z]+\.[a-z]{2,4}/', $email);
        return $bol;
    }else {
        return False;
    }
}
// $bol = emailCheck('minthiha@gmail.com');
// echo $bol ?'True':'False';

// ---------------------------------------------------------------------------------

function passwordCheck ($password)
{
    if (strlen($password) >= 6) {
        $bol = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*(_|[^\w]))(?=.*\d).+$/', $password);
        return $bol;
    }else {
        return False;
    }
}
// $bol = passwordCheck(password: "Thiha1@");
// echo $bol ? "True" : "False";

?>