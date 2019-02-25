<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/2019
 * Time: 22:30
 */

header('Content-Type: application/json; charset=UTF-8');

require_once '../model/VerifySecretKey.php';

if (isset($_GET['secret_key']) && isset($_GET['domain'])) {
    $key = $_GET['secret_key'];
    $domain = $_GET['domain'];

    $verifySecretKey = new VerifySecretKey();
    $verify = $verifySecretKey->verify($key, $domain);

    if ($verify)
        echo '{"activated": true}';
    else
        echo '{"activated": false}';
}