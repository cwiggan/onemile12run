<?php

namespace App\Exports;

use App\RaceResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithMapping, WithHeadings
{
    private $year;
    private $place = 0;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RaceResult::where('year', $this->year)->orderBy('distance', 'desc')->get();
    }

    public function map($results): array
    {
        $this->place ++;
        return [
            $this->place,
            $results->distance,
            $results->first_name,
            $results->last_name,
            $results->age,
            $results->gender
        ];
    }

    public function headings(): array
    {
        return [
            'place',
            'distance',
            'first',
            'last',
            'age',
            'gender'
        ];
    }
}
