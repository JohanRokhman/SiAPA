<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// use App\PelakuUsaha;
use App\DataPelakuUsaha;
use App\User;
use App\Penghasilan;
use Illuminate\Support\Facades\DB;
use App\PelakuUsaha;
use phpDocumentor\Reflection\Types\Null_;

class PelakuUsahaController extends Controller
{
    // public function tambahData()
    // {
    //     return view('pelakuusaha');
    // }
    public function proses_tambahData(Request $request)
    {

        $this->validate($request, [
            // 'nama' => 'required',
            // 'alamat' => 'required',
            // 'kecamatan' => 'required',
            // 'kelurahan' => 'required',
            // 'jenis_pkl' => 'required',
            // 'jenis_usaha' => 'required',
            // 'data_id' => 'required',
        ]);
        $file = $request->file('foto');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/data_file/';
        $file->move($tujuan_upload, $nama_file);

        DataPelakuUsaha::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'jenis_pkl' => $request->jenis_pkl,
            'jenis_usaha' => $request->jenis_usaha,
            'foto' => $nama_file,
            'data_id' => $request->data_id,
        ]);
        return redirect('dashboard')->with('success', 'data berhasil di tambah');
    }
    public function edit($id, Request $data)
    {
        $this->validate($data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->save();
        return redirect('dashboard')->with('sukses', 'data berhasil di edit');
    }

    public function Penghasilan(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
            'penghasilan_id' => 'required',
        ]);

        Penghasilan::create(
            [
                'tanggal' => $request->tanggal,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
                'penghasilan_id' => $request->penghasilan_id,
            ]
        );
        // dd($request);
        return redirect('penghasilan')->with('success', 'penghasilan berhasil di tambahkan');
    }

    public function editdata($data_id)
    {
        $user = DataPelakuUsaha::find($data_id);
        // var_dump($user);
        if ($user == null)
            return redirect('editpelakuusaha');
        else {
            return redirect('pelakuusaha');
        }
    }

    public function chart($id)
    {

        //       $pelaku_usaha = Penghasilan::->count();
        //var_dump($pelaku_usaha);
        //$pelaku_usaha = Penghasilan::groupBy('bulan')->get();
        //$pelaku_usaha = Penghasilan::where('penghasilan_id', '=', $id)->get();
        $data = DB::table('penghasilan')
            ->select(['bulan'])
            ->selectRaw('sum(jumlah) as jumlahPenghasilan')
            ->where('penghasilan_id', '=', $id)->groupBy('bulan')->get();
        $jumlah_penghasilan = [];
        foreach ($data as $d) {
            $jumlah_penghasilan[config('bulan')[$d->bulan]] = (int) $d->jumlahPenghasilan;
        }
        ksort($jumlah_penghasilan);
        return view('dashboard', ['data' => $jumlah_penghasilan]);
    }
}
