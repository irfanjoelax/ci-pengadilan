<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ijin_sita extends CI_Controller
{
    private $table = 'ijin_sita';
    private $storage = './asset/ijin-sita';

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

        $level_kepolisian = [
            'kepolisian_minahasa', 'kepolisian_minahasa_tenggara', 'kepolisian_tomohon'
        ];

        if (in_array($level_user, $level_kepolisian)) {
            $this->db->where('tujuan_kepolisian', $level_user);
        }

        if ($level_user != 'admin') {
            $this->db->where('status !=', 'DITOLAK');
        }

        $data = $this->db->order_by('id', 'DESC')->get($this->table)->result();

        $this->load->view('ijin_sita/index', [
            'active'    => 'ijin_sita',
            'header'    => 'Ijin Sita',
            'subheader' => 'Daftar Ijin Sita dikelola oleh bagian pidana (admin)',
            'no'        => 1,
            'data'      => $data,
            'datatable' => true
        ]);
    }

    /**
     * Create, Edit, Update, Delete, _Upload => ADMIN USER LEVEL
     * 
     * 
     */
    public function create()
    {
        $this->load->view('ijin_sita/form', [
            'active'     => 'ijin_sita',
            'header'     => 'Form Ijin Sita',
            'subheader'  => 'Harap Masukkan data Ijin Sita dengan lengkap dan benar',
            'isEdit'     => false,
            'url'        => site_url('ijin_sita/store'),
            'summernote' => true
        ]);
    }

    public function store()
    {
        $data = [
            'no_perkara'        => $this->input->post('no_perkara', TRUE),
            'nama'              => $this->input->post('nama', TRUE),
            'tempat_lahir'      => $this->input->post('tempat_lahir', TRUE),
            'umur'              => $this->input->post('umur', TRUE),
            'tgl_lahir'         => $this->input->post('tgl_lahir', TRUE),
            'kelamin'           => $this->input->post('kelamin', TRUE),
            'kebangsaan'        => $this->input->post('kebangsaan', TRUE),
            'tempat_tinggal'    => $this->input->post('tempat_tinggal', TRUE),
            'agama'             => $this->input->post('agama', TRUE),
            'pekerjaan'         => $this->input->post('pekerjaan', TRUE),
            'membaca'           => $this->input->post('membaca', TRUE),
            'menimbang'         => $this->input->post('menimbang', TRUE),
            'menetapkan'        => $this->input->post('menetapkan', TRUE),
            'tgl_ditetapkan'    => $this->input->post('tgl_ditetapkan', TRUE),
            'nama_ketua'        => $this->input->post('nama_ketua', TRUE),
            'nip'               => $this->input->post('nip', TRUE),
            'file'              => null,
            'status'            => 'PROSES',
            'tujuan_kepolisian' => null,
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data Ijin Sita berhasil ditambahkan'), site_url('ijin_sita'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('ijin_sita/form', [
            'active'    => 'ijin_sita',
            'header'    => 'Form Ijin Sita',
            'subheader' => 'Harap Masukkan data Ijin Sita dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('ijin_sita/update/' . $id),
            'data'      => $data,
            'summernote'  => true
        ]);
    }

    public function update($id)
    {
        $data = [
            'no_perkara'       => $this->input->post('no_perkara', TRUE),
            'nama'             => $this->input->post('nama', TRUE),
            'tempat_lahir'     => $this->input->post('tempat_lahir', TRUE),
            'umur'             => $this->input->post('umur', TRUE),
            'tgl_lahir'        => $this->input->post('tgl_lahir', TRUE),
            'kelamin'          => $this->input->post('kelamin', TRUE),
            'kebangsaan'       => $this->input->post('kebangsaan', TRUE),
            'tempat_tinggal'   => $this->input->post('tempat_tinggal', TRUE),
            'agama'            => $this->input->post('agama', TRUE),
            'pekerjaan'        => $this->input->post('pekerjaan', TRUE),
            'membaca'          => $this->input->post('membaca', TRUE),
            'menimbang'        => $this->input->post('menimbang', TRUE),
            'menetapkan'       => $this->input->post('menetapkan', TRUE),
            'tgl_ditetapkan'   => $this->input->post('tgl_ditetapkan', TRUE),
            'nama_ketua'       => $this->input->post('nama_ketua', TRUE),
            'nip'              => $this->input->post('nip', TRUE),
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Ijin Sita berhasil diperbarui'), site_url('ijin_sita'));
    }

    public function delete($id)
    {
        $penahananKPN = $this->db->get_where($this->table, ['id' => $id])->row();
        unlink($this->storage . "/" . $penahananKPN->file);
        $this->db->delete($this->table, array('id' => $id));
        alert(ucwords('data Ijin Sita berhasil dihapus'), site_url('ijin_sita'));
    }

    private function _upload()
    {
        $config['upload_path']   = $this->storage;
        $config['allowed_types'] = 'pdf|docx|doc';

        // Create folder (Uploads) if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path']);
        }

        $this->load->library('upload', $config);

        // Initialize the Upload library with curront $config
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors();
        }
    }

    /**
     * Show, Update_Tujuan => PANITERA PENGGANTI LEVEL USER
     */
    public function show($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('ijin_sita/show', [
            'active'    => 'ijin_sita',
            'header'    => 'Ijin Sita',
            'subheader' => 'Detail lengkap Ijin Sita',
            'data'      => $data,
        ]);
    }

    public function update_tujuan($id)
    {
        $data = [
            'file'             => $this->_upload(),
            'status'           => 'SELESAI',
            'tujuan_kepolisian' => $this->input->post('tujuan_kepolisian', TRUE),
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Ijin Sita berhasil dikirim'), site_url('ijin_sita'));
    }

    public function berkas_tolak($id)
    {
        $data = [
            'status' => 'DITOLAK',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Ijin Sita telah ditolak'), site_url('ijin_sita'));
    }

    /**
     * CETAK => kepolisian & LAPAS LEVEL USER
     */
    public function print($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('ijin_sita/pdf', [
            'data' => $data
        ]);
    }
}
