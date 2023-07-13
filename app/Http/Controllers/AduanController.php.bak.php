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
        // $senaraiAduan = DB::table('aduan')
        // ->where('user_id', '=', auth()->id())
        // //->select('title', 'description')
        // ->get();

        $senaraiAduan = DB::table('aduan')
        ->join('users', 'aduan.user_id', '=', 'users.id')
        ->where('aduan.user_id', '=', auth()->id())
        ->select('aduan.*', 'users.id AS iduser', 'users.name')
        ->get();

        // Dump Data & Die
        // dd($senaraiAduan);

        return view('aduan.template-senarai', compact('senaraiAduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aduan.template-borang-create');
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
        $data['created_at'] = now();

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
        $aduan = DB::table('aduan')->where('id', '=', $id)->first();

        //return view('aduan.template-detail')->with('aduan', $aduan);
        return view('aduan.template-detail', ['aduan' => $aduan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aduan = DB::table('aduan')->where('id', '=', $id)->first();
        $category = explode(',', $aduan->category);

        return view('aduan.template-borang-edit')
        ->with('aduan', $aduan)
        ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AduanRequest $request, string $id)
    {
        $data = $request->validated();

        // Tukar format data dari array kepada string apabila simpan ke dalam database
        $data['category'] = implode(',', $data['category']);

        DB::table('aduan')->where('id', $id)->update($data);

        return redirect()->route('aduan.edit', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('aduan')->where('id', $id)->delete();

        return redirect()->route('aduan.index')->with('notis-success', 'Rekod berjaya dihapuskan!');
    }
}
