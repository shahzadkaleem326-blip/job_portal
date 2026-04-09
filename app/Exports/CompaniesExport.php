<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompaniesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Company::select('id', 'company_name', 'location', 'website', 'phone', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Company Name', 'Location', 'Website', 'Phone', 'Created On'];
    }
}