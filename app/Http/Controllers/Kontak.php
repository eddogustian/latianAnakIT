<?php

namespace App\Http\Controllers;
use App\ModelKontak; //import file si model 
use Illuminate\Http\Request;
use DB;
// use Datatables;

class Kontak extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ModelKontak::all();
        return view('kontak',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
       return view('kontak_create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $data = new ModelKontak();
       $data->nama = $request->nama;
       $data->email = $request->email;
       $data->nohp = $request->nohp;
       $data->alamat = $request->alamat;
       $data->save();
       return redirect()->route('kontak.index')->with('alert-success','Berhasil Menambahkan Data!');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = ModelKontak::where('id',$id)->get();

        return view('kontak_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = ModelKontak::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->nohp = $request->nohp;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect()->route('kontak.index')->with('alert-success','Data berhasil diubah!');
    }
    
    // public function getdata()
    // {
    //     $data = ModelKontak::select('nama','email','nohp','alamat');
    //     return Datatables::of($data)->make(true);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $data = ModelKontak::where('id',$id)->first();
        $data->delete();
        return redirect()->route('kontak.index')->with('alert-success','Data berhasi dihapus!');
    }

     public function importFileKontak(Request $request){


        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();



            if($data->count()){

                foreach ($data as $key => $value) {

                    $arr[] = ['nama' => $value->nama, 'email' => $value->email, 'nohp' => $value->nohp, 'alamat' => $value->alamat];

                }
             

                if(!empty($arr)){

                    DB::table('model_kontaks')->insert($arr);

                    dd('Insert Recorded successfully.');

                } 
                print_r($arr); die();

            }

        }

        dd('Request data does not have any files to import.');      

    } 



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function exportFileKontak($type){

        $kontaks = ModelKontak::get()->toArray();



        return \Excel::create('hdtuto_demo', function($excel) use ($kontaks) {

            $excel->sheet('sheet name', function($sheet) use ($kontaks)

            {

                $sheet->fromArray($kontaks);

            });

        })->download($type);

    }      
}
