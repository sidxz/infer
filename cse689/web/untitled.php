<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$content = $_POST["editor"];