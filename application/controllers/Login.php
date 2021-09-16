<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends Admin_Controller

{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_auth');
    }

    public function index()

    {
        //$this->logged_in();

        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $email_exists = $this->model_auth->check_email($this->input->post('email'));

            if ($email_exists == TRUE) {

                $login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

                if ($login) {
                    $logged_in_sess = array(
                        'id' => $login['id'],
                        'username'  => $login['username'],
                        'email'     => $login['email'],
                        'puskesmas_id'     => $login['puskesmas_id'],
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($logged_in_sess);

                    redirect('dashboard', 'refresh');
                } else {
                    $this->data['errors'] = 'Incorrect username/password combination';

                    $this->load->view('login', $this->data);
                }
            } else {
                $this->data['errors'] = 'Email does not exists';

                $this->load->view('login', $this->data);
            }
        } else {
            // false case

            $this->load->view('login');
        }
    }



    //logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}
