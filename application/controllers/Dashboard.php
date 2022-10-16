<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false) {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $level_user = $this->session->userdata('level_user');
        $level_kejaksaan = [
            'kejaksaan_minahasa', 'kejaksaan_minahasa_selatan', 'kejaksaan_tomohon'
        ];

        if ($level_user == 'admin') {
            $view = 'admin/dashboard';
        }

        if ($level_user == 'panitera_pengganti') {
            $view = 'panitera-pengganti/dashboard';
        }

        if (in_array($level_user, $level_kejaksaan)) {
            $view = 'dashboard_kejaksaan';
        }

        $this->load->view($view, [
            'active'    => 'dashboard',
            'header'    => 'Dashboard',
            'subheader' => 'Control panel dan widget utama sistem',
        ]);
    }
}
