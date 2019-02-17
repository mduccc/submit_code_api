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
            require_once '../config.php';
            $this->con = new mysqli($host, $username, $password, $database);
        } catch (Exception $e) {
            echo $e;
        }
    }

}
