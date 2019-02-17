<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 17/02/2019
 * Time: 21:51
 */

class Connect
{

    protected $con;

    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $this->con = new mysqli('localhost', 'root', '', 'submit_code_customer');
        } catch (Exception $e) {
            echo $e;
        }
    }

}