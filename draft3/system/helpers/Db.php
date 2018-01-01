<?php
function pdo() {
    return new PDO("mysql:host=localhost;port=3306;dbname=hoes;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}