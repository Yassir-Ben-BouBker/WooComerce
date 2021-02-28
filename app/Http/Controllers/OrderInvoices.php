<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromArray;

class OrderInvoices implements FromArray
{
    //
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }
    public function array(): array
    {
        return $this->invoices;
    }
}
