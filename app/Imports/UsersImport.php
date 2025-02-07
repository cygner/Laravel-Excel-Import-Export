<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    
    /**
     * Write code on Method
     *
     * @param  array  $row
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function model(array $row)
    {
        User::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }

    
    /**
     * Return a validation rules array
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ];
    }
}
