<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Filter
{
    private $colName;
    private $searchValue;

    function __construct($colName, $searchValue)
    {
        $this->searchValue = $searchValue;
        $this->colName = $colName;
    }

    function filter_callback_array($data)
    {
        $result = false;
        if (is_array($this->colName) && is_array($this->searchValue)) {


            $colcount = count($this->colName);
            $valcount = count($this->searchValue);
            if ($colcount == $valcount) {
                for ($i = 0; $i < $colcount; $i++) {
                    $result = (strtolower(trim($data[$this->colName[$i]])) == strtolower(trim($this->searchValue[$i])));
                    if (!$result) {
                        break;
                    }
                }
            }
        }
        return $result;
    }
}
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
        $data['services'] = $this->MainModel->selectAll('process_master', 'process_name');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/auditServices', $data);
        $this->load->view('layout/footer');
    }

    // function to load company 
    public function company()
    {
        $data['client_list'] = $this->MainModel->selectAll('client_details', 'client_name');
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
        $data['role'] = $this->MainModel->selectAll('roles', 'role');
        $this->load->view('layout/header');
        $this->load->view('layout/sidenav');
        $this->load->view('template/clientForm', $data);
        $this->load->view('layout/footer');
    }

    // Edit client
    public function edit_client($id)
    {
        $id = base64_decode($id);
        $data['country'] = $this->MainModel->selectAll('countries', 'name');
        $data['role'] = $this->MainModel->selectAll('roles', 'role');
        $data['client_details'] = $this->MainModel->selectAllFromWhere('client_details', array('id' => $id));
        // $c_pro_id = json_decode($data['client_details'][0]['process'], true);
        $allProcess = $this->MainModel->getAllProcessWithSubprocess();
        $data['services'] = $this->MainModel->selectAll('process_master', 'process_name');
        //Filtering subprocess id's for fetching data
        // $cSelectPro = []; //Processes which are selected by client
        // foreach ($c_pro_id as $key => $value) {
        //     foreach ($value as $key1 => $value1) {
        //         $cSelectPro[] = $this->MainModel->getProcessWithSubprocess($key, $value1);
        //     }
        // }

        // $pro = []; //serialized array of client selected processes for difference
        // for ($i = 0; $i < count($cSelectPro); $i++) {
        //     array_push($pro, $cSelectPro[$i][0]);
        // }


        // // Compare all values by a json_encode
        // $diff = array_diff(array_map('json_encode', $allProcess), array_map('json_encode', $pro));

        // $cUselectPro = []; // Processes which are not selected by client
        // foreach ($diff as $key => $value) {
        //     $cUselectPro[] = json_decode($diff[$key], true);
        // }

        $sGroupedArray = []; // Filtering Selected process Array for grouping process with subprocesses
        foreach ($allProcess as $key => $value) {
            $sGroupedArray[] = array_filter($allProcess, array(new Filter(['process_name'], [$allProcess[$key]['process_name']]), "filter_callback_array"));
        }
        $cSelectetGroupedPro = array_map("unserialize", array_unique(array_map("serialize", $sGroupedArray)));

        // $usGroupedArray = []; // Filtering UnSelected process Array for grouping process with subprocesses
        // foreach ($cUselectPro as $key => $value) {        
        // $usGroupedArray[] = array_filter($cUselectPro, array(new Filter(['process_name'], [$cUselectPro[$key]['process_name']]), "filter_callback_array"));
        // }
        // $cUselectetGroupedPro = array_map("unserialize", array_unique(array_map("serialize", $usGroupedArray)));


        //    $data['selectedProcess'] = $cSelectetGroupedPro;
        //    $data['unselectedProcess'] = $cUselectetGroupedPro;
        // $data['id'] = $c_pro_id;
        // $data['allProcess'] = $cSelectetGroupedPro;
        // die;
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
        $c_id = $this->Audit_model->getNewIDorNo("CL", 'client_details');
        $c_address = $this->input->post('address');
        $c_city = $this->input->post('city');
        $c_state = $this->input->post('state');
        $c_country = $this->input->post('country');
        $c_email = $this->input->post('email');
        $c_contact_no = $this->input->post('mobile-number');
        $c_zip_pin_code = $this->input->post('zip');
        $gst_number = $this->input->post('gst-number');

        if (isset($c_email)) {
            $data = $this->MainModel->selectAllFromWhere('client_details', array('email' => $c_email));
            if (!empty($data)) {
                $this->session->set_flashdata("error", "Company, Already Exist Please enter uniqe company name.");
                redirect(__CLASS__ . '/client_registration_form');
            } elseif (empty($data)) {
                $insert = array(
                    'client_name' => $c_name,
                    'client_id' => $c_id,
                    'address' => $c_address,
                    'city' => $c_city,
                    'state' => $c_state,
                    'country' => $c_country,
                    'pin_code' => $c_zip_pin_code,
                    'contact_no' => $c_contact_no,
                    'email' => $c_email,
                    'gst_number' => $gst_number
                );
                $res = $this->MainModel->insertInto('client_details', $insert);
                if (!empty($res)) {
                    $this->session->set_flashdata("error", "Company Successfully Registered.");

                    $company_data = array(
                        'company_name' => $c_name,
                        'client_id' => $c_id,
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

    public function saveEditedClient()
    {
        // print_r($_POST);die;      

        if (isset($_POST)) {
            $insert = array(
                'client_name' => $_POST['client-name'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'country' => $_POST['country'],
                'pin_code' => $_POST['zip'],
                'contact_no' => $_POST['mobile-number'],
                'email' => $_POST['email'],
                'gst_number' => $_POST['gst-number'],
                // 'process' => $_POST['process']
            );
            $res = $this->MainModel->update_table('client_details', array('client_id' => $_POST['client_id']), $insert);
            if (!empty($res)) {
                $this->session->set_flashdata("success", "Client Successfully Updated.");

                $company_data = array(
                    'company_name' => $_POST['client-name'],
                    'email' => $_POST['email'],
                    'company_id' => $_POST['client_id']
                );

                $this->session->set_userdata("company_data", $company_data);
                redirect(base_url(__CLASS__ . '/company'));
            }
        } else {
            $this->session->set_flashdata("error", "System Error Contact to IT.");
        }
        redirect(__CLASS__ . '/company');
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

        $this->load->view('common_view/header');
        $this->load->view('common_view/nav');
        // $this->load->view('common_view/comp_dashboard', $resultdata);
        $this->load->view('common_view/footer');
    }

    function user_editpost()
    {

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

    function create_work_order()
    {
        // print_r($_POST);die;
        if (!empty($_POST)) {
            $wo_id = $this->Audit_model->getNewIDorNo("WO", 'client_details');
            $data = array(
                'work_order_id' => $wo_id,
                'processes' => $_POST['process'],
                'status' => '0',
            );
            $result = $this->MainModel->insertInto('work_order', $data); //save work order

            $relation = array(
                'work_order_id' => $wo_id,
                'client_id' => $_POST['client_id'],
            );
            $result = $this->MainModel->insertInto('client_workorder_relationship', $relation); //save relationship between workorder and client
            if ($result) {
                echo "Work Order Successfully Created";
            } else {
                echo "Something Wrong!";
            }
        } else {
            echo "System Error! contact to IT";
        }
    }

    public function sub_process($sub_id)
    {
        if (!empty($sub_id)) {
            $id = json_decode(base64_decode($sub_id), true);
            $data['subProcess'] = $this->MainModel->selectAllProcessAndSubprocess('tbl_sub_process', $id['p_id'], $id['sp_id']);
            $this->load->view('layout/header');
            $this->load->view('layout/sidenav');
            $this->load->view('template/subservices', $data);
            $this->load->view('layout/footer');
        }
    }

    //manager View
    public function manager_process($sub_id)
    {
        if (!empty($sub_id)) {
            $id = json_decode(base64_decode($sub_id), true);
            $data['subProcess'] = $this->MainModel->selectAllProcessAndSubprocess('tbl_sub_process', $id['p_id'], $id['sp_id']);
            $data['p_id'] = $id['p_id'];
            $this->load->view('layout/header');
            $this->load->view('layout/sidenav');
            $this->load->view('template/manager_view', $data);
            $this->load->view('layout/footer');
        }
    }

    // function to show uploaded mandatory file 
    public function mandatory_file()
    {
        $data = $this->MainModel->selectAllWhere('files', array('mandatory_file_id' => $_POST['mandatorydataid'], 'client_id' => $_POST['companyid']));
        echo $uploads_file = json_encode($data, true);
    }

    // function to show uploaded work steps file 
    public function worksteps_file()
    {
        $data = $this->MainModel->selectAllWhere('files', array('work_steps_id' => $_POST['workstepsid'], 'client_id' => $_POST['companyid']));
        echo $uploads_file = json_encode($data, true);
    }
}
