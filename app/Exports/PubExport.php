<?php

namespace App\Exports;

use App\Publicacao;
use Maatwebsite\Excel\Concerns\FromCollection;

class PubExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Publicacao::all();
    }
}
