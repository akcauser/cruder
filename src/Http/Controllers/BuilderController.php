<?php

namespace Encodeurs\Cruder\Http\Controllers;

use Encodeurs\Cruder\Generator\Main\MainGenerator;
use Encodeurs\Cruder\Http\Requests\BuilderGenerateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encodeurs\Cruder\Generator\Main\Rollback;
use Encodeurs\Cruder\Utils\CruderUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BuilderController extends Controller
{
    public function index()
    {
        $models = CruderUtil::getAllCruder();
        return view('cruder::builder', compact('models'));
    }

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
            relationFields: $request->relationFields,
            swagger: $request->options["swagger"],
        );

        $response = $mainGenerator->call();
        if ($response)
            return response()->json(["message" => "Success"]);

        return response()->json("Error", 500);
    }

    public function rollback(Request $request)
    {
        $request->validate([
            'modelName' => [
                'required',
            ],
        ]);
        $rollback = new Rollback($request->modelName);

        $response = $rollback->call();
        if (!$response)
            return back()->with('error');

        return back()->with('success');
    }

    public function schema(Request $request)
    {
        # code
    }

    public function models()
    {
        $models = CruderUtil::getAllModels();
        return response()->json($models);
    }

    public function tables()
    {
        $tables = [];
        foreach (DB::select('SHOW TABLES') as $table) {
            foreach ($table as $tableName) {
                array_push($tables, $tableName);
            }
        }

        return response()->json($tables);
    }

    public function columnsByTable($table)
    {
        $columns = Schema::getColumnListing($table);

        return response()->json($columns);
    }

    public function columnsByModel($model)
    {
        $model = 'App\Models\\' . $model;
        $modelObject = new $model();

        $columns = Schema::getColumnListing($modelObject->getTable());

        return response()->json($columns);
    }
}
