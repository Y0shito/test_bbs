<?php
session_start();

date_default_timezone_set('Japan');

$pdo = new PDO('mysql:host=localhost;dbname=smash;charset=utf8','yoshito','yoshito');

function h($string){
  return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function mbTrim($string){
  return preg_replace('/\A[\p{Cc}\p{Cf}\p{Z}]++|[\p{Cc}\p{Cf}\p{Z}]++\z/u', '', $string);
}

function setToken(){
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }