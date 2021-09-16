<?php

class Model_info extends CI_Model

{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_users');
    }

    public function getInfoData($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM informasi WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $user_id = $this->session->userdata('id');
        $puskesmas_id = $this->session->userdata('puskesmas_id');
        if ($user_id == 1) {
            $sql = "SELECT * FROM informasi ORDER BY id DESC";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT * FROM informasi WHERE puskesmas_id = ? ORDER BY id DESC";
            $query = $this->db->query($sql, array($puskesmas_id));
            return $query->result_array();
        }
    }

    function getInfoAktiv()
    {
        $this->db->select('*');
        $this->db->from('informasi');
        $this->db->where('status', 2);
        $this->db->order_by('date_time', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function create($data = '')
    {
        $create = $this->db->insert('informasi', $data);
        return ($create == true) ? true : false;
    }



    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('informasi', $data);
        return ($update == true) ? true : false;
    }



    public function remove($id)

    {

        if ($id) {

            $this->db->where('id', $id);

            $delete = $this->db->delete('info');

            return ($delete == true) ? true : false;
        }
    }



    function get_info($limit, $start)

    {



        $this->db->select('info.*, 

					users.nama, lsp.nama as nama_lsp

					');

        $this->db->from('info');

        // Join dg 1 tabel

        $this->db->join('users', 'users.id = info.user_id', 'LEFT');

        $this->db->join('lsp', 'lsp.id = info.lsp_id', 'LEFT');

        // End join

        $this->db->where('info.status', 2);

        $this->db->order_by('info.tgl_post', 'DESC');

        $this->db->limit($limit, $start);

        $query = $this->db->get();

        return $query->result();
    }



    function listinfo()

    {

        $this->load->library('pagination');



        $query = "SELECT info.*, users.nama, lsp.nama as nama_lsp FROM info JOIN users ON users.id = info.user_id JOIN lsp ON lsp.id = info.lsp_id WHERE info.status = 2 ORDER BY info.tgl_post DESC";

        $config['base_url'] = base_url('info/index');

        $config['total_rows'] = $this->db->query($query)->num_rows();

        $config['per_page'] = 4;

        $config['uri_segment'] = 3;

        $config['num_links'] = 3;



        $config['full_tag_open']   = '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';

        $config['full_tag_close']  = '</ul></nav>';



        $config['first_link']      = '<li class="page-item"><a href="#" class="page-link" aria-label="Previous"><span aria-hidden="true"><span class="lnr lnr-chevron-left"></span></span></a></li>';

        $config['first_tag_open']  = '<li class="page-item">';

        $config['first_tag_close'] = '</li>';



        $config['last_link']       = '<a href="#" class="page-link" aria-label="Next"><span aria-hidden="true"><span class="lnr lnr-chevron-right"></span></span></a>';

        $config['last_tag_open']   = '<li class="page-item">';

        $config['last_tag_close']  = '</li>';



        $config['next_link']       = '<span class="lnr lnr-chevron-right">';

        $config['next_tag_open']   = '<li class="page-item">';

        $config['next_tag_close']  = '</li>';



        $config['prev_link']       = '<span class="lnr lnr-chevron-left">';

        $config['prev_tag_open']   = '<li class="page-item">';

        $config['prev_tag_close']  = '</li>';



        $config['cur_tag_open']    = '<li class="page-item active"><a href="#" class="page-link">';

        $config['cur_tag_close']   = '</a></li>';



        $config['num_tag_open']    = '<li class="page-item"><a href="#" class="page-link">';

        $config['num_tag_close']   = '</a></li>';

        // End style pagination



        $this->pagination->initialize($config); // Set konfigurasi paginationnya



        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;

        $query .= " LIMIT " . $page . ", " . $config['per_page'];



        $data['limit'] = $config['per_page'];

        $data['total_rows'] = $config['total_rows'];

        $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas

        $data['info'] = $this->db->query($query)->result();



        return $data;
    }



    // Read data

    public function read($slug_info)

    {

        $this->db->select('info.*, 

                    users.nama, lsp.nama as nama_lsp

					');

        $this->db->from('info');

        // Join dg 2 tabel

        $this->db->join('users', 'users.id = info.user_id', 'LEFT');

        $this->db->join('lsp', 'lsp.id = info.lsp_id', 'LEFT');

        $this->db->where('slug_info', $slug_info);

        $query = $this->db->get();

        return $query->row();
    }







    public function getListKategori()

    {

        $sql = "SELECT COUNT(info.kategori_id) as total, kategori_info.nama_kategori FROM info JOIN kategori_info ON kategori_info.id = info.kategori_id WHERE info.status = 2 GROUP BY info.kategori_id DESC";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}
