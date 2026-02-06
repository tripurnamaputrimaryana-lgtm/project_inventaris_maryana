<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * Ambil semua user
     */
    public function collection()
    {
        return User::all()->map(function($user){
            return [
                'Name' => $user->name,
                'Email' => $user->email,
                'Role' => ucfirst($user->role),
                'Created At' => $user->created_at->format('Y-m-d'),
            ];
        });
    }

    /**
     * Heading kolom Excel
     */
    public function headings(): array
    {
        return ['Name', 'Email', 'Role', 'Created At'];
    }
}
