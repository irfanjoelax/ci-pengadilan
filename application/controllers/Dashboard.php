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
        $chart      = false;
        $level_user = $this->session->userdata('level_user');

        $level_kejaksaan = [
            'kejaksaan_minahasa', 'kejaksaan_minahasa_selatan', 'kejaksaan_tomohon'
        ];

        $level_lapas = [
            'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
        ];

        $level_kepolisian = [
            'kepolisian_minahasa', 'kepolisian_minahasa_tenggara', 'kepolisian_tomohon'
        ];

        if ($level_user == 'admin') {
            $view  = 'dashboard_admin';
            $chart = $this->_chart();
        }

        if ($level_user == 'ketua_pn') {
            $view = 'dashboard_ketuapn';
        }

        if ($level_user == 'majelis_hakim') {
            $view = 'dashboard_majelis_hakim';
        }

        if ($level_user == 'panitera_pengganti') {
            $view = 'dashboard_panitera_pengganti';
        }

        if (in_array($level_user, $level_kejaksaan)) {
            $view = 'dashboard_kejaksaan';
        }

        if (in_array($level_user, $level_lapas)) {
            $view = 'dashboard_lapas';
        }

        if (in_array($level_user, $level_kepolisian)) {
            $view = 'dashboard_kepolisian';
        }

        $this->load->view($view, [
            'active'    => 'dashboard',
            'header'    => 'Dashboard',
            'subheader' => 'Control panel dan widget utama sistem',
            'chart'     => $chart
        ]);
    }

    private function _chart()
    {
        $total_penetapan_hs    = $this->db->get('penetapan_hs')->num_rows();
        $total_penahanan_hakim = $this->db->get('penahanan_hakim')->num_rows();
        $total_penahanan_kpn   = $this->db->get('penahanan_kpn')->num_rows();
        $total_ijin_sita       = $this->db->get('ijin_sita')->num_rows();
        $total_ijin_penahanan  = $this->db->get('ijin_penahanan')->num_rows();
        $total_ijin_geledah    = $this->db->get('ijin_geledah')->num_rows();
        $total_petikan_putusan = $this->db->get('petikan_putusan')->num_rows();

        return $total_penetapan_hs . ',' . $total_penahanan_hakim . ',' . $total_penahanan_kpn . ',' . $total_ijin_sita . ',' . $total_ijin_penahanan . ',' . $total_ijin_geledah . ',' . $total_petikan_putusan;
    }
}
