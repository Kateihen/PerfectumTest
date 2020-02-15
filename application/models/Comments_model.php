<?php

class Comments_model extends CI_Model {

    protected $table = 'comments';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_count()
    {
        return $this->db->count_all($this->table);
    }

    public function get_comments($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($this->table);

        return $query->result_array();
    }

    public function set_comment()
    {
        $user_name = $this->input->post('user_name');

        if (empty($user_name)) {
            $user_name = stristr($this->input->post('email'), '@', TRUE);
        }
        $data = [
            'user_name' => $user_name,
            'email' => $this->input->post('email'),
            'body' => $this->input->post('body'),
        ];

        return $this->db->insert('comments', $data);
    }
}