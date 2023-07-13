<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AduanRequest;
use Illuminate\Support\Facades\Storage;

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

        $senaraiAduan = Aduan::with(['user'])
        ->where('user_id', '=', auth()->id())
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
        $data['category'] = implode(',', $data['category']);

        // Jika ada file yang diupload, simpan dia
        if ($request->hasFile('lampiran'))
        {
            // Dapatkan file
            $file = $request->file('lampiran');

            // Simpan file dalam folder uploads
            $fileName = $file->store('attachment', 'public_uploaded');

            // Attachkan nama file yang diupload ke $data untuk simpan ke DB
            $data['lampiran'] = $fileName;
        }

        // Cara 1 Simpan Data Menerusi Model
        // $aduan = new Aduan;
        // $aduan->title = $data['title']; // $request->input('title')
        // $aduan->description = $data['description']; // $request->description
        // $aduan->user_id = auth()->id();
        // $aduan->save();

        // Cara 2 Simpan Data Menerusi Model
        Aduan::create($data);

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
        $aduan = Aduan::where('id', '=', $id)->first();
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

        $aduan = Aduan::findOrFail($id);

        // Tukar format data dari array kepada string apabila simpan ke dalam database
        $data['category'] = implode(',', $data['category']);

        // Jika ada file yang diupload, simpan dia
        if ($request->hasFile('lampiran'))
        {
            // Dapatkan file
            $file = $request->file('lampiran');

            // Sekiranya ada rekod file sedia ada dalam table aduan dan wujud file tersebut dalam folder upload
            // Delete file tersebut
            if (!is_null($aduan->lampiran)
            && Storage::disk('public_uploaded')->exists($aduan->lampiran)
            //&& $request->input('check_delete') == 1
            )
            {
                Storage::disk('public_uploaded')->delete($aduan->lampiran);
            }

            // Simpan file dalam folder uploads
            $fileName = $file->store('attachment', 'public_uploaded');

            // Attachkan nama file yang diupload ke $data untuk simpan ke DB
            $data['lampiran'] = $fileName;
        }

        Aduan::where('id', $id)->update($data);

        return redirect()->route('aduan.edit', $id)->with('notis-success', 'Rekod berjaya dikemaskini!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Aduan::where('id', $id)->delete();

        return redirect()->route('aduan.index')->with('notis-success', 'Rekod berjaya dihapuskan!');
    }
}
