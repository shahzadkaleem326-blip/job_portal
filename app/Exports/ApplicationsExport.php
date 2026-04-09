<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Application::select('id', 'user_id', 'job_listing_id', 'status', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'User ID', 'Job ID', 'Status', 'Applied On'];
    }
}