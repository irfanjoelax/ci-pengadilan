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
            'nama'           => $this->input->post('nama', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'umur'           => $this->input->post('umur', TRUE),
            'tgl_lahir'      => $this->input->post('tgl_lahir', TRUE),
            'kelamin'        => $this->input->post('kelamin', TRUE),
            'kebangsaan'     => $this->input->post('kebangsaan', TRUE),
            'tempat_tinggal' => $this->input->post('tempat_tinggal', TRUE),
            'agama'          => $this->input->post('agama', TRUE),
            'pekerjaan'      => $this->input->post('pekerjaan', TRUE),
            'membaca'        => $this->input->post('membaca', TRUE),
            'menimbang'      => $this->input->post('menimbang', TRUE),
            'menetapkan'     => $this->input->post('menetapkan', TRUE),
            'tgl_ditetapkan' => $this->input->post('tgl_ditetapkan', TRUE),
            'hakim_ketua'    => $this->input->post('hakim_ketua', TRUE),
            'hakim_satu'     => $this->input->post('hakim_satu', TRUE),
            'hakim_dua'      => $this->input->post('hakim_dua', TRUE),
            'file'           => $this->_upload(),
            'status'         => 'PROSES',
            'tujuan_lapas'   => null,
        ];

        $this->db->insert($this->table, $data);

        alert(ucwords('data penahanan hakim berhasil ditambahkan'), site_url('penahanan_hakim'));
    }

    public function edit($id)
    {
        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_hakim/form', [
            'active'     => 'penahanan_hakim',
            'header'     => 'Form Penetapan HS',
            'subheader'  => 'Harap Masukkan data penahanan hakim dengan lengkap dan benar',
            'isEdit'     => true,
            'url'        => site_url('penahanan_hakim/update/' . $id),
            'data'       => $data,
            'summernote' => true
        ]);
    }

    public function update($id)
    {
        $penahananHakim = $this->db->get_where($this->table, ['id' => $id])->row();
        $file  = $penahananHakim->file;

        if (!empty($_FILES["file"]["name"])) {
            unlink($this->storage . "/" . $penahananHakim->file);
            $file = $this->_upload();
        }

        $data = [
            'no_perkara'     => $this->input->post('no_perkara', TRUE),
            'nama'           => $this->input->post('nama', TRUE),
            'tempat_lahir'   => $this->input->post('tempat_lahir', TRUE),
            'umur'           => $this->input->post('umur', TRUE),
            'tgl_lahir'      => $this->input->post('tgl_lahir', TRUE),
            'kelamin'        => $this->input->post('kelamin', TRUE),
            'kebangsaan'     => $this->input->post('kebangsaan', TRUE),
            'tempat_tinggal' => $this->input->post('tempat_tinggal', TRUE),
            'agama'          => $this->input->post('agama', TRUE),
            'pekerjaan'      => $this->input->post('pekerjaan', TRUE),
            'membaca'        => $this->input->post('membaca', TRUE),
            'menimbang'      => $this->input->post('menimbang', TRUE),
            'menetapkan'     => $this->input->post('menetapkan', TRUE),
            'tgl_ditetapkan' => $this->input->post('tgl_ditetapkan', TRUE),
            'hakim_ketua'    => $this->input->post('hakim_ketua', TRUE),
            'hakim_satu'     => $this->input->post('hakim_satu', TRUE),
            'hakim_dua'      => $this->input->post('hakim_dua', TRUE),
            'file'           => $file,
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data penahanan hakim berhasil diperbarui'), site_url('penahanan_hakim'));
    }

    public function delete($id)
    {
        $penehananHakim = $this->db->get_where($this->table, ['id' => $id])->row();
        unlink($this->storage . "/" . $penehananHakim->file);
        $this->db->delete($this->table, array('id' => $id));
        alert(ucwords('data penahanan hakim berhasil dihapus'), site_url('penahanan_hakim'));
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

        $this->load->view('penahanan_hakim/show', [
            'active'    => 'penahanan_hakim',
            'header'    => 'Penahanan Hakim',
            'subheader' => 'Detail lengkap penahanan hakim',
            'data'      => $data,
        ]);
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

        alert(ucwords('data penahanan hakim berhasil divalidasi'), site_url('penahanan_hakim'));
    }

    public function berkas_tolak($id)
    {
        $data = [
            'status' => 'DITOLAK',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data penahanan hakim telah ditolak'), site_url('penahanan_hakim'));
    }

    public function validasi_pp($id)
    {
        $data = [
            'status' => 'Validasi PP',
        ];

        $this->db->where('id', $id)->update($this->table, $data);

        alert(ucwords('data penahanan hakim sidang telah divalidasi PP'), site_url('penahanan_hakim'));
    }

    /**
     * CETAK => LAPAS LEVEL USER
     */
    public function print($id)
    {
        $update = [
            'status' => 'SELESAI',
        ];
        $this->db->where('id', $id)->update($this->table, $update);

        $data = $this->db->get_where($this->table, ['id' => $id,])->row();

        $this->load->view('penahanan_hakim/pdf', [
            'data' => $data
        ]);
    }
}
