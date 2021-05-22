<?php

namespace Akcauser\Cruder\Http\Controllers;

use Akcauser\Cruder\Generator\Main\MainGenerator;
use Akcauser\Cruder\Http\Requests\BuilderGenerateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuilderController extends Controller
{
    public function generate(BuilderGenerateRequest $request)
    {
        new MainGenerator($request->modelName, $request->tableName, $request->fields, $request->softDelete, "id", true, $request->forceMigrate);
    }

    public function rollback(Request $request)
    {
        dd($request);
    }

    public function schema(Request $request)
    {
        dd($request);
    }
}
