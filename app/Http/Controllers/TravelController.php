<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TravelsImport;
use Maatwebsite\Excel\Facades\Excel;


class TravelController extends Controller
{




        public function indexAddTravels()
        {
            if(session('validRows')  || session('invalidRows') || session('duplicateRows')) {
                session()->put('validRows', []);
                session()->put('invalidRows', []);
                session()->put('duplicateRows', []);
            } else{
                session(['validRows' => []]);
                session(['invalidRows' => []]);
                session(['duplicateRows' => []]);
            }

            return view('admin.travel.index', [
                'validRows' => session('validRows'),
                'invalidRows' => session('invalidRows'),
                'duplicateRows' => session('duplicateRows')
            ]);
        }

        public function indexTravels()
        {
            return view('admin.travel.index', [
                'validRows' => session('validRows'),
                'invalidRows' => session('invalidRows'),
                'duplicateRows' => session('duplicateRows')
            ]);
        }

        public function travelCheck(Request $request)
        {
            $messages = makeMessages();

            $this->validate($request, [
                'document' => ['required', 'max:5120', 'mimes:xlsx'],
            ],  $messages);

            if($request->hasFile('document')) {
                $file = request()->file('document');

                $import = new TravelsImport();
                Excel::import($import, $file);

                $validRows = $import->getValidRows();
                $invalidRows = $import->getInvalidRows();
                $duplicatedRows = $import->getDuplicatedRows();



                foreach($validRows as $row){
                    $origin = $row['origen'];
                    $destination = $row['destino'];

                    $travel = Travel::where('origin', $origin)
                        ->where('destination', $destination)
                        ->first();

                    if($travel) {

                        $travel->update([
                            'seat_quantity' => $row['cantidad_de_asientos'],
                            'base_rate' => $row['tarifa_base'],
                        ]);
                        $travel->save();
                    }else{
                        Travel::create([
                            'origin' =>$origin,
                            'destination' =>$destination,
                            'seat_quantity' =>$row['cantidad_de_asientos'],
                            'base_rate' =>$row['tarifa_base'],
                        ]);
                    }
                }

                $invalidRows = array_filter($invalidRows, function ($invalidrow) {
                    return $invalidrow['origen'] !== null || $invalidrow['destino'] !== null || $invalidrow['cantidad_de_asientos'] !== null  || $invalidrow['tarifa_base'] !== null;

                });
                session()->put('validRows', $validRows);
                session()->put('invalidRows', $invalidRows);
                session()->put('duplicatedRows', $duplicatedRows);

                return redirect()->route('travelsAdd.index');
            }
        }

        public function homeIndex(){

            $travels = Travel::get()->count();

            return view('home',[
                'countTravels'=> $travels,
            ]);
        }

}

