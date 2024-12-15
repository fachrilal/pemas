<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */



     public function index()
     {
         // Ambil semua data laporan dari database
         $reports = Report::all();
     
         // Kirim data ke view
         return view('user.index', ['reports' => $reports]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/create-report'); 
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'type' => 'required',
            'detail' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Simpan gambar ke storage
        $gambarPath = $request->file('gambar')->store('images/reports', 'public');
    
        // Simpan data ke database
        Report::create([
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'type' => $request->type,
            'detail' => $request->detail,
            'gambar' => $gambarPath,
        ]);
    
        return redirect()->route('home')->with('success', 'Report berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
