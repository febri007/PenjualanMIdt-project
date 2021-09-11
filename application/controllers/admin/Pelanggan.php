<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    // Load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
        // Proteksi Halaman
        $this->simple_login->cek_login();
    }

    // Data Pelanggan
    public function index()
    {
        $pelanggan = $this->pelanggan_model->listing();

        $data = array(
            'title'        => 'Data Pelanggan',
            'pelanggan'    => $pelanggan,
            'isi'        => 'admin/pelanggan/list'
        );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    // Tambah User 
    public function tambah()
    {
        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required'        => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[pelanggan.email]',
            array(
                'required'        => '%s harus diisi',
                'valid_email'    => '%s tidak valid',
                'is_unique'        => '%s sudah terdaftar. '
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required'        => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            // END Validasi

            $data = array(
                'title'        => 'Tambah Pelanggan',
                'isi'        =>    'admin/pelanggan/tambah'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            // Masuk Database
        } else {
            $i = $this->input;
            $data = array(
                'status_pelanggan'    => 'Aktif',
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'                => $i->post('email'),
                'password'            => SHA1($i->post('password')),
                'telepon'            => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'tanggal_daftar'    => date('Y-m-d H:i:s')
            );
            $this->pelanggan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('admin/pelanggan'), 'refresh');
        }
        // End Masuk database
    }

    // Edit User 
    public function edit($id_pelanggan)
    {
        $pelanggan = $this->pelanggan_model->detail($id_pelanggan);

        // Validasi Input
        $valid = $this->form_validation;

        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required'        => '%s harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required'        => '%s harus diisi',
                'valid_email'    => '%s tidak valid'
            )
        );

        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required'        => '%s harus diisi')
        );

        if ($valid->run() === FALSE) {
            // END Validasi

            $data = array(
                'title'        => 'Edit Pelanggan',
                'pelanggan'    => $pelanggan,
                'isi'        => 'admin/pelanggan/edit'
            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            // Masuk Database
        } else {
            $i = $this->input;
            $data = array(
                'id_pelanggan'        => $id_pelanggan,
                'status_pelanggan'    => 'Aktif',
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'                => $i->post('email'),
                'password'            => SHA1($i->post('password')),
                'telepon'            => $i->post('telepon'),
                'alamat'            => $i->post('alamat'),
                'tanggal_daftar'    => date('Y-m-d H:i:s')
            );
            $this->pelanggan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('admin/pelanggan'), 'refresh');
        }
        // End Masuk database
    }


    // Delete user
    public function delete($id_pelanggan)
    {
        $data = array('id_pelanggan' => $id_pelanggan);
        $this->pelanggan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('admin/pelanggan'), 'refresh');
    }
}
