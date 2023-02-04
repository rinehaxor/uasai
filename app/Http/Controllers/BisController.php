<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bis;
use App\Http\Controllers\DB;

class BisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Bis::all();
        return view('pages.home', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'bis' => 'required|unique:bis',
            'rombongan' => 'required',
            'waktu_datang' => 'required',
            'waktu_pulang' => 'required',
            'asal' => 'required'
        ]);
        Bis::create([
            'bis' => $request->bis,
            'rombongan' => $request->rombongan,
            'waktu_datang' => $request->waktu_datang,
            'waktu_pulang' => $request->waktu_pulang,
            'asal' => $request->asal
        ]);

        return redirect()->route('bis.index');
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
        $bis = Bis::find($id);
        return view('pages.detail', compact('bis'));
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
        $bis = Bis::find($id);
        return view('pages.edit', compact('bis'));
        // return dd($data);
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
        $this->validate($request, [
            'bis' => 'required|unique:bis',
            'rombongan' => 'required',
            'waktu_datang' => 'required',
            'waktu_pulang' => 'required',
            'asal' => 'required',
            
        ]);
        $bis = Bis::find($id);
        $bis->bis = $request->bis;
        $bis->rombongan = $request->rombongan;
        $bis->waktu_datang = $request->waktu_datang;
        $bis->waktu_pulang = $request->waktu_pulang;
        $bis->asal = $request->asal;
      
        $bis->save();

        return redirect()->route('bis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bis = Bis::find($id);
        $bis->delete();
        return redirect()->route('bis.index');
    }

    public function dashboard(){
        //
        $datas = Bis::all();
        return view('pages.dashboard', compact('datas'));
    }
    public function search(Request $request){
        //
        $bis = $request -> bis;
        $waktu_datang = $request -> waktu_datang;
        $asal = $request -> asal;
        if($bis){
            $datas = Bis::where('bis', 'like', '%'.$bis.'%')->get();
            return view('pages.search', compact('datas'));
        }
        if($waktu_datang){
            $datas = Bis::where('waktu_datang','=',$waktu_datang)->get();
            return view('pages.search', compact('datas'));
        }
        if($asal){
            $datas = Bis::where('asal','=',$asal)->get();
            return view('pages.search', compact('datas'));
        }
    }
}
