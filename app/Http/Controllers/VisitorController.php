<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class VisitorController extends Controller
{
    public function store(Request $request)
    {
        $ip_address = $request->ip();
        $date = date('Y-m-d');

        // Simpan data kunjungan ke dalam tabel "visitor_harian"
        Visitor::create([
            'date' => $date,
            'ip_address' => $ip_address,
        ]);

        return "Data kunjungan berhasil disimpan.";
    }
}
