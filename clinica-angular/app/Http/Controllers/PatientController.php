<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $patients = DB::table('patients')->orderBy('id', 'desc')->get();
        return view('patients', ['patients' => $patients]);
    }

    public function create()
    {
        return view('patient-form', ['patient' => null]);
    }

    public function store(Request $request)
    {
        DB::table('patients')->insert([
            'user_id' => 1, 
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/patients');
    }

    public function edit($id)
    {
        $patient = DB::table('patients')->where('id', $id)->first();
        return view('patient-form', ['patient' => $patient]);
    }

    public function update(Request $request, $id)
    {
        DB::table('patients')->where('id', $id)->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'updated_at' => now(),
        ]);

        return redirect('/patients');
    }
}