<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AduanRequest;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aduan.template-senarai');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aduan.template-borang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AduanRequest $request)
    {
        // $data = $request->validate([
        //     'nama_pengadu' => 'required|min:3|string', // Cara 1 menulis validation rules. tanda | mengasingkan rules
        //     'email_pengadu' => ['required', 'email:filter'], // Cara 2 menulis validation rules. guna kaedah array
        // ]);

        // return $request->all();
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        // Query Builder
        DB::table('aduan')->insert($data);

        // Final response
        return redirect()->route('aduan.index')
        ->with('alert-success', 'Rekod berjaya disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('aduan.template-detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
