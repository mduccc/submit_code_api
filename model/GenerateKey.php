<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/2019
 * Time: 22:24
 */

require_once 'Connect.php';

class GenerateKey extends Connect
{

    function isExits($key)
    {
        $sql = "SELECT *
                FROM customer, secret_key 
                WHERE customer.customer_id = secret_key.customer_id
                AND secret_key.key_content = '$key'";

        $query = $this->con->query($sql);

        if ($query->num_rows >= 1)
            return false;
        else
            return true;
    }

    function random()
    {
        $source = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = 256;
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $source[rand(0, strlen($source) - 1)];
        }

        return $key;
    }

    function generate()
    {
        $key = $this->random();
        $isExits = $this->isExits($key);

        if ($isExits == false)
            $this->generate();
        else
            return $key;
    }

}