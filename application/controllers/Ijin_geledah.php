<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ijin_geledah extends CI_Controller
{
    private $table = 'ijin_geledah';
    private $storage = './asset/ijin-geledah';

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

        $data = $this->db->order_by('id', 'DESC')->get($this->table)->result();

        $this->load->view('ijin_geledah/index', [
            'active'    => 'ijin_geledah',
            'header'    => 'Ijin geledah',
            'subheader' => 'Daftar Ijin geledah dikelola oleh bagian pidana (admin)',
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
        $this->load->view('ijin_geledah/form', [
            'active'     => 'ijin_geledah',
            'header'     => 'Form Ijin geledah',
            'subheader'  => 'Harap Masukkan data Ijin geledah dengan lengkap dan benar',
            'isEdit'     => false,
            'url'        => site_url('ijin_geledah/store'),
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

        alert(ucwords('data Ijin geledah berhasil ditambahkan'), site_url('ijin_geledah'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('ijin_geledah/form', [
            'active'    => 'ijin_geledah',
            'header'    => 'Form Ijin geledah',
            'subheader' => 'Harap Masukkan data Ijin geledah dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('ijin_geledah/update/' . $id),
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

        alert(ucwords('data Ijin geledah berhasil diperbarui'), site_url('ijin_geledah'));
    }

    public function delete($id)
    {
        $geledahKPN = $this->db->get_where($this->table, ['id' => $id])->row();
        unlink($this->storage . "/" . $geledahKPN->file);
        $this->db->delete($this->table, array('id' => $id));
        alert(ucwords('data Ijin geledah berhasil dihapus'), site_url('ijin_geledah'));
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

        $this->load->view('ijin_geledah/show', [
            'active'    => 'ijin_geledah',
            'header'    => 'Ijin geledah',
            'subheader' => 'Detail lengkap Ijin geledah',
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

        alert(ucwords('data Ijin geledah berhasil dikirim'), site_url('ijin_geledah'));
    }

    public function berkas_tolak($id)
    {
        $data = [
            'status' => 'DITOLAK',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Ijin geledah telah ditolak'), site_url('ijin_geledah'));
    }

    /**
     * CETAK => kepolisian & LAPAS LEVEL USER
     */
    public function print($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('ijin_geledah/pdf', [
            'data' => $data
        ]);
    }
}
