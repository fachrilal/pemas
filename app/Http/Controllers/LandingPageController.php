<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //menampilkan banyak data
    public function index()
    {
        //
        return view('landing-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    //menampilkan form untuk membuat data baru
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //menyimpan data baru ke database
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    //menampilkan data spesifik/hanya 1 data
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    //menampilkan formulir edit
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //mengubah data ke database
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //menghapus data di database
    public function destroy(string $id)
    {
        //
    }
}
