<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penetapan_hs extends CI_Controller
{
    private $table = 'penetapan_hs';
    private $storage = './asset/penetapan-hs';

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
            $this->db->where('tujuan_hs', $level_user);
        }

        $level_lapas = [
            'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
        ];

        if (in_array($level_user, $level_lapas)) {
            $this->db->where('tujuan_hs', $level_user);
        }

        if ($level_user != 'admin') {
            $this->db->where('status_hs !=', 'DITOLAK');
        }

        $data = $this->db->order_by('id_hs', 'DESC')->get($this->table)->result();

        $this->load->view('penetapan_hs/index', [
            'active'    => 'penetapan_hs',
            'header'    => 'Penetapan Hari Sidang',
            'subheader' => 'Daftar penetapan hari sidang dikelola oleh bagian pidana (admin)',
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
        $this->load->view('penetapan_hs/form', [
            'active'     => 'penetapan_hs',
            'header'     => 'Form Penetapan Hari Sidang',
            'subheader'  => 'Harap Masukkan data penetapan hari sidang dengan lengkap dan benar',
            'isEdit'     => false,
            'url'        => site_url('penetapan_hs/store'),
            'summernote' => true,
            'nomor'      => $this->nomor()
        ]);
    }

    public function nomor()
    {
        $urutan = $this->db->get($this->table)->num_rows();

        $urutan++;

        $no_perkara = sprintf("%03s", $urutan);
        $no_perkara .= '/PHS';
        $no_perkara .= '/' . date('m');
        $no_perkara .= '/' . date('Y');

        return $no_perkara;
    }

    public function store()
    {
        $waktu_tunggu = date('Y-m-d');

        $data = [
            'no_perkara'     => $this->input->post('no_perkara', TRUE),
            'nama_terdakwa'  => $this->input->post('nama_terdakwa', TRUE),
            'membaca'        => $this->input->post('membaca', TRUE),
            'tgl_menetapkan' => $this->input->post('tgl_menetapkan', TRUE),
            'wkt_menetapkan' => $this->input->post('wkt_menetapkan', TRUE),
            'tgl_ditetapkan' => $this->input->post('tgl_ditetapkan', TRUE),
            'nama_hakim'     => $this->input->post('nama_hakim', TRUE),
            'file_hs'        => $this->_upload(),
            'status_hs'      => 'PROSES',
            'tujuan_hs'      => null,
            'waktu_tunggu'   => date('Y-m-d', strtotime("$waktu_tunggu +7 day"))
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data penetapan hari sidang berhasil ditambahkan'), site_url('penetapan_hs'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id_hs' => $id,])->row();

        $this->load->view('penetapan_hs/form', [
            'active'    => 'penetapan_hs',
            'header'    => 'Form Penetapan HS',
            'subheader' => 'Harap Masukkan data penetapan hari sidang dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('penetapan_hs/update/' . $id),
            'data'      => $data,
            'summernote'  => true
        ]);
    }

    public function update($id)
    {
        $penetapanHS = $this->db->get_where($this->table, ['id_hs' => $id])->row();
        $file        = $penetapanHS->file_hs;

        if (!empty($_FILES["file_hs"]["name"])) {
            unlink($this->storage . "/" . $file);
            $file = $this->_upload();
        }

        $data = [
            'no_perkara'     => $this->input->post('no_perkara', TRUE),
            'nama_terdakwa'  => $this->input->post('nama_terdakwa', TRUE),
            'membaca'        => $this->input->post('membaca', TRUE),
            'tgl_menetapkan' => $this->input->post('tgl_menetapkan', TRUE),
            'wkt_menetapkan' => $this->input->post('wkt_menetapkan', TRUE),
            'tgl_ditetapkan' => $this->input->post('tgl_ditetapkan', TRUE),
            'nama_hakim'     => $this->input->post('nama_hakim', TRUE),
            'file_hs'        => $file,
        ];

        $this->db->where('id_hs', $id)->update($this->table, $data);

        alert(ucwords('data penetapan hari sidang berhasil diperbarui'), site_url('penetapan_hs'));
    }

    public function delete($id)
    {
        $penetapanHS = $this->db->get_where($this->table, ['id_hs' => $id])->row();
        unlink($this->storage . "/" . $penetapanHS->file_hs);
        $this->db->delete($this->table, array('id_hs' => $id));
        alert(ucwords('data penetapan hari sidang berhasil dihapus'), site_url('penetapan_hs'));
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

        if ($this->upload->do_upload('file_hs')) {
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
        $data = $this->db->get_where($this->table, ['id_hs' => $id,])->row();

        $this->load->view('penetapan_hs/show', [
            'active'    => 'penetapan_hs',
            'header'    => 'Penatapan HS',
            'subheader' => 'Detail lengkap penetapan hasil sidang',
            'data'      => $data,
        ]);
    }

    public function update_tujuan($id)
    {
        $data = [
            'file_hs'   => $this->_upload(),
            'status_hs' => 'SELESAI',
            'tujuan_hs' => $this->input->post('tujuan_hs', TRUE),
        ];

        $this->db->where('id_hs', $id)->update($this->table, $data);

        alert(ucwords('data penetapan hari sidang berhasil divalidasi'), site_url('penetapan_hs'));
    }

    public function validasi_pp($id)
    {
        $data = [
            'status_hs' => 'Validasi PP',
        ];

        $this->db->where('id_hs', $id)->update($this->table, $data);

        alert(ucwords('data penetapan hari sidang telah divalidasi PP'), site_url('penetapan_hs'));
    }

    public function berkas_tolak($id)
    {
        $data = [
            'status_hs' => 'DITOLAK',
        ];

        $this->db->where('id_hs', $id)->update($this->table, $data);

        alert(ucwords('data penetapan hari sidang telah ditolak'), site_url('penetapan_hs'));
    }

    /**
     * CETAK => KEJAKSAAN LEVEL USER
     */
    public function print($id)
    {
        // $update = [
        //     'status_hs' => 'SELESAI',
        // ];

        // $this->db->where('id_hs', $id)->update($this->table, $update);

        $data = $this->db->get_where($this->table, ['id_hs' => $id,])->row();

        $this->load->view('penetapan_hs/pdf', [
            'data' => $data
        ]);
    }
}
