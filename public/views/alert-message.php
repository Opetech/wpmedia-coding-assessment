<?php
if ($_SESSION['success']) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['success']);
}

if ($_SESSION['error']) {
    echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['error']);
}
