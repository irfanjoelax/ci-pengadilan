<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penahanan_hakim extends CI_Controller
{
    private $table   = 'penahanan_hakim';
    private $storage = './asset/penahanan-hakim';

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
            'lapas_minahasa', 'rutan_minahasa_selatan', 'lapas_tomohon'
        ];

        if (in_array($level_user, $level_kejaksaan)) {
            $this->db->where('tujuan', $level_user);
        }

        $data = $this->db->order_by('id', 'DESC')->get($this->table)->result();

        $this->load->view('penahanan_hakim/index', [
            'active'    => 'penahanan_hakim',
            'header'    => 'Penahanan Hakim',
            'subheader' => 'Daftar data penahanan hakim yang dikelola',
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
        $this->load->view('penahanan_hakim/form', [
            'active'     => 'penahanan_hakim',
            'header'     => 'Form Penahanan Hakim',
            'subheader'  => 'Harap Masukkan data penahanan hakim dengan lengkap dan benar',
            'isEdit'     => false,
            'url'        => site_url('penahanan_hakim/store'),
            'summernote' => true
        ]);
    }

    public function store()
    {
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
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data penahanan hakim berhasil ditambahkan'), site_url('penahanan_hakim'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_hakim/form', [
            'active'    => 'penahanan_hakim',
            'header'    => 'Form Penetapan HS',
            'subheader' => 'Harap Masukkan data penahanan hakim dengan lengkap dan benar',
            'isEdit'    => true,
            'url'       => site_url('penahanan_hakim/update/' . $id),
            'data'      => $data,
            'summernote'  => true
        ]);
    }

    public function update($id)
    {
        $penetapanHS = $this->db->get_where($this->table, ['id' => $id])->row();
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

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data penahanan hakim berhasil diperbarui'), site_url('penahanan_hakim'));
    }

    public function delete($id)
    {
        $penetapanHS = $this->db->get_where($this->table, ['id' => $id])->row();
        unlink($this->storage . "/" . $penetapanHS->file_hs);
        $this->db->delete($this->table, array('id' => $id));
        alert(ucwords('data penahanan hakim berhasil dihapus'), site_url('penahanan_hakim'));
    }

    private function _upload()
    {
        $config['upload_path']   = $this->storage;
        $config['allowed_types'] = 'pdf|docx';

        $this->load->library('upload', $config);

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
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_hakim/show', [
            'active'    => 'penahanan_hakim',
            'header'    => 'Penatapan HS',
            'subheader' => 'Detail lengkap penetapan hasil sidang',
            'data'      => $data,
        ]);
    }

    public function update_tujuan($id)
    {
        $data = [
            'status_hs' => 'TERVALIDASI',
            'tujuan_hs' => $this->input->post('tujuan_hs', TRUE),
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data penahanan hakim berhasil divalidasi'), site_url('penahanan_hakim'));
    }

    /**
     * CETAK => KEJAKSAAN LEVEL USER
     */
    public function print($id)
    {
        $update = [
            'status_hs' => 'SELESAI',
        ];
        $this->db->where('id', $id)->update($this->table, $update);

        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_hakim/pdf', [
            'data' => $data
        ]);
    }
}
