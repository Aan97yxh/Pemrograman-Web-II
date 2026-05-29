<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class Home extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }

    public function index()
    {
        $data['profil'] = $this->profilModel->getProfilData();
        return view('beranda', $data);
    }

    public function profil()
    {
        $data['profil'] = $this->profilModel->getProfilData();
        return view('profil', $data);
    }
}