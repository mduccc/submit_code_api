<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/2019
 * Time: 22:30
 */

header('Content-Type: application/json; charset=UTF-8');

class Key
{
    public $key;
}

require_once '../model/GenerateKey.php';

$generateKey = new GenerateKey();
$newKey = $generateKey->generate();

$response = new Key();
$response->key = $newKey;

echo json_encode($response);