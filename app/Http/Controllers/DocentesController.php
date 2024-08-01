<?php

namespace App\Http\Controllers;

use App\DataTables\DocentesDataTable;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function index(DocentesDataTable $dataTable)
    {
        return $dataTable->render('docentes.index');
    }
}
