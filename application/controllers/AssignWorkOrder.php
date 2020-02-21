<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AssignWorkOrder extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia
        if (!isset($_SESSION['userInfo'])) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    function allowcated_work_order(){
        $data['users'] = $this->MainModel->selectAll('users', 'first_name');
        // echo '<pre>';
        // print_r($data);
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/allowcateWorkorder',$data);
        $this->load->view('layout/footer');
    }

}
