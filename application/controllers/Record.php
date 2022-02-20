<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load file before using interface crud controller
require_once APPPATH . '/interfaces/CrudControllerInterface.php';

class Record extends CI_Controller implements CrudControllerInterface {

    public function __construct() {
        parent::__construct();
        $this->load->model("accounts_model");
    }

    public function index() {
        // TODO: Implement index() method.
    }

    public function create() {
        renderTemplate("record/create");
    }

    public function create_action() {
        //var_dump($_POST);
        $details = $this->security->xss_clean($this->input->post("txtDetailsName"));
        $reference = $this->security->xss_clean($this->input->post("txtReferenceName"));
        $amount = $this->security->xss_clean($this->input->post("txtAmountName"));
        
        $debit = $this->input->post("selTransaction") == 2 ? $amount : "";
        $credit = $this->input->post("selTransaction") == 1 ? $amount : "";
        $array = array('details' => $details,
                'reference' => $reference,
                'debit' => $debit,
                'credit' => $credit,
                'created_date' => date("Y-m-d H:i:s")
            );

        $response = $this->accounts_model->insertRecord($array);
        if($response) {
            $this->session->set_flashdata('flashSuccess', 'Add Record successful');
            redirect('/');
        } else {
            $this->session->set_flashdata('flashError', 'Add Record failed');
            redirect('/panel/create/');
        }
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function edit_action()
    {
        // TODO: Implement edit_action() method.
    }

    public function delete($id) {
        // TODO: Implement delete() method.
    }
}