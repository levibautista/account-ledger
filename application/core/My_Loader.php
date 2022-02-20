<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: levilb
 * Date: 9/18/16
 * Time: 1:28 PM
 */

class My_Loader extends CI_Loader {

    public function __construct() {
        parent::__construct();
    }

    public function iface($interfaceName) {
        require_once APPPATH . '/interfaces/' . $interfaceName . '.php';
    }
}