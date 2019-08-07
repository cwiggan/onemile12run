<?php

namespace App\Exports;

use App\SignUp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SignUp::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Address',
            'City',
            'State',
            'BirthDay',
            'gender',
            'e name',
            'e phone',
            'zip code',
            'race id',
            't shirt',
            'trans',
            'Date',
            'update'
        ];
    }
}
