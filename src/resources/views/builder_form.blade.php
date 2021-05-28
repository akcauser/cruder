<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>Builder</h4>
        </div>
        <div class="card-body">
            <form role="form" id="form">
                @method('post')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Model Name <span class="required">*</span></label>
                            <input type="text" class="form-control" id="modelNameInput" placeholder="Enter model name"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Custom Table Name</label>
                            <input type="text" class="form-control" id="customTableNameInput"
                                placeholder="Enter custom table name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="control-label">Options</div>
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="chkTimestamps" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Timestamp Fields</span>
                            </label>
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="chkDelete">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Soft delete</span>
                            </label>
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="chkSave">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Save schema</span>
                            </label>
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="chkSwagger">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Swagger</span>
                            </label>
                            <label class="custom-switch">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="chkForceMigrate">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Force migrate</span>
                            </label>
                        </div>
                    </div>
                    <!--
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Prefix</label>
                            <input type="text" class="form-control" id="prefixInput" placeholder="Enter prefix">
                        </div>
                    </div>
                -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Paginate</label>
                            <input type="text" class="form-control" id="paginateInput" placeholder="Enter page data count">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div>
                    Default Fields: id=>(bigIncrement,primaryKey)
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-md" id="table">
                            <thead>
                                <tr>
                                    <th>Field Name <span class="required">*</span></th>
                                    <th>DB Type</th>
                                    <th>Validations</th>
                                    <th>Html Type</th>
                                    <th>Nullable</th>
                                    <th>Searchable</th>
                                    <th>Fillable</th>
                                    <th>In Index</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-icon btn-success mt-4" id="addFieldButton"><i
                            class="fas fa-plus"></i> Add field</button>
                </div>

                {{--
                <div class="row">
                    <div class="btn-group mb-3" role="group">
                        <a href="#" class="btn btn-icon btn-secondary" id="addRelationshipButton"><i
                                class="far fa-edit"></i> Add relationship</a>
                        <div class="form-group" style="padding-left: 10px">
                            <button type="button" class="btn btn-default " id="addRelationshipButton"
                                style="background-color:#ffc107; color: white">Add relationship</button>
                        </div>
                    </div>
                </div>
                --}}

                <div class="row mt-4" id="relationShip">
                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-md" id="relationShipTable">
                            <thead>
                                <tr>
                                    <th>Field Name <span class="required">*</span></th>
                                    <th>Relation Type <span class="required">*</span></th>
                                    <th>Foreign Model<span class="required">*</span></th>
                                    <th>Foreign Table<span class="required">*</span></th>
                                    <th>Foreign Field<span class="required">*</span></th>
                                    <th>Show Field<span class="required">*</span></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <button type="button" class="btn btn-icon btn-success mt-4" id="addRelationshipButton"><i
                                class="fas fa-plus"></i> Add relationship field</button>
                    </div>
                </div>



                <div class="row justify-content-end mt-4">
                    <div class="buttons mb-3 mt-4">
                        <button class="btn btn-primary" type="submit" id="btnGenerate">Generate</button>
                        <button class="btn btn-secondary" type="button" id="btnReset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer bg-whitesmoke">

        </div>
    </div>
</div>