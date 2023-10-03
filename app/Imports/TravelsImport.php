<?php

namespace App\Imports;

use App\Models\Travel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TravelsImport implements ToCollection, WithHeadingRow
{
    protected $validRows = [];
    protected $invalidRows = [];
    protected $duplicatedRows = [];
    protected $existingOriginsDestinations = [];

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
}
