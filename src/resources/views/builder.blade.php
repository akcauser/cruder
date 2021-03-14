<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Cruder</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("dist/css/adminlte.min.css") }}>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div class="content-wrapper" style="margin-left: 0px; min-height: fit-content;">
        <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Cruder</h1>
                </div>
              </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">Generator Builder</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label style="padding-top: 1%;">Model name</label>
                                      <input type="text" class="form-control" id="modelNameInput" placeholder="Enter model name" 
                                      style="display: inline-block;
                                      max-width: 400px;
                                      margin-right: 15%;
                                      float: right;">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label style="padding-top: 1%;">Custom table name</label>
                                      <input type="text" class="form-control" id="customTableNameInput" placeholder="Enter custom table name"
                                      style="display: inline-block;
                                        max-width: 400px;
                                        margin-right: 5%;
                                        float: right;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                      <label style="padding-top: 1%;">Options</label>

                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkDelete">
                                          <label class="form-check-label">Soft delete</label>
                                        </div>
                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkSave">
                                          <label class="form-check-label">Save schema</label>
                                        </div>
                                        <div class="form-check" style="max-width:20%">
                                            <input class="form-check-input" type="checkbox" id="chkSwagger">
                                            <label class="form-check-label">Swagger</label>
                                        </div>
                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkTestCases">
                                          <label class="form-check-label">Test cases</label>
                                        </div>
                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkDataTable">
                                          <label class="form-check-label">Datatables</label>
                                        </div>
                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkMigration">
                                          <label class="form-check-label">Migration</label>
                                        </div>
                                        <div class="form-check" style="max-width: 20%">
                                          <input class="form-check-input" type="checkbox" id="chkForceMigrate">
                                          <label class="form-check-label">Force migrate</label>
                                        </div>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label style="padding-top: 1%;">Prefix</label>
                                      <input type="text" class="form-control" id="prefixInput" placeholder="Enter prefix">
                                </div>
                                <div class="form-group col-md-3">
                                    <label style="padding-top: 1%;">Paginate</label>
                                      <input type="text" class="form-control" id="paginateInput">
                                </div>
                            </div>

                            <div class="row">
                              <table class="table table-striped table-bordered" id="table">
                                <thead class="no-border">
                                  <tr>
                                    <th>Field Name</th>
                                    <th>DB Type</th>
                                    <th>Validations</th>
                                    <th>Html Type</th>
                                    <th>Primary</th>
                                    <th>Is Foreign</th>
                                    <th>Searchable</th>
                                    <th>Fillable</th>
                                    <th>In Form</th>
                                    <th>In Index</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody class="no-border-x no-border-y">

                                </tbody>
                              </table>
                            </div>


                            <div class="row">
                              <div class="form-group" style="padding-left: 10px">
                                <button type="button" class="btn btn-default " id="addFieldButton" style="background-color:#ffc107; color:white;">Add field</button>
                              </div>
                              <div class="form-group" style="padding-left: 10px">
                                <button type="button" class="btn btn-default " id="addPrimaryButton" style="background-color:#ffc107; color:white;">Add primary</button>
                              </div>
                              <div class="form-group" style="padding-left: 10px">
                                <button type="button" class="btn btn-default " id="addTimestampButton" style="background-color:#ffc107; color:white;">Add timestamps</button>
                              </div>
                              <div class="form-group" style="padding-left: 10px">
                                <button type="button" class="btn btn-default " id="addRelationshipButton" style="background-color:#ffc107; color: white">Add relationship</button>
                              </div>       
                            </div>

                            <div class="row" id="relationShip" style="margin-top:35px;display: none">
                              <table class="table table-striped table-bordered" id="relationShipTable">
                                  <thead class="no-border">
                                  <tr>
                                      <th>Relation Type</th>
                                      <th>Foreign Model<span class="required">*</span></th>
                                      <th>Foreign Key</th>
                                      <th>Local Key</th>
                                      <th></th>
                                  </tr>
                                  </thead>
                                  <tbody id="rsContainer" class="no-border-x no-border-y">
      
                                  </tbody>
                              </table>
                            </div>

                            <div class="row" style="float: right">
                              <div class="form-inline" style="padding:15px 15px;">
                                <div class="form-group" style="padding-left: 10px">
                                    <button type="submit" class="btn btn-block btn-primary" id="btnGenerate">Generate
                                    </button>
                                </div>
                                <div class="form-group" style="padding-left: 10px">
                                    <button type="button" class="btn btn-block btn-secondary" id="btnReset" data-toggle="modal"
                                            data-target="#confirm-delete"> Reset
                                    </button>
                                </div>
                              </div>
                            </div>

                            <div class="modal fade show" id="confirm-delete" style="display: none; padding-right: 16px;" aria-modal="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Confirm Reset</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>This will reset all of your fields. Do you want to proceed?</p>
                                  </div>
                                  <div class="modal-footer justify-content-right">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Reset</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                        </form>

                        
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
            </div>

        </div>


        <div class="container-fluid">
          <div class="row justify-content-md-center">
              <div class="col-md-10">
                  <!-- general form elements disabled -->
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Rollback</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form role="form">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="RBModelNameInput" style="padding-top: 1%;">Model name</label>
                                    <input type="text" class="form-control" id="RBModelNameInput" placeholder="Enter name" required
                                    style="display: inline-block;
                                    max-width: 400px;
                                    margin-right: 15%;
                                    float: right;">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="RBPrefixInput" style="padding-top: 1%;">Prefix</label>
                                    <input type="text" class="form-control" id="RBPrefixInput" placeholder="Enter prefix"
                                    style="display: inline-block;
                                      max-width: 400px;
                                      margin-right: 5%;
                                      float: right;">
                                  </div>
                              </div>
                          </div>

                          <div class="row" style="float: right">
                            <div class="form-inline" style="padding:15px 15px;">
                              <div class="form-group" style="padding-left: 10px">
                                  <button type="submit" class="btn btn-block btn-primary" id="btnRollback">Rollback
                                  </button>
                              </div>
                            </div>
                          </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
          </div>

        </div>

        <div class="container-fluid">
          <div class="row justify-content-md-center">
              <div class="col-md-10">
                  <!-- general form elements disabled -->
                  <div class="card card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Generate CRUD From Schema</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <form role="form">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="SmModelNameInput" style="padding-top: 1%;">Model name</label>
                                    <input type="text" class="form-control" id="SmModelNameInput" placeholder="Enter name" required
                                    style="display: inline-block;
                                    max-width: 400px;
                                    margin-right: 15%;
                                    float: right;">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <!-- <label for="customFile">Custom File</label> -->
              
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="schemaFile">
                                    <label class="custom-file-label" for="schemaFile">Choose file</label>
                                  </div>
                                </div>
                              </div>
                          </div>

                          <div class="row" style="float: right">
                            <div class="form-inline" style="padding:15px 15px;">
                              <div class="form-group" style="padding-left: 10px">
                                  <button type="submit" class="btn btn-block btn-primary" id="btnSmGenerate">Generate
                                  </button>
                              </div>
                            </div>
                          </div>
                      </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
          </div>

        </div>
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("dist/js/adminlte.min.js") }}></script>
</body>

<script>
  $(document).ready(function () {

    var htmlStr = '<tr class="item" style="display: table-row;"></tr>';


    $("#addFieldButton").on('click', function(e){

      var tr_element ='<tr>'+'<td>'+
                      '<input type="text" class="form-control fieldNameInput" placeholder="Enter custom table name">'+
                      '</td>'+
                      '<td>'+
                      addDbTypeSelectToTable()+
                      '</td>'+
                      '<td>'+
                      '<input type="text" class="form-control dabValueInput" placeholder="Enter custom table name">'+
                      '</td>'+
                      '<td>'+
                      addHtmlTypeSelectToTable()+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkPrimary", "")+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkForeign", "")+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkSearchable","checked")+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkFillable","checked")+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkInForm","checked")+
                      '</td>'+
                      '<td>'+
                        addCheckboxToTable("chkInIndex","checked")+
                      '</td>'+
                      '<td><i class="remove fa fa-trash-o" style="cursor: pointer;font-size: 20px;color: red"></i></td>'+
                      '</div>'+
                    '</td>'+'</tr>'
      
      

      $('#table tbody').append(tr_element)

    })

    $("#addPrimaryButton").on('click', function(e){

      var tr_element ='<tr>'+'<td>'+
                '<input type="text" class="form-control fieldNameInput" placeholder="Enter custom table name">'+
                '</td>'+
                '<td>'+
                addDbTypeSelectToTable()+
                '</td>'+
                '<td>'+
                '<input type="text" class="form-control dabValueInput" placeholder="Enter custom table name">'+
                '</td>'+
                '<td>'+
                addHtmlTypeSelectToTable()+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkPrimary", "checked")+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkForeign", "")+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkSearchable","")+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkFillable","")+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkInForm","")+
                '</td>'+
                '<td>'+
                  addCheckboxToTable("chkInIndex","")+
                '</td>'+
                '<td><i class="remove fa fa-trash-o" style="cursor: pointer;font-size: 20px;color: red"></i></td>'+
                '</div>'+
              '</td>'+'</tr>'



      $('#table tbody').append(tr_element)

    })

    $("#addTimestampButton").on('click', function(e){

      var tr_element ='<tr>'+'<td>'+
          '<input type="text" class="form-control fieldNameInput" placeholder="Enter custom table name">'+
          '</td>'+
          '<td>'+
          addDbTypeSelectToTable()+
          '</td>'+
          '<td>'+
          '<input type="text" class="form-control dabValueInput" placeholder="Enter custom table name">'+
          '</td>'+
          '<td>'+
          addHtmlTypeSelectToTable()+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkPrimary", "")+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkForeign", "")+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkSearchable","")+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkFillable","")+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkInForm","")+
          '</td>'+
          '<td>'+
            addCheckboxToTable("chkInIndex","")+
          '</td>'+
          '<td><i class="remove fa fa-trash-o" style="cursor: pointer;font-size: 20px;color: red"></i></td>'+
          '</div>'+
        '</td>'+'</tr>'



      $('#table tbody').append(tr_element)

    })
    
    
    $("#addRelationshipButton").on('click', function(e){
      $("#relationShip").show();
      var tr_element ='<tr>'+'<td>'+
                      addRelationSelectToRelationshipTable()+
                      '</td>'+
                      '<td>'+
                        '<input type="text" class="form-control txtForeignModel" placeholder="Enter custom table name">'+
                      '</td>'+
                      '<td>'+
                        '<input type="text" class="form-control txtForeignKey" placeholder="Enter custom table name">'+
                      '</td>'+
                      '<td>'+
                        '<input type="text" class="form-control txtLocalKey" placeholder="Enter custom table name">'+
                      '</td>'+
                      '<td><i class="remove fa fa-trash-o" style="cursor: pointer;font-size: 20px;color: red"></i></td>'+
                      '</div>'+
                    '</td>'+'</tr>'

      $('#relationShipTable tbody').append(tr_element)

    })


    $(document).on('click', '.remove', function(e) {
      $(this).parents('tr').remove();
    });

    function addRelationSelectToRelationshipTable(){
      var selectString='<select class="form-control select2 select2-hidden-accessible relationshipType-select2" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                        '<option value="1t1">One to One</option>'+
                        '<option value="1tm">One to Many</option>'+
                        '<option value="mt1">Many to One</option>'+
                        '<option value="mtm">Many to Many</option>'+
                        '</select>'+
                        '<input type="text"  class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Custom Table Name"/>'
      return selectString;
    }
    function addCheckboxToTable(className, ischecked){
      var chckboxString =  '<div class="form-group">'+
                              '<div class="form-check" style="max-width: 20%">'+
                                '<input class="form-check-input'+
                                className+
                                '" type="checkbox"'+ischecked+'>'+
                              '</div>'+
                            '</div>'
      return chckboxString;
    }

    function addHtmlTypeSelectToTable(){
      var selectString = '<select class="form-control select2 select2-hidden-accessible htmlType-select2" style="width: 100%">'
                            '<option value="text">Text</option>'+
                            '<option value="email">Email</option>'+
                            '<option value="number">Number</option>'+
                            '<option value="date">Date</option>'+
                            '<option value="file">File</option>'+
                            '<option value="password">Password</option>'+
                            '<option value="select">Select</option>'+
                            '<option value="radio">Radio</option>'+
                            '<option value="checkbox">Checkbox</option>'+
                            '<option value="textarea">TextArea</option>'+
                            '<option value="toggle-switch">Toggle</option>'+
                          '</select>'+
                          '<input type="text" class="form-control htmlValue txtHtmlValue" style="display: none"/>'
      return selectString;
    }

    function addDbTypeSelectToTable(){
      var selectString='<select class="form-control select2 select2-hidden-accessible dbType-select2" style="width: 100%;" tabindex="-1" aria-hidden="true">'+
                          '<option value="increments">Increments</option>'+
                          '<option value="integer">Integer</option>'+
                          '<option value="smallInteger">SmallInteger</option>'+
                          '<option value="longText">LongText</option>'+
                          '<option value="bigInteger">BigInteger</option>'+
                          '<option value="double">Double</option>'+
                          '<option value="float">Float</option>'+
                          '<option value="decimal">Decimal</option>'+
                          '<option value="boolean">Boolean</option>'+
                          '<option value="string">String</option>'+
                          '<option value="char">Char</option>'+
                          '<option value="text">Text</option>'+
                          '<option value="mediumText">MediumText</option>'+
                          '<option value="longText">LongText</option>'+
                          '<option value="enum">Enum</option>'+
                          '<option value="binary">Binary</option>'+
                          '<option value="dateTime">DateTime</option>'+
                          '<option value="date">Date</option>'+
                          '<option value="timestamp">Timestamp</option>'+
                        '</select>'
      return selectString;
    }
  });
     
</script>
</html>
