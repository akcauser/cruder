@extends('cms.layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>CMS Home Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Cruder</a></div>
                <div class="breadcrumb-item"><a>Api List</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">API List</h2>
            <p class="section-lead">Listed api's you create before.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Api List Table</h4>
                            <a href="{{ route('cruder.builder') }}" class="btn btn-primary">New Api</a>
                            <a href="{{ route('cruder.schema_form') }}" class="btn btn-primary">Generate From Schema</a>
                            <a href="{{ route('cruder.rollback_form') }}" class="btn btn-primary">Rollback</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Table</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($cruders as $item)
                                        <tr>
                                            <td>{{ $item->modelName }}</td>
                                            <td>{{ $item->tableName }}</td>
                                            <td>{{ $item->createdAt }}</td>
                                            <td><a href="{{ route('cms.'.Encodeurs\Cruder\Utils\StringUtil::convertPlural(Encodeurs\Cruder\Utils\StringUtil::snakeCase($item->modelName)).'.index') }}" class="btn btn-primary">Go</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection