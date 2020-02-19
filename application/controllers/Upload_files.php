<?php defined('BASEPATH') or exit('No direct script access allowed');

class Upload_Files extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        // Load session library
        $this->load->library('session');

        // Load file model
        $this->load->model('Files');
    }

    function upload_file()
    {
        $data = array();
        // echo '<pre>';
        // print_r($_POST); die;      // echo '<pre>';
        // print_r($_POST); die;

        if (!empty($_FILES['files']['name'])) {
            $filesCount = count($_FILES['files']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // File upload configuration
                $uploadPath = './upload/files';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'csv|jpg|xlsx|png';

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                if ($this->upload->do_upload('file')) {

                    // Uploaded file data
                    $fileData = $this->upload->data();
                    // echo $fileData;
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                    $uploadData[$i]['client_id'] = $_POST['company-id'];
                    $uploadData[$i]['user_id_uploaded_by'] = $_POST['user-id'];
                    $uploadData[$i]['process_id'] = $_POST['process-id'];
                    $uploadData[$i]['sub_process_id'] = $_POST['sub-process-id'];
                    $uploadData[$i]['work_steps_id'] =  ($_POST['mandatory'] == 0) ? $_POST['work-steps-id'] : null;
                    $uploadData[$i]['remark'] = $_POST['remark'];
                    $uploadData[$i]['mandatory'] = $_POST['mandatory'];
                    $uploadData[$i]['mandatory_file_id'] = ($_POST['mandatory'] == 1) ? $_POST['mandatory-id'] : null;
                } else {
                    print_r($_FILES['file']['name']);
                    echo  $this->upload->display_errors();
                }
            }

            if (!empty($uploadData)) {
                // Insert files data into the database
                // print_r($uploadData);
                $insert = $this->Files->insert($uploadData);

                // Upload status message
                $statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg', $statusMsg);
            }
        }

        // Get files data from the database
        $data['files'] = $this->Files->getRows();

        $json_data = json_encode($data, true);
        echo $json_data;
    }    // $this->load->view('Auditapp/upload_file', $data);


    function get_Uploaded_file()
    {
        // Get files data from the database
        $filedata = $this->MainModel->selectAll('files');
        echo $filedata = json_encode($filedata, true);
    }
}
