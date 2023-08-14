<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use Illuminate\Support\Facades\Auth;

class StateController extends Controller
{
    public function Showdata()
    {
        $states = state::all();
        return view('home', compact('states'));
    }

    public function insert_state(Request $request)
    {
        // validate
        $request->validate([
            'country_name' => 'required',
            'iso_code' => 'required',
        ]);

        $object = new state;

        // Convert user input to uppercase
        $countryName = strtoupper($request->country_name);
        $isoCode = strtoupper($request->iso_code);

        $object->country_name = $request->country_name;
        $object->iso_code = $request->iso_code;
        $object->user_id = Auth::user()->id;
        $object->save();
        return redirect('home')->withError('Country Data Save Successfully');
    }


    public function delete_state($id)
    {
        state::find($id)->delete();
        return redirect('home')->withError('Data deleted Successfully');
    }

    public function edit_state($id)
    {
        $result = state::find($id);
        return view('edit-state', compact('result'));
    }

    public function update_state(Request $request, $id)
    {
        $object = state::find($id);

        // Convert user input to uppercase
        $countryName = strtoupper($request->country_name);
        $isoCode = strtoupper($request->iso_code);

        // Check if input matches restricted values

        $object->country_name = $countryName;
        $object->iso_code = $isoCode;
        $object->save();

        return redirect('home')->withError('Country Data Updated Successfully');
    }
}
