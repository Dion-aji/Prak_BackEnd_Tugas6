<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model
{
    private $_table = "barang";

    public $id_barang;
    public $nama_laptop;
    public $merek;
    public $harga;
    public $image = "default.jpg";
    public $deskripsi;

    public function rules()
    {
        return [
            ['field' => 'nama_laptop',
            'label' => 'Nama_laptop',
            'rules' => 'required'],

            ['field' => 'merek',
            'label' => 'Merek',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_laptop = $post["nama_laptop"];
        $this->merek = $post["merek"];
        $this->harga = $post["harga"];
        $this->deskripsi = $post["deskripsi"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama_laptop = $post["nama_laptop"];
        $this->merek = $post["merek"];
        $this->harga = $post["harga"];
        $this->deskripsi = $post["deskripsi"];
        $this->db->update($this->_table, $this, array('id_barang' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_barang" => $id));
    }
}
