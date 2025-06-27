<?php 
// date_default_timezone_set("Asia/Yangon");

define("DB_HOST","localhost");
define("DB_NAME","simple_blog");
define("DB_USER","root");
define("DB_PASS","");

function dbConnect() 
{
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        echo "Database Connection Failed";
    }else {
        return $db;
    }
}

function insertUser($name, $email, $password){
    $password = encode($password);
    $curTime = getTimeNow();
    $db = dbConnect();
    $qry = "SELECT * FROM member WHERE email = '$email'";
    $result = mysqli_query($db, $qry);
    if (mysqli_num_rows($result) > 0) {
        return "Email is already in use!";
    }else {
        $qry = "INSERT INTO member (name,email,password,created_at,updated_at)
                VALUES
                ('$name','$email', '$password', '$curTime', '$curTime')";
        $result = mysqli_query($db, $qry);

        # zzz
        if (!$result){
            die("Query Failed: " . mysqli_error($db));
        }

        if ($result == 1){
            return "Register Success!";
        }else {
            return "Register Fail!";
        }
    }
}
// echo insertUser("minthihatun","minthihatun@gmail.com","123123");


function userLogin ($email, $password){
    $password = encode($password);
    $db = dbConnect();
    $qry = "SELECT name FROM member WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $qry);

    if ($result){
        foreach ($result as $row){
            $username = $row["name"];
        }
        setSession("username",$username);
        setSession("email",$email);
        return "Login Success";
    }else {
        return "Login Fail";
    }

    // if (mysqli_num_rows($result) > 0) {
    //     return "Login Success";
    // }else {
    //     return "Login Fail";
    // }
}
function encode($pass){
    $pass = md5($pass);
    $pass = sha1($pass);   
    $pass = crypt($pass, $pass);
    return $pass;
}
function getTimeNow ()
{
    return date("Y-m-d H:m:s", timestamp: time());
}

?>