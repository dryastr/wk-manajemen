<?php

namespace App\Exports;

use App\Models\RequestPlacement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class RequestPlacementExport implements FromCollection, WithHeadings
{
    /**
     * Return the collection of data.
     */
    public function collection()
    {
        // Retrieve the data including the user's name
        return RequestPlacement::with('user')
            ->get()
            ->map(function ($requestPlacement) {
                return [
                    'ID' => $requestPlacement->id,
                    'Nama Siswa' => $requestPlacement->user->name, // Get the user's name
                    'Filename' => $requestPlacement->filename,
                    'Source' => $requestPlacement->source,
                    'Size' => $requestPlacement->size,
                    'Extension' => $requestPlacement->ext,
                    'Status' => $requestPlacement->status,
                    'Created At' => $requestPlacement->created_at,
                    'Updated At' => $requestPlacement->updated_at,
                ];
            });
    }

    /**
     * Define the headings for the export file.
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Filename',
            'Source',
            'Size',
            'Extension',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
