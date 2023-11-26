<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Produk extends BaseController
{

    private KategoriModel $KategoriModel;

    public function __construct()
    {
        $this->KategoriModel = new KategoriModel();    
    }

    //daftar produk
    public function index()
    {
        $data = [
            'title' => 'Product List',
        ];
        return view('admin/produk/index', $data);
    }

    //daftar kategori
    public function kategori()
    {
        $data = [
            'title' => 'Product Category',
            'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori','DESC')->findAll() 
        ];
        return view('admin/produk/kategori', $data);
    }

    //tambah kategori produk
    public function store(){
        //$slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);


        $nama_kategori = $this->request->getPost('nama_kategori');
        if (is_null($nama_kategori)) {
            // Handle the error, perhaps set a default value, or return an error message
            $nama_kategori = 'default-category-name'; // Example default value
        }
        $slug = url_title($nama_kategori, '-', TRUE);


        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->insert($data);

        return redirect()->back()->with('success', 'Yay! Data successfully added.');
    }

    //edit kategori produk
    public function update($id_kategori){
        //$slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        $nama_kategori = $this->request->getPost('nama_kategori');
        if (is_null($nama_kategori)) {
            // Handle the error, perhaps set a default value, or return an error message
            $nama_kategori = 'default-category-name'; // Example default value
        }
        $slug = url_title($nama_kategori, '-', TRUE);

        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];

        $this->KategoriModel->update($id_kategori, $data);

        return redirect()->back()->with('success', 'Yay! Data successfully updated.');
    
    }

    //delete kategori
    public function destroy($id_kategori){
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();

        return redirect()->back()->with('success', 'Oops! The data has been deleted.');
    
    }
}
