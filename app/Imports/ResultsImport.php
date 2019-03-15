<?php

namespace App\Imports;

use App\RaceResult;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ResultsImport implements ToModel, WithHeadingRow
{
    use Importable;
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //Log::debug($request->all());
        $name = explode(" ", $row['name']);
        //dd($row['ag'] ?? '');
        //dd($row);
        $gender = [
            'F' => 'F',
            'M' => 'M',
            'Male' => 'M',
            'Female' => 'F',
        ];
        return new RaceResult([
            'first_name' => $name[0],
            'last_name' => $name[1],
            'age' => $row['age'],
            'distance' => $row['distance'],
            'laps' => $row['laps'],
            'age_group' => $row['ag'] ?? '',
            'bid' => $row['bib'] ?? '',
            'year' => $this->year,
            'gender' => $gender[$row['gender']],
            'time' => $row['time'] ?? '00:00:00'
        ]);
    }
}
