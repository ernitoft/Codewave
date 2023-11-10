<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bookings;

class ReserveController extends Controller
{
    public function index(){
        return view('searchReserve');
    }

    public function check(Request $request){

        $messages = makeMessages();

        $this->validate($request,['code' =>['required','between:6,6','regex:[a-z\A-Z][a-z\A-Z][a-z\A-Z][a-z\A-Z][0-9][0-9]']],$messages);

        $travel = bookings::where('codigoTramo',$request);

        if(!$travel){

        }

        return redirect()->route('welcome');
    }
}
