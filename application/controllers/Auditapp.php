<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auditapp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata"); //Set server date an time to Asia
        if (!isset($_SESSION['userInfo'])) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function admin()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function newtheme()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function auditor()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function manager()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function team_leader()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function team_member()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    public function users()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('layout/index');
        $this->load->view('layout/footer');
    }

    // function to load work steps according to process
    function work_steps($sub_process_id)
    {
        $data['risk'] = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $sub_process_id), 'risk_name');
        $data['work_steps'] = $this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id' => $sub_process_id), 'steps_name');
        $data['data_required'] = $this->MainModel->selectAllFromWhere('tbl_data_required', array('sub_process_id' => $sub_process_id), 'data_required');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/workSteps', $data);
        $this->load->view('layout/footer');
    }

    // function to load work steps according to process
    function choose_services()
    {
        $data['services'] = $this->MainModel->selectAll('tbl_process', 'process_name');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/auditServices', $data);
        $this->load->view('layout/footer');
    }

    // function to load company 
    public function company()
    {
        $data['client_list'] = $this->MainModel->selectAll('tbl_client_details', 'client_name');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/company', $data);
        $this->load->view('layout/footer');
    }

    // function to load company 
    public function user_view()
    {
        $data['client_list'] = $this->MainModel->selectAll('tbl_client_details', 'client_name');
        $data['country'] = $this->MainModel->selectAll('countries', 'name');
        $data['role'] = $this->MainModel->selectAll('tbl_role', 'role');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/users', $data);
        $this->load->view('layout/footer');
    }

    // function to load user table from database
    public function user_tab()
    {
        $data['users'] = $this->MainModel->selectAll('tbl_user', 'user_first_name');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/usertab', $data);
        $this->load->view('layout/footer');
    }

    // function to load company 
    public function client_registration_form()
    {
        $data['country'] = $this->MainModel->selectAll('countries', 'name');
        $data['role'] = $this->MainModel->selectAll('tbl_role', 'role');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/clientForm', $data);
        $this->load->view('layout/footer');
    }

    // function to show state compnay view
    public function select_state()
    {
        // print_r($_POST);die;
        $id = $this->input->post('c_id');
        $data = $this->MainModel->selectAllFromWhere('states', array('country_id' => $id));
        $myjson = json_encode($data, true);
        echo $myjson;
    }

    // function to show city compnay view
    public function select_cities()
    {

        $id = $this->input->post('c_id');
        $data = $this->MainModel->selectAllFromWhere('cities', array('state_id' => $id));
        $myjson = json_encode($data, true);
        echo $myjson;
    }

    public function clientPost()
    {
        $c_name = $this->input->post('client-name');
        $c_address = $this->input->post('address');
        $c_city = $this->input->post('city');
        $c_state = $this->input->post('state');
        $c_country = $this->input->post('country');
        $c_email = $this->input->post('email');
        $c_contact_no = $this->input->post('mobile-number');
        $c_zip_pin_code = $this->input->post('zip');
        $gst_number = $this->input->post('gst-number');

        if (isset($c_email)) {
            // print_r($_POST);
            // die;
            $data = $this->MainModel->selectAllFromWhere('tbl_client_details', array('email' => $c_email));
            if (!empty($data)) {
                // print_r($data);
                $this->session->set_flashdata("error", "Company, Already Exist Please enter uniqe company name.");
                redirect(__CLASS__ . '/client_registration_form');
                // die;
            } elseif (empty($data)) {

                $insert = array(
                    'client_name' => $c_name,
                    'address' => $c_address,
                    'city' => $c_city,
                    'state' => $c_state,
                    'country' => $c_country,
                    'zip_pin_code' => $c_zip_pin_code,
                    'contact_no' => $c_contact_no,
                    'email' => $c_email,
                    'gst_number' => $gst_number
                );
                $res = $this->MainModel->insertInto('tbl_client_details', $insert);
                if (!empty($res)) {
                    $this->session->set_flashdata("error", "Company Successfully Registered.");

                    $company_data = array(
                        'company_name' => $c_name,
                        'email' => $c_email,
                        'company_id' => $res
                    );

                    $this->session->set_userdata("company_data", $company_data);
                    redirect(base_url(__CLASS__ . '/choose_services'));
                }
            } else {
                $this->session->set_flashdata("error", "Company Already Exist.");
                redirect(__CLASS__ . '/client_registration_form');
            }
        }
        redirect(__CLASS__ . '/client_registration_form');
    }

    function user_post()
    {

        // print_r($_POST);die;
        if (empty($_POST)) {
            $this->session->set_flashdata("error", "Fill all details first.");
            redirect(__CLASS__ . '/user_view');
        } else {
            // print_r($_POST);die;
            $data = array(
                'user_first_name' => $this->input->post('first-name'),
                'user_last_name' => $this->input->post('last-name'),
                'user_password' => $this->input->post('password'),
                'user_id' => $this->input->post('email'),
                'user_role' => $this->input->post('user-role'),
                'role' => $this->input->post('role'),
                'user_email' => $this->input->post('email'),
                'user_client_id' => $this->input->post('company-id'),
                'client_name' => $this->input->post('client')
            );
            // print_r($_POST);
            // echo "<pre>";
            // print_r($data);die;
            if (isset($_POST['email'])) {
                $email = $this->MainModel->selectAllFromWhere('tbl_user', array('user_email' => $_POST['email']));
                if (!empty($email)) {
                    // print_r($data);
                    $this->session->set_flashdata("error", "User already exist");
                    redirect(__CLASS__ . '/user_view');
                } elseif (empty($email)) {
                    $inserted_data = $this->MainModel->insertInto('tbl_user', $data);
                    if (isset($inserted_data)) {
                        $this->session->set_flashdata("success", "User successfuly register.");
                        redirect(__CLASS__ . '/user_tab');
                    } else {
                        $this->session->set_flashdata("error", "error.");
                        redirect(__CLASS__ . '/user_view');
                    }
                }
            }
        }
    }

    public function edit_user($id)
    {
        $data['client_list'] = $this->MainModel->selectAll('tbl_client_details', 'client_name');
        $data['role'] = $this->MainModel->selectAll('tbl_role', 'role');
        $data['user'] = $this->MainModel->selectAllFromWhere('tbl_user', array('id' => $id));

        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/users', $data);
        $this->load->view('layout/footer');
    }
    public function delete_user($id)
    {
        $data = $this->MainModel->delete('tbl_user', array('id' => $id));
        if ($data != true) {
            $this->session->set_flashdata("error", "error.");
            redirect(__CLASS__ . '/user_tab');
        } else {
            $this->session->set_flashdata("success", "User deleted");
            redirect(__CLASS__ . '/user_tab');
        }
    }
    // function to populate dashboard for all the company
    public function comp_dashboard($id)
    {
        $id;
        die;
        // // extratcting question data from database by company id
        // $data1 = $this->MainModel->selectAllFromWhere('company_responce', array('company_id' => $id, 'question_type' => 'ISO'));
        // $data = $this->MainModel->selectAllFromWhere('company_responce', array('company_id' => $id, 'question_type' => 'Annex'));
        // // $atotalquestion = 114;
        // $iso = $this->count_Status($data1);
        // $annexe = $this->count_Status($data);
        // $result1 = $this->count_Status_per($iso);
        // $result2 = $this->count_Status_per($annexe);
        // // echo"<pre>";
        // // print_r($result1);
        // // print_r($result2);
        // $resultdata['iso'] = $result1;
        // $resultdata['annexe'] = $result2;

        // print_r($resultdata);
        // print_r($result2);
        // die;
        $this->load->view('common_view/header');
        $this->load->view('common_view/nav');
        // $this->load->view('common_view/comp_dashboard', $resultdata);
        $this->load->view('common_view/footer');
    }

    function user_editpost()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        // if(isset($_POST))
        $data = array(
            'user_first_name' => $this->input->post('first-name'),
            'user_last_name' => $this->input->post('last-name'),
            'user_password' => $this->input->post('password'),
            'user_id' => $this->input->post('email'),
            'user_role' => $this->input->post('user-role'),
            'role' => $this->input->post('role'),
            'user_email' => $this->input->post('email'),
            'user_client_id' => $this->input->post('company-id'),
            'client_name' => $this->input->post('client')
        );
        $id = $this->input->post('id');
        $result = $this->MainModel->update_table('tbl_user', array('id' => $id), $data);
        if ($result == "FALSE") {
            $this->session->set_flashdata("success", " User updated successfuly register.");
            redirect(__CLASS__ . '/user_tab');
        } else if ($result == "TRUE") {
            $this->session->set_flashdata("error", "Error.");
            redirect(__CLASS__ . '/user_tab');
        }
    }

    function update_company()
    {
        if (!empty($_POST)) {
            $process = $_POST['process'];
            $data = array(
                'process' => $process
            );
            $result = $this->MainModel->update_table('tbl_client_details', array('id' => $_POST['id']), $data);
            if ($result === true) {
                // $this->session->set_flashdata('success', 'Client successfully register.');
                // redirect(__CLASS__ . '/company');
                echo "Client successfully register";
            } else {
                $this->session->set_flashdata('error', 'OPPs..');
                // redirect(__CLASS__ . '/company');
                echo "OPPs..";
            }
        } else {
            // $this->session->set_flashdata('error', 'error occourd.');
            // redirect(__CLASS__ . '/company');
            echo "error occourd.";
        }
    }

    public function sub_process($sub_id)

    {
        if (!empty($sub_id)) {
           
            $data['subServices'] = $this->MainModel->selectAllbyMultipleId('tbl_sub_process', base64_decode($sub_id));

            // $data['risk'] = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $subServices['id']));
            $this->load->view('layout/header');
            $this->load->view('layout/sidenav');
            $this->load->view('template/subservices', $data);
            $this->load->view('layout/footer');
        }
    }
}
