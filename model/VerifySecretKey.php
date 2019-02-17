<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/2019
 * Time: 22:06
 */

require_once 'Connect.php';

class VerifySecretKey extends Connect
{

    function verify($key, $domain)
    {
        $sql = "SELECT *
                FROM customer, secret_key 
                WHERE customer.customer_id = secret_key.customer_id
                AND customer.domain = $domain
                AND secret_key.key_content = $key
                AND secret_key.expired IS NULL";

        $query = $this->con->query($sql);

        if ($query) {
            if ($query->num_rows == 1)
                return true;
            else
                return false;
        } else
            return false;
    }

}