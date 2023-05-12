<?php
session_start();

require_once dirname(__FILE__, 3) . '/config/config.php';
require_once MODULES_PATH . '/autoloader.php';
require_once MODULES_PATH . '/image/ImageHandler.php';

if (empty($_POST) || !isset($_POST['submit'])) {
    header('Location: ../sign-up.php');
    die();
}

unset($_POST['submit']);

$imageInfo = saveImage(
    $_FILES['image'] ?? null,
    '../img/users'
);

if ($imageInfo === false) {
    header('Location: ../sign-up.php');
    die();
}

$formInput = array_merge($_POST, $imageInfo);

$userRepository = new UserRepository();
$userRepository->insert($formInput);

$_SESSION['username'] = $formInput['username'];

$httpReferer = $_SESSION['HTTP_REFERER'] ?? '../index.php';
unset($_SESSION['HTTP_REFERER']);

header('Location: ' . $httpReferer);
