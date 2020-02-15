<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $config = [];

        $config['base_url'] = base_url().'/comments/index';
        $config['total_rows'] = $this->comments_model->get_count();
        $config['per_page'] = 5;
        $config['url_segment'] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['links'] = $this->pagination->create_links();

        $data['comments'] = $this->comments_model->get_comments($config['per_page'], $page);
        $this->load->view('comments', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() === false) {
            return redirect()->to('/comments');
        } else {
            $this->comments_model->set_comment();
            return redirect()->to('/comments');
        }
    }
}
