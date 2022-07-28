<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public function peopleList()
    {
        $data = People::get();

        // dd($data);
        return view('people', ['people' => $data]);
    }

    //for api
    public function allList(){
        return People::all();
    }
}
