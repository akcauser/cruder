<?php

namespace Encodeurs\Cruder\Http\Controllers;

use Encodeurs\Cruder\Generator\Main\MainGenerator;
use Encodeurs\Cruder\Http\Requests\BuilderGenerateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encodeurs\Cruder\Generator\Main\Rollback;
use Encodeurs\Cruder\Http\Requests\GenerateFromSchemaRequest;
use Encodeurs\Cruder\Utils\CruderUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BuilderController extends Controller
{
    public function index()
    {
        $models = CruderUtil::getAllCruder();
        return view('cruder::builder_form', compact('models'));
    }

    public function rollback_form()
    {
        $models = CruderUtil::getAllCruder();
        return view('cruder::builder_rollback', compact('models'));
    }

    public function schema_form()
    {
        $models = CruderUtil::getAllCruder();
        return view('cruder::builder_from_schema', compact('models'));
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

    public function schema(GenerateFromSchemaRequest $request)
    {
        $schema = $request->file('schema')->getContent();
        $schema = json_decode($schema);
        // todo: MainGenerator->call and give parameters. 

        $fields = [];
        foreach ($schema->fields as $field) {
            array_push($fields, json_decode(json_encode($field), true));
        }

        $relationFields = [];
        foreach ($schema->relationFields as $field) {
            array_push($relationFields, json_decode(json_encode($field), true));
        }

        $mainGenerator = new MainGenerator(
            modelName: $schema->modelName,
            tableName: $schema->tableName ?? null,
            fields: $fields,
            softDelete: $schema->options->softDelete,
            primaryKey: "id",
            timestamps: $schema->options->timestamps,
            forceMigrate: $schema->options->forceMigrate,
            paginate: $schema->options->paginate ?? 15,
            relationFields: $relationFields,
            swagger: $schema->options->swagger,
        );

        $response = $mainGenerator->call();
        if ($response)
            return response()->json(["message" => "Success"]);

        return response()->json("Error", 500);
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
