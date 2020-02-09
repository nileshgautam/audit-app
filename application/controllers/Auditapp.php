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

    // function to load work steps according to process
    function work_steps($sub_process_id)
    {
        // print_r($sub_process_id);
        $data['risk'] = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $sub_process_id), 'risk_name');
        $data['work_steps'] = $this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id' => $sub_process_id), 'steps_name');
        // echo '<pre>';
        // print_r($data);die;

        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        $this->load->view('template/workSteps', $data);
        $this->load->view('login/layout/footer');
    }

    // function to load company 
    public function company()
    {
        $data['client_list'] = $this->MainModel->selectAll('tbl_client_details', 'client_name');
        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        $this->load->view('template/company',$data);
        $this->load->view('login/layout/footer');
    }
    // function to load company 
    public function client_registration_form()
    {
        $data['country'] = $this->MainModel->selectAll('countries', 'name');
        $data['role'] = $this->MainModel->selectAll('tbl_role', 'role');
        // echo '<pre>';
        // print_r($data);
        $this->load->view('login/layout/header');
        $this->load->view('login/nav');
        $this->load->view('template/clientForm', $data);
        $this->load->view('login/layout/footer');
    }

    // function to show state compnay view
	public function select_state()
	{
		// print_r($_POST);die;
		$id = $this->input->post('c_id');
		$data = $this->MainModel->selectAllFromWhere('states', array('country_id' => $id));
		// echo "<pre>";
		// print_r($data);die;
		$myjson = json_encode($data, true);
		echo $myjson;
	}
	
	// function to show city compnay view
	public function select_cities()
	{

		$id = $this->input->post('c_id');
		$data = $this->MainModel->selectAllFromWhere('cities', array('state_id' => $id));
		// echo "<pre>";
		// print_r($data);die;
		$myjson = json_encode($data, true);
		echo $myjson;
    }
    
    public function clientPost()
    {
        print_r($_POST);die;
    }

}
