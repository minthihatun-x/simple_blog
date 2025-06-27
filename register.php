<?php 
    include_once("top.php");


    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $ret = registerUser($username, $email, $password);
        $message = "";
        switch ($ret) {
            case "Register Success!": $message = "Register Success!"; 
                setSession("username", $username);
                setSession("email", $email);
                if ($username === "minthihatun" && $email === "minthihatun@gmail.com" && $password === "Thiha1@") {
                    header("location:admin.php");
                }else {
                    header("location:index.php");                
                }
            break;
            case "Register Fail!": $message = "Register Fail!"; break;
            case "Email is already in use!": $message = "Email is already in use!"; break;
            case "Fail": $message = "Authentication Fail!"; break;
            default : 
            ;break;
        }
        echo "
        <div class='container mt-3'>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                ". $message ."
            </div>
        </div>";
    }
?>


<div class="container my-3">
    <div class="col-md-8 offset-md-2 border border-2 rounded-0 p-4 p-5">
        <h1 class="text-center mb-3 text-danger">Register</h1>
        <form action="register.php" class="form" method="post">

            <div class="mb-3 form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control rounded-0" name="username" id="username" placeholder="Username">
            </div>
            
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Enter your email">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="Enter your password">
            </div>
            
            <!-- <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
            </div> -->
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>





<?php 
    include_once("footer.php"); 
    include_once("base.php");
?>

