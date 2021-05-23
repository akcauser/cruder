<?php

namespace Encodeurs\Cruder\Http\Controllers;

use Encodeurs\Cruder\Generator\Main\MainGenerator;
use Encodeurs\Cruder\Http\Requests\BuilderGenerateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuilderController extends Controller
{
    public function generate(BuilderGenerateRequest $request)
    {
        // primary key generator
        $mainGenerator = new MainGenerator(
            modelName: $request->modelName,
            tableName: $request->tableName ?? null,
            fields: $request->fields,
            softDelete: $request->options["softDelete"],
            primaryKey: "id",
            timestamps: $request->options["timestamps"],
            forceMigrate: $request->options["forceMigrate"],
            paginate: $request->options["paginate"] ?? 15,
        );

        $response = $mainGenerator->call();
        if ($response)
            return response()->json(["message" => "Success"]);

        return response()->json("Error", 500);
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
