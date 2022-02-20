<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: levilb
 * Date: 9/18/16
 * Time: 1:30 PM
 */

interface CrudControllerInterface {
    public function index();
    public function create();
    public function create_action();
    public function edit($id);
    public function edit_action();
    public function delete($id);
}