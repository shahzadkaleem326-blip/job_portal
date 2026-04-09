<?php

namespace App\Exports;

use App\Models\JobListing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return JobListing::select('id', 'title', 'location', 'salary', 'job_type', 'status', 'deadline', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Job Title', 'Location', 'Salary', 'Job Type', 'Status', 'Deadline', 'Created On'];
    }
}