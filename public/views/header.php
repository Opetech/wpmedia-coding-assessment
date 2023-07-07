<?php
if (empty($meta_title)) {
    $meta_title = "My App";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $meta_title; ?></title>
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
                <a class="nav-link" href="<?php echo $_ENV['APP_BASE_URL']; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_ENV['APP_BASE_URL']; ?>/services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_ENV['APP_BASE_URL']; ?>/about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_ENV['APP_BASE_URL']; ?>/contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_ENV['APP_BASE_URL']; ?>/sitemap">Sitemap</a>
            </li>
        </ul>
    </div>
</nav>
