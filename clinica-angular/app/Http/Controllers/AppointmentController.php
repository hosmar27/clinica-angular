<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $appointments = Appointment::with(['patient', 'dentist'])->orderBy('id', 'desc')->get();

            return response()->json($appointments);
        }

        $appointments = DB::table('appointments')->orderBy('id', 'desc')->get();

        return view('appointments', ['appointments' => $appointments]);
    }

    public function create()
    {
        $patients = DB::table('patients')->orderBy('name')->get();
        $dentists = DB::table('dentists')->orderBy('name')->get();

        return view('appointment-form', ['appointment' => null, 'patients' => $patients, 'dentists' => $dentists]);
    }

    public function store(Request $request)
    {
        $data = $request->only(['patient_id', 'dentist_id', 'date_time', 'status']);

        if ($request->wantsJson()) {
            $appointment = Appointment::create($data);

            return response()->json($appointment, 201);
        }

        DB::table('appointments')->insert(array_merge($data, [
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        return redirect('/appointments');
    }

    public function show(Request $request, $id)
    {
        /*if ($request->wantsJson()) {
            $appointment = Appointment::with(['patient', 'dentist'])->findOrFail($id);

            return response()->json($appointment);
        }*/

        $appointment = DB::table('appointments')->where('id', $id)->first();
        $patients = DB::table('patients')->orderBy('name')->get();
        $dentists = DB::table('dentists')->orderBy('name')->get();

        return view('appointment-form', ['appointment' => $appointment, 'patients' => $patients, 'dentists' => $dentists]);
    }

    public function edit($id)
    {
        $appointment = DB::table('appointments')->where('id', $id)->first();
        $patients = DB::table('patients')->orderBy('name')->get();
        $dentists = DB::table('dentists')->orderBy('name')->get();

        return view('appointment-form', ['appointment' => $appointment, 'patients' => $patients, 'dentists' => $dentists]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['patient_id', 'dentist_id', 'date_time', 'status']);

        /*if ($request->wantsJson()) {
            $appointment = Appointment::findOrFail($id);
            $appointment->update($data);

            return response()->json($appointment);
        }*/

        DB::table('appointments')->where('id', $id)->update(array_merge($data, [
            'updated_at' => now(),
        ]));

        return redirect('/appointments');
    }

    public function destroy(Request $request, $id)
    {
        /*if ($request->wantsJson()) {
            Appointment::findOrFail($id)->delete();

            return response()->json(null, 204);
        }*/

        DB::table('appointments')->where('id', $id)->delete();

        return redirect('/appointments');
    }
}
