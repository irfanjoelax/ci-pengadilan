<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penahanan_kpn extends CI_Controller
{
    private $table = 'penahanan_kpn';
    private $storage = './asset/penahanan-kpn';

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

        if (in_array($level_user, $level_kejaksaan)) {
            $this->db->where('tujuan_kejaksaan', $level_user);
        }

        $level_lapas = [
            'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
        ];

        if (in_array($level_user, $level_lapas)) {
            $this->db->where('tujuan_lapas', $level_user);
        }

        if ($level_user != 'admin') {
            $this->db->where('status !=', 'DITOLAK');
        }

        $data = $this->db->order_by('id', 'DESC')->get($this->table)->result();

        $this->load->view('penahanan_kpn/index', [
            'active'    => 'penahanan_kpn',
            'header'    => 'Penahanan KPN',
            'subheader' => 'Daftar Penahanan KPN dikelola oleh bagian pidana (admin)',
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
        $this->load->view('penahanan_kpn/form', [
            'active'     => 'penahanan_kpn',
            'header'     => 'Form Penahanan KPN',
            'subheader'  => 'Harap Masukkan data Penahanan KPN dengan lengkap dan benar',
            'isEdit'     => false,
            'url'        => site_url('penahanan_kpn/store'),
            'summernote' => true
        ]);
    }

    public function store()
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
            'file'             => $this->_upload(),
            'status'           => 'PROSES',
            'tujuan_kejaksaan' => null,
            'tujuan_lapas'     => null,
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data Penahanan KPN berhasil ditambahkan'), site_url('penahanan_kpn'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_kpn/form', [
            'active'    => 'penahanan_kpn',
            'header'    => 'Form Penahanan KPN',
            'subheader' => 'Harap Masukkan data Penahanan KPN dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('penahanan_kpn/update/' . $id),
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
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Penahanan KPN berhasil diperbarui'), site_url('penahanan_kpn'));
    }

    public function delete($id)
    {
        $penahananKPN = $this->db->get_where($this->table, ['id' => $id])->row();
        unlink($this->storage . "/" . $penahananKPN->file);
        $this->db->delete($this->table, array('id' => $id));
        alert(ucwords('data Penahanan KPN berhasil dihapus'), site_url('penahanan_kpn'));
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

        $this->load->view('penahanan_kpn/show', [
            'active'    => 'penahanan_kpn',
            'header'    => 'Penahanan KPN',
            'subheader' => 'Detail lengkap penahanan KPN',
            'data'      => $data,
        ]);
    }

    public function validasi($id)
    {
        $data = [
            'status' => 'TERVALIDASI',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Penahanan KPN berhasil divalidasi'), site_url('penahanan_kpn'));
    }

    public function update_tujuan($id)
    {
        $data = [
            'file'             => $this->_upload(),
            'status'           => 'SELESAI',
            'tujuan_kejaksaan' => $this->input->post('tujuan_kejaksaan', TRUE),
            'tujuan_lapas'     => $this->input->post('tujuan_lapas', TRUE),
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Penahanan KPN berhasil dikirim'), site_url('penahanan_kpn'));
    }

    public function berkas_tolak($id)
    {
        $data = [
            'status' => 'DITOLAK',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data Penahanan KPN telah ditolak'), site_url('penahanan_kpn'));
    }

    /**
     * CETAK => KEJAKSAAN & LAPAS LEVEL USER
     */
    public function print($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_kpn/pdf', [
            'data' => $data
        ]);
    }
}
