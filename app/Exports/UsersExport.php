<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        try {
            return User::select("id", "name", "email")->get();
        } catch (\Exception $e) {
            report($e);
            return [];
        }
    }


    /**
     * Get the column headings for the export.
     *
     * @return array The array of column names.
     */
    public function headings(): array
    {
        return ["ID", "Name", "Email"];
    }
}
