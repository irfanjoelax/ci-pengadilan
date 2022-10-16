<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $users = $this->db->order_by('id_user', 'DESC')->get($this->table)->result();

        $this->load->view('admin/user/index', [
            'active'    => 'user',
            'header'    => 'User',
            'subheader' => 'Daftar user dari aplikasi beserta levelnya',
            'no'        => 1,
            'users'     => $users,
            'datatable' => true
        ]);
    }

    public function create()
    {
        $this->load->view('admin/user/form', [
            'active'    => 'user',
            'header'    => 'Form User',
            'subheader' => 'Masukkan data user dengan lengkap dan benar',
            'isEdit'    => false,
            'url'       => site_url('user/store')
        ]);
    }

    public function store()
    {
        $data = [
            'fullname_user' => $this->input->post('fullname_user', TRUE),
            'name_user'     => $this->input->post('name_user', TRUE),
            'pass_user'     => sha1('123456'),
            'level_user'    => $this->input->post('level_user', TRUE),
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data user berhasil ditambahkan'), site_url('user'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id_user' => $id,])->row();

        $this->load->view('admin/user/form', [
            'active'    => 'user',
            'header'    => 'Form User',
            'subheader' => 'Masukkan data user dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('user/update/' . $id),
            'data'      => $data
        ]);
    }

    public function update($id)
    {
        $user           = $this->db->get_where($this->table, ['id_user' => $id,])->row();
        $password       = $user->pass_user;
        $input_password = $this->input->post('pass_user', TRUE);

        if ($input_password != null) {
            $password = sha1($input_password);
        }

        $data = [
            'fullname_user' => $this->input->post('fullname_user', TRUE),
            'name_user'     => $this->input->post('name_user', TRUE),
            'pass_user'     => $password,
            'level_user'    => $this->input->post('level_user', TRUE),
        ];

        $this->db->where('id_user', $id)->update($this->table, $data);

        alert(ucwords('data user berhasil diperbarui'), site_url('user'));
    }

    public function delete($id)
    {
        $this->db->delete($this->table, array('id_user' => $id));
        alert(ucwords('data user berhasil dihapus'), site_url('user'));
    }
}
