<?php
session_start();
require_once '../app/process.php';
require_once '../app/helpers.php';

if (!isLoggedIn()) {
    header("location:/login");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <div class="container">
        <div class="text-white text-center">
            <h1>My App</h1>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Hi, <?php echo $_SESSION['username'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>
        <form id="logout-form" method="POST" class="d-none">
             <input type="hidden" name="logout">
        </form>
    </div>
</nav>

<section>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome Admin!</div>
                </div>
                <?php
                   require "alert-message.php";
                ?>
                <div>
                    <a href="/admin/crawl">
                        <button class="btn btn-primary mt-3">Trigger Crawl</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
