<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends My_Model {

    private $tbl_account_ledger = "account_ledger";
     
    public function __construct() {
        parent::__construct();
    }

    public function retrieveAllRecords() {
        $sql = "select * from ".$this->tbl_account_ledger." ORDER BY created_date ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertRecord($array) {
        return $this->insert($this->tbl_account_ledger, $array);
    }
}