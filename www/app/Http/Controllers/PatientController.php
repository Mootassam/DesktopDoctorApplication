<?php

namespace App\Http\Controllers;

use App\Rendez;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function view(){
         return view('content.patient');
     }
    public function index()
    {
        $req = Patient::latest()->get();
       return $req ;

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
        $req = Patient::create($request->all());
        return $req ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $rendez= Rendez::where('patient_id','=',$id)->count();
        $all= Rendez::where('patient_id','=',$id)->get();
        return ['patient' => $patient,'rendez' =>$rendez,'all'=>$all];
    }
    public function fetch(Request $request)
    {
        return $req = Patient::where('Tel','like','%'.$request->Tel.'%')->get();
    }
    public function counts()
    {
        $date = Carbon::now()->format('Y-m-d');
        $count = Patient::where('date',$date)->where('presence','En attente')->count();
        $all = Patient::where('date',$date)->get();
        return ['all' =>$all , 'count'=>$count] ;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $req= Patient::findOrFail($id);
        $updated= $req->update($request->all());
        if($updated)
        { return 'The Form has been submited' ;}
        else{ return 'The form not submited'; }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $req= Patient::find($id);
        return $req->delete();
    }
}
