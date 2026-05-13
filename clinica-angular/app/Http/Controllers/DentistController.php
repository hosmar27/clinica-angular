<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DentistController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (! $user || ($user->role ?? '') !== 'admin') {
                abort(403);
            }

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $dentists = DB::table('dentists')->orderBy('id', 'desc')->get();

        if ($request->wantsJson()) {
            return response()->json($dentists);
        }

        return view('dentists', ['dentists' => $dentists]);
    }

    public function create()
    {
        return view('dentist-form', ['dentist' => null]);
    }

    public function store(Request $request)
    {
        DB::table('dentists')->insert([
            'user_id' => 1,
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'cip' => $request->cip ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/dentists');
    }

    public function edit($id)
    {
        $dentist = DB::table('dentists')->where('id', $id)->first();

        return view('dentist-form', ['dentist' => $dentist]);
    }

    public function update(Request $request, $id)
    {
        DB::table('dentists')->where('id', $id)->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'cip' => $request->cip ?? null,
            'updated_at' => now(),
        ]);

        return redirect('/dentists');
    }
}
