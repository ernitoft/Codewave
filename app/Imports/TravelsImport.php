<?php

namespace App\Imports;

use App\Models\Travel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
<<<<<<< HEAD

class TravelsImport implements ToCollection, WithHeadingRow
{
=======
use Session;
class TravelsImport implements ToCollection, WithHeadingRow
{

>>>>>>> 1344912003c08a7dfcd20de5619ccd4b8bb13019
    protected $validRows = [];
    protected $invalidRows = [];
    protected $duplicatedRows = [];
    protected $existingOriginsDestinations = [];

<<<<<<< HEAD
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $origin = $row['origen'];
            $destination = $row['destino'];

            if($this->hasDuplicateOriginDestination($origin, $destination)) {
                $this->duplicatedRows[] = $row;
            } else {
            
                if(isset($row['origen']) && isset($row['destino']) && isset($row['cantidad_de_asientos'])&& isset($row['tarifa_base']) && is_numeric($row['cantidad_de_asientos']) && is_numeric($row['tarifa_base'])){
                    $this->validRows[] = $row;
                    $this->existingOriginsDestinations[] = $origin . '-' . $destination;

                }else {
                    $this->invalidRows[] = $row;
                }
            
            }
        }
    }

    private function hasDuplicateOriginDestination($origin, $destination)
    {
        $key = $origin . '-' . $destination;
        return in_array($key, $this->existingOriginsDestinations);
    }

    public function getValidRows()
    {
        return $this->validRows;
    }

    public function getInvalidRows()
    {
        return $this->invalidRows;
    }

    public function getDuplicatedRows()
    {
        return $this->duplicatedRows;
    }

    public function model(array $row)
    {
        return new Travel([
            //
        ]);
    }
=======
    public function collection(Collection $rows){

        foreach($rows as $row){
            try{
                $origin = $row['origen'];
                $destination = $row['destino'];
                $cant = $row['cantidad_de_asientos'];
                $tarifa = $row['tarifa_base'];
            }

            catch(\Exception $e){
                Session::flash('lecturaError','Verifique que el archivo tenga el formato correcto.');
                return;
            }

            if($this->hasDuplicateOriginDestination($origin,$destination)){
                $this->duplicatedRows[] = $row;
            }else{


                if(strpos($row['tarifa_base'],'.')){
                    str_replace('.','',$row['tarifa_base']);
                }else if(strpos($row['tarifa_base'],',')){
                    str_replace(',','',$row['tarifa_base']);
                }

                if($row['cantidad_de_asientos'] < 0 || $row['tarifa_base'] < 0){
                    $this->invalidRows[] = $row;
                    continue;
                }

                if(isset($row['origen']) && isset($row['destino']) && isset($row['cantidad_de_asientos']) && isset($row['tarifa_base']) && is_numeric($row['cantidad_de_asientos']) && is_numeric($row['tarifa_base'])
                && $row['cantidad_de_asientos'] >= 1 && $row['tarifa_base'] >= 1){

                    $this->validRows[] = $row;

                    $this->existingOriginsDestinations[] = $origin . '-' . $destination;
                }else{

                    $this->invalidRows[] = $row;
                }
            }
        }

    }

    private function hasDuplicateOriginDestination($origin,$destination){

        $key = $origin . '-' . $destination;

        return in_array($key,$this->existingOriginsDestinations);

    }

    public function getValidRows(){
        return $this->validRows;
    }

    public function getInvalidRows(){
        return $this->invalidRows;
    }

    public function getDuplicatedRows(){
        return $this->duplicatedRows;
    }

>>>>>>> 1344912003c08a7dfcd20de5619ccd4b8bb13019
}
