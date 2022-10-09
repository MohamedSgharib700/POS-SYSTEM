<?php

namespace App\Exports;

use App\Models\Balance;
use App\Models\Pos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($device)
    {
       $this->device = $device;
    }

    public function collection()
      {
      
        return Balance::select(['charge_value','supervisor','created_at'])->where('pos_id' , $this->device)->get();
      }

      public function headings(): array
       {
          return [
            'charge value',
            'supervisor',
            'created_at',
           ];
        }
}
