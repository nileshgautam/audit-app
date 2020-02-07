<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auditapp extends CI_Controller
{
    public function admin()
    {
        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        // $this->load->view('home_page');
        $this->load->view('login/layout/footer');
    }
    public function users()
    {
        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        // $this->load->view('home_page');
        $this->load->view('login/layout/footer');
    }

    function work_steps($sub_process_id)
    {
        // print_r($sub_process_id);
        $data['risk']=$this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id'=>$sub_process_id), 'risk_name');
        $data['work_steps']=$this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id'=>$sub_process_id), 'steps_name');
        // echo '<pre>';
        // print_r($data);die;

        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        $this->load->view('template/workSteps', $data);
        $this->load->view('login/layout/footer');
    }
}
