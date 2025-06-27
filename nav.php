<?php 
    include_once("my_session.php");
?>
<style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .navbar, .dropdown-menu, .nav-item {
            border-radius: 0.5rem;
        }
        .navbar-brand, .nav-link, .dropdown-item {
            padding: 0.75rem 1rem; 
        }
        .navbar-brand {
            padding-left: 0;
        }
</style>

<div class="container-fluid bg-primary py-2"> 
    <nav class="container navbar navbar-expand-lg bg-body-tertiary rounded-lg shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand text-primary-emphasis fw-bold" href="index.php">Home</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" aria-current="page" href="index.php">NEWS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" href="filter_post.php?subjectId=1">Politics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" href="filter_post.php?subjectId=2">Wars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" href="filter_post.php?subjectId=3">IT News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary-emphasis" href="filter_post.php?subjectId=4">Social</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary-emphasis" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php 
                                if (checkSession("username")) {
                                echo getSession("username");
                                }else{
                                    echo "Member";
                                }
                            ?>
                        </a>
                        <ul class="dropdown-menu rounded">
                            <?php 
                                if (checkSession("username")) {
                                echo "<li><a class='dropdown-item' href='logout.php'>Sign Out</a></li>";
                                }else {
                                    echo "
                                    <li><a class='dropdown-item' href='register.php'>Register</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='login.php'>Sign In</a></li>
                                    ";
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
