<?php

namespace App\Http\Controllers;

use App\Export\UsersExport;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $data = Mahasiswa::where('nama', 'nim' .$request->search)->paginate(5);
        }else{
            $data = Mahasiswa::paginate(5);
        }

        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        Mahasiswa::create($request->all());
        return redirect()->route('home')->with('Success','Data Berhasil Ditambahkan');
    }

    public function store(Request $request)
    {
        //
    }


    public function tampilkandata($id)
    {
        $data = Mahasiswa::find($id);
        // dd($data);

        return view('tampildata', compact('data'));
    }


    public function updatedata(Request $request, $id)
    {
        $data = Mahasiswa::find($id);
        $data->update($request->all());

        return redirect()->route('home')->with('Success','Data Berhasil Di Update');

    }

    public function delete($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();

        return redirect()->route('home')->with('Success','Data Berhasil Di Hapus');
    }

    public function exportpdf(){
        $data = Mahasiswa::all();

        view()->share('data', $data);
        $pdf = FacadePdf::loadview('datamahasiswa-pdf');
        return $pdf->download('Data Mahasiswa.pdf');
    }

    public function exportexcel(){
        return Excel::download(new MahasiswaExport, 'Data Mahasiswa.xlsx');
    }

    public function insertfile(){
        return view('insertfile');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('MahasiswaData', $namafile);

        Excel::import(new MahasiswaImport, \public_path('/MahasiswaData/' .$namafile));
        return \redirect()->back();
    }
}
