<?php

class Pelanggan_model extends CI_model 
{
	public function register()
    {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[pelanggan.email]', [
      'is_unique' => 'This email sebelumnya sudah digunakan!'
    ]);
      $data = [
        'email_pelanggan' => htmlspecialchars($this->input->post('email', true)),
        'pass_pelanggan' => $this->input->post('password', true),
        'nama_pelanggan' => htmlspecialchars($this->input->post('nama', true)),
        'telepon_pelanggan' => htmlspecialchars($this->input->post('telepon', true)),
        'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat', true)),
      ];
        $this->db->insert('pelanggan', $data);
    	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Selamat! Akun anda telah dibuat. Silahkan Login terlebih dahulu
    </div>');
    }


}