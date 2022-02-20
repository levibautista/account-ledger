<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load file before using interface crud controller
require_once APPPATH . '/interfaces/CrudControllerInterface.php';

class Main extends CI_Controller implements CrudControllerInterface {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("accounts_model");
    }

    public function index() {
        $data['results'] = $this->accounts_model->retrieveAllRecords();
        //print_r($data);die;
        renderTemplate("main/index", $data);
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function create_action()
    {
        // TODO: Implement create_action() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function edit_action()
    {
        // TODO: Implement edit_action() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}