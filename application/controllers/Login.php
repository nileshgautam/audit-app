<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('login/loginPage');
    }

    // validate user login by role
    function auth()
    {
        // print_r($_POST);die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'e-mail', 'Required');
        $this->form_validation->set_rules('password', 'Password', 'Required');

        if ($this->form_validation->run() === false) {
            redirect(__CLASS__ . '/index');
        } else {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');
            if (isset($email) && isset($password)) {
                $validate = $this->MainModel->selectAllFromWhere('tbl_user', array('user_id' => $email, 'user_password' => $password));
                if (!empty($validate)) {
                    $data  = $validate;
                    $id    = $data[0]['id'];
                    $name  = $data[0]['user_first_name'];
                    $email = $data[0]['user_id'];
                    $company_id = $data[0]['user_client_id'];
                    $user_role = $data[0]['user_role'];
                    $sesdata = array(
                        'id'       =>  $id,
                        'company' => $company_id,
                        'username'  => $name,
                        'email'     => $email,
                        'user_role' => $user_role,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata("userInfo", $sesdata);
                    //print_r($level);
                    // access login for admin
                    if ($user_role == "10") {
                        redirect('Auditapp/admin');
                    } elseif ($user_role == "20") {
                        redirect('Auditapp/auditor');
                    } elseif ($user_role == "30") {
                        redirect('Auditapp/manager');
                    } elseif ($user_role == "40") {
                        redirect('Auditapp/team_leader');
                    } elseif ($user_role == "50") {
                        redirect('Auditapp/team_member');
                    }
                } else {
                    echo $this->session->set_flashdata('msg', "Username and password is not match");
                    redirect('Login/index');
                }
            } else {
                redirect('Login/index');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('Login/index');
    }
}
