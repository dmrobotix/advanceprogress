<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExistingLegislation;
use App\States;

class ExistingLegislationController extends Controller
{
    // this controller takes entries in the existing_legislations table and
    // presents information as a Google geochart friendly data table

    public function geochartData(Request $formdata) {
      $validateData = $request->validate([
        'keyword' => 'required'
      ]);

      $states = States::all();
      $data = "['State', 'Legislation']";
      foreach ($states as $st) {
        $count = ExistingLegislation::where('category',$formdata->keyword)->where('state',$st)->count();
        $data = $data . ", ['$st' , $count]";
      }

      //return view('map')->with(compact['data',$data,'keyword',$formdata->keyword]);
      return response()->json(json_encode($data));
    }

    /* example
    ['State',   'Legislation'],
    ['Alabama', 30], ['Alaska', 54], ['Arizona', 109], ['Arkansas', 89],
    ['California', 12], ['Colorado', 3], ['Connecticut', 3],
    ['Delaware', 28], ['Florida', 15],
    ['Georgia', 4], ['Hawaii', 35], ['Idaho', 12],
    ['Illinois', 12], ['Indiana', 6],
    ['Iowa', 3], ['Kansas', 12],
    ['Kentucky', 26], ['Louisiana', 3], ['Maine', 15],
    ['Maryland', 9], ['Massachusetts', 0], ['Michigan', 13], ['Minnesota', 5],
    ['Mississippi', 10], ['Missouri', 12], ['Montana', 1],
    ['Nebraska', 29], ['Nevada', 6], ['New Hampshire', 32], ['New Jersey', null],
    ['New Mexico', 33], ['New York', 14], ['North Carolina', 12], ['North Dakota', 18],
    ['Ohio', 20], ['Oklahoma', 13], ['Oregon', 35],
    ['Pennsylvania', 32], ['Rhode Island', 25], ['South Carolina', 22],
    ['South Dakota', 14], ['Tennessee', 8], ['Texas', 1],
    ['Utah', 21], ['Vermont', 2], ['Virginia', 16],
    ['Washington', 0], ['West Virginia', 15],
    ['Wisconsin', 5], ['Wyoming', 8]
    */
}
