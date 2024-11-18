<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $province = Province::all();
        return view('guest.form', compact('province'));
    }

    public function getRegency(Request $request)
    {
        $id_province = $request->id_province;
        $regency = Regency::where('province_id', $id_province)->get();
        foreach ($regency as $item) {
            echo "<option value='$item->id'>$item->name</option>";
        }
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string',
            'province' => 'required',
            'regency' => 'required'
        ]);

      $guest = Guest::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'province' => $request->province,
            'regency' => $request->regency
        ]);

        return redirect()->route('guest.question', ['id' => $guest->id])->with('success', 'Berhasil');
    }
}
