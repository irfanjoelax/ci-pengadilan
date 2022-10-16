<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $table = "user";

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $where = array(
            'name_user' => $this->input->post('name_user', TRUE),
            'pass_user' => sha1($this->input->post('pass_user', TRUE)),
        );

        $user = $this->db->get_where($this->table, $where)->row();

        if ($user) {
            $userSession = [
                'id_user'       => $user->id_user,
                'fullname_user' => $user->fullname_user,
                'name_user'     => $user->name_user,
                'level_user'    => $user->level_user,
                'login'         => true,
            ];

            $this->session->set_userdata($userSession);

            redirect(site_url('/dashboard'));
        } else {
            alert('User tidak ditemukan atau input yang dimasukkan salah', site_url('/'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }
}
