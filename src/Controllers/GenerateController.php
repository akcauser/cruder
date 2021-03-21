<?php

namespace Akcauser\Cruder\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenerateController extends Controller
{
    public function generate(Request $request)
    {
        // json burada
        echo $request->modelName;
        exit;
    }

    public function rollback(Request $request)
    {
        dd($request);
        # code...
    }
    
    public function schema(Request $request)
    {
        dd($request);
        # code...
    }
}