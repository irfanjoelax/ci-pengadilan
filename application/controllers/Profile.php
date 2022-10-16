<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    private $table = "user";

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false) {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $this->load->view('profile', [
            'active'    => 'profile',
            'header'    => 'Profile',
            'subheader' => 'Pengaturan Nama, Username dan Password Anda',
        ]);
    }

    public function update($id_user)
    {
        $user     = $this->db->get_where($this->table, ['id_user' => $id_user])->row();
        $password = $user->pass_user;

        if (!empty($this->input->post('pass_user', TRUE))) {
            $password = sha1($this->input->post('pass_user', TRUE));
        }

        $data = [
            'fullname_user' => $this->input->post('fullname_user', TRUE),
            'name_user'     => $this->input->post('name_user', TRUE),
            'pass_user'     => $password,
        ];

        $updateData = $this->db->where('id_user', $id_user)->update($this->table, $data);

        if ($updateData) {
            $user = $this->db->get_where($this->table, ['id_user' => $id_user])->row();

            $userSession = [
                'id_user'       => $user->id_user,
                'fullname_user' => $user->fullname_user,
                'name_user'     => $user->name_user,
                'level_user'    => $user->level_user,
                'login'         => true,
            ];

            $this->session->set_userdata($userSession);

            alert('Profile Anda telah BERHASIL diperbarui!', site_url('/dashboard'));
        }
    }
}
