<?php

namespace App\Http\Controllers;

use App\Rendez;
use App\Patient;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;

class RendezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');
        $jour = DB::table('rendezs')->join('patients', 'rendezs.patient_id', '=', 'patients.id')->where('rendezs.date',$date)->get();

        $req = DB::table('rendezs')->join('patients', 'rendezs.patient_id', '=', 'patients.id')->get();
        $Consultation = DB::table('rendezs')->join('patients', 'rendezs.patient_id', '=', 'patients.id')->where('etat','Consultation')->get();
        $Controle = DB::table('rendezs')->join('patients', 'rendezs.patient_id', '=', 'patients.id')->where('etat','Controle')->get();
        return  response()->json( ['all' =>$req, 'Consultation'=>$Consultation, 'Controle'=>$Controle,'jour'=>$jour] );
    }

    public function accuille(){
        $date = Carbon::now()->format('Y-m-d');
        $first=Patient::where('Date',$date)->get();
        return $first ;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = Rendez::create($request->all());
        return $req ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rendez  $rendez
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $req = DB::table('rendezs')->join('patients', 'rendezs.patient_id', '=', 'patients.id')->where('Tel','like','%'.$request->Tel.'%')->get();
        return $req ;
    }


    public function now(Rendez $rendez)
    {
         $date = Carbon::now()->format('Y-m-d');
        $req = DB::table('rendezs')->where('date', $date)->first();
        $count = DB::table('rendezs')->where('date', $date)->count();
        return ['count'=> $count,'all' =>$req] ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rendez  $rendez
     * @return \Illuminate\Http\Response
     */
    public function edit(Rendez $rendez)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rendez  $rendez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rendez $rendez)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rendez  $rendez
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Req= Rendez::findOrFail($id);
        return $Req->delete();       //
    }
}
