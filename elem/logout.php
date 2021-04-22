<?php
session_start();
$_SESSION['admin_auth'] = null;
$_SESSION['message'] = ['text' => 'Вы вышли из учетной записи Admin', 'status' => 'text-success'];
header("Location: /");