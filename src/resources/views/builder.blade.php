<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Cruder Builder</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ asset('stisla') }}/library/select2/select2.min.css" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/components.css">


  <style>

    /* .validation-input{
        display: none;
    } */
    .validationrows{
        display: none;
    }
    #table th:last-child,
    #table td:last-child {
      padding-left: 0px;
      width: 30px;
    }

    #table th {
      padding: 15px 0px 15px 5px;
    }

    #table td {
      padding: 15px 0px 0px 5px;
    }

    #table th:nth-child(3),
    #table td:nth-child(3) {
      width: 100px;
    }

    #table th:nth-child(5),
    #table td:nth-child(5),
    #table th:nth-child(6),
    #table td:nth-child(6),
    #table th:nth-child(7),
    #table td:nth-child(7),
    #table th:nth-child(8),
    #table td:nth-child(8),
    #table th:nth-child(9),
    #table td:nth-child(9),
    #table th:nth-child(10),
    #table td:nth-child(10),
    #table th:nth-child(11),
    #table td:nth-child(11) {
      text-align: center;
    }

    .form-check-input {
      width: 16px;
      height: 16px;
    }

    .container {
        max-width: 1240px;
    }
  </style>
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="{{ route('cruder.github') }}" class="navbar-brand sidebar-gone-hide">Cruder</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="{{route('cms.api_list')}}" class="nav-link">Go to CMS</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <div class="d-sm-none d-lg-inline-block">Options</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Cruder</div>
              <a href="{{ route('cms.api_list') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> CMS
              </a>
              <a href="{{ route('cruder.builder') }}" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Builder
              </a>
              <a href="#swagger" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Swagger
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                  class="fas fa-fire"></i><span>Cruder</span></a>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link"><span>Generator Builder</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div id="info" style="display: none"></div>

          @include('cruder::builder_form')          
          <div class="row">
              <div class="col-md-6">
                @include('cruder::builder_from_schema')
              </div>
              <div class="col-md-6">
                @include('cruder::builder_rollback')
              </div>
          </div>
          
          

        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Developed By <a
            href="https://github.com/akcauser">akcauser</a> and <a href="https://github.com/mrvyldr">mrvyldr</a>
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('stisla') }}/js/stisla.js"></script>
  <script src="{{ asset('stisla') }}/library/select2/select2.full.min.js"></script>
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla') }}/js/scripts.js"></script>
  <script src="{{ asset('stisla') }}/js/custom.js"></script>
</body>

<script>
  $(document).ready(function () {
    var clicks = 1;

    var table_column_json_arr
    var tableSelect = getTablesFromDatabase().then( response =>
        table_column_json_arr = createTableColumnJsonArr(response)
    )
    var models
    var modelss = getModels().then( response =>
        models = response
    )

    $("#form").on("submit", function (e) {
      e.preventDefault();
      var fieldArr = [];
      var relationFieldArr = [];
      var validationsArr = getValidationInputs()
      var i=0;

      $('.item').each(function () {
        var htmlType = $(this).find('.htmlType-select2');
        var htmlValue = "";
        if ($(htmlType).val() == "select" || $(htmlType).val() == "radio") {
          htmlValue = $(this).find('.htmlType-select2').val() + ',' + $(this).find('.txtHtmlValue').val();
        } else {
          htmlValue = $(this).find('.htmlType-select2').val();
        }
        fieldArr.push({
          name: $(this).find('.fieldNameInput').val(),
          dbtype: $(this).find('.dbType-select2').val(),
          htmltype: htmlValue,
          //validations: $(this).find('.validationInput').val(),
          validations: validationsArr[i],
          foreignTable: $(this).find('.txtForeignTable').val(),
          nullable: $(this).find('.chkNullable').prop('checked'),
          searchable: $(this).find('.chkSearchable').prop('checked'),
          fillable: $(this).find('.chkFillable').prop('checked'),
          inIndex: $(this).find('.chkInIndex').prop('checked')
        });
        i++
      });
   
      $('.relationItem').each(function () {
        relationFieldArr.push({
          fieldName: $(this).find('.foreignFieldName').val(),
          relationType: $(this).find('.relationshipType-select2').val(),
          foreignModel: $(this).find('.foreignModel').val(),
          foreignTable: $(this).find('.foreignTableName').val(),
          foreignField: $(this).find('.foreignField').val(),
          foreignShowField: $(this).find('.foreignShowField').val(),
        });
      });
   
      var data = {
        modelName: $('#modelNameInput').val(),
        tableName: $('#customTableNameInput').val(),
        options: {
          softDelete: $('#chkDelete').prop('checked'),
          timestamps: $('#chkTimestamps').prop('checked'),
          paginate: $('#paginateInput').val(),
          forceMigrate: $('#chkForceMigrate').prop('checked'),
          swagger: $('#chkSwagger').prop('checked'),
        },
        fields: fieldArr,
        relationFields: relationFieldArr
      };
    
      data['_token'] = $('#token').val();

      $("#info").html("");
      $("#info").append('<div class="alert alert-success">Successfully created.</div>');
      $("#info").show();
      var $container = $("html,body");
      var $scrollTo = $('#info');
      $container.animate({ scrollTop: 0, scrollLeft: 0 }, 1000);
      setTimeout(function () {
        $('#info').fadeOut('slow');
      }, 1500);
      setTimeout(function () {
        //location.reload();
      }, 1501);

      $.ajax({
        type: "POST",
        url: "{!! route('cruder.generate') !!}",
        method: "POST",
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify(data),
        success: function (result) {
          $("#info").html("");
          $("#info").append('<div class="alert alert-success">Successfully created.</div>');
          $("#info").show();
          var $container = $("html,body");
          var $scrollTo = $('#info');
          $container.animate({ scrollTop: 0, scrollLeft: 0 }, 1000);
          setTimeout(function () {
            $('#info').fadeOut('slow');
          }, 1500);
          setTimeout(function () {
            //location.reload();
          }, 1501);
        },
        error: function (result) {
          var result = JSON.parse(JSON.stringify(result));
          var errorMessage = '';
          if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
            errorMessage = result.responseJSON.message;
          }
          $("#info").html("");
          $("#info").append('<div class="alert alert-success">Successfully created.</div>');
          $("#info").show();
          var $container = $("html,body");
          var $scrollTo = $('#info');
          $container.animate({ scrollTop: 0, scrollLeft: 0 }, 1000);
          setTimeout(function () {
            $('#info').fadeOut('slow');
          }, 1500);
          setTimeout(function () {
            //location.reload();
          }, 1501);
        }
      });
      return false;
    });

    $("#btnReset").fireModal({
      title: 'Are you sure?',
      footerClass: 'bg-whitesmoke',
      body: 'This will reset all of your fields. Do you want to proceed?',
      buttons: [
        {
          text: 'Confirm Reset',
          class: 'btn btn-danger btn-shadow',
          handler: function (modal) {
          }
        },
        {
          text: 'Cancel',
          class: 'btn btn-secondary btn-shadow',
          handler: function (modal) {
          }
        }
      ]
    });

    $("#addFieldButton").click(function () {
       
        if (clicks >= 1) {
            var tr_element = '<tr class="item">' +
              '<td>' +
              '<div class="form-group">' +
              '<input type="text" class="form-control fieldNameInput" required>' +
              '</div>' +
              '<div class="form-group">' +
              '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Foreign table,Primary key">' +
              '</div>' +
              '</td>' +
              '<td>' +
              create_select_dbtype() +
              '</td>' +
              '<td>' +
              '<div class="form-group">' +
              '<button class="btn btn-secondary" type="button" id="addMoreValidation-'+clicks+'" ><i class="fa fa-plus" aria-hidden="true"></i></button>' +
              '</div>' +
              '</td>' +
              '<td>' +
              create_select_html() +
              '</td>' +
              '<td>' +
              create_checkbox("chkNullable", "") +
              '</td>' +
              '<td>' +
              create_checkbox("chkSearchable", "checked") +
              '</td>' +
              '<td>' +
              create_checkbox("chkFillable", "checked") +
              '</td>' +
              '<td>' +
              create_checkbox("chkInIndex", "") +
              '</td>' +
              '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>' +
              '</div>' +
              '</td>' + '</tr>'+
              '<tr class="validationrows" id="validationrow-'+clicks+'">'+'<td colspan="9">'+
                '<div class="card card-warning validation-card">'+
                '<div class="card-body" id="validationarea-'+clicks+'">'+
                '</div>'+
                '</div>'+
              '</td>'+'</tr>'
              //create_validation_accordion(clicks);

            $('#table tbody').append(tr_element)
        
        } else if (clicks == 0) {

            var created_at_field = create_default_fields("created_at")
            var updated_at_field = create_default_fields("updated_at")
            var default_rows = created_at_field + updated_at_field
            
            $('#table tbody').append(default_rows)  
        }

        $("#addMoreValidation-"+clicks).on('click', function (e){   
            var button_id = this.id
            var row_id = button_id.split("-")[1]  
            var formElements = create_validation_fields()
            $('#validationarea-'+row_id ).append(formElements)
       
            $('.validation-select2').on('select2:select', function (e) {
                var data = e.params.data;
                
                if(data.text === "Max"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="number" class="form-control validation-input" placeholder="value" min="0" />'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Min"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="number" class="form-control validation-input" placeholder="value" min="0"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                        
                }else if(data.text === "After"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Before"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Between"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="min,max" pattern="[0-9]+,[0-9]+"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Date Format"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="format" />'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Different"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" placeholder="Choose field">' +
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();
                }else if(data.text === "Digits"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="value" pattern="[0-9]+"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Digits Between"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="min,max" pattern="[0-9]+,[0-9]+"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Regex"){
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="text" class="form-control validation-input" placeholder="pattern" />'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
         
                }else if(data.text === "Same"){
                
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }       

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" placeholder="Choose field">' +
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();
                }else if(data.text === "Size"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<input type="number" class="form-control validation-input" placeholder=value" pattern="[0-9]+"/>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                        
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                        
                }else if(data.text === "In"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();
                    

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
                    
                }else if(data.text === "Mimes"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..." />'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
       
                }else if(data.text === "Not In"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
       
                }else if(data.text === "Required If"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
                }else if(data.text === "Required With"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
       
                }else if(data.text === "Required With All"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
                    //    
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
       
                }else if(data.text === "Required Without"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
//
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)

                }else if(data.text === "Required Without All"){
              
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                    var fieldNameInputs = $(".fieldNameInput")
                    var options=""

                    for(var i=0; i<fieldNameInputs.length ; i++){
                        var data = fieldNameInputs[i].value
                        options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var fieldToBeAdd = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2" multiple="" data-placeholder="Choose field">' +
                                '<option></option>'+
                                options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(fieldToBeAdd)
                    $('select').select2();

                    //var fieldToBeAdd = 
                    //'<div class="col-sm-2">'+
                    //    '<div class="form-group">' +
                    //        '<input type="text" class="form-control validation-input" placeholder="foo,bar,..."/>'+
                    //    '</div>'+
                    //'</div>'
                    ////$(this).closest("div.validation-row").find("input").css("display", "block")
//
                    //$(this).closest("div.validation-row").append(fieldToBeAdd)
                    
                }else if(data.text === "Exists"){
                
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var table_select_options = ""

                    for(let i=0; i<table_column_json_arr.length ; i++){
                        let data = table_column_json_arr[i].table
                        table_select_options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var table_select = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2 exists-table-select2" data-placeholder="Choose table" required>' +
                                '<option></option>'+
                                table_select_options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                            
                    //$(this).closest("div.validation-row").find("input").css("display", "block")
                            
                    $(this).closest("div.validation-row").append(table_select)
                    $('select').select2();

                    $('.exists-table-select2').on('select2:select', function (e) {
                        if($(this).closest("div.validation-row")[0].childNodes.length > 3){
                            var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                            for (let index = number_of_elements-1; index >= 3; index--) {

                                $(this).closest("div.validation-row")[0].childNodes[index].remove()

                            }
                        }

                        var selectedTable = e.params.data.text;

                        var columns_select_options = ""

                        for(let i=0; i<table_column_json_arr.length ; i++){
                            if(selectedTable === table_column_json_arr[i].table){
                                let columns_arr = table_column_json_arr[i].columns
                                for (let y = 0; y < columns_arr.length; y++) {
                                    var element = columns_arr[y];
                                    columns_select_options += '<option value="'+element+'">'+element+'</option>'
                                }
                            }
                        }

                        var columns_select = 
                        '<div class="col-sm-2">'+
                            '<div class="form-group">' +
                                '<select class="form-control select2"  data-placeholder="Choose column">' +
                                    '<option></option>'+
                                    columns_select_options +
                                '</select>'+
                            '</div>'+
                        '</div>'
                                
                        $(this).closest("div.validation-row").append(columns_select)
                        $('select').select2();
                    })
                }else if(data.text === "Unique"){
                
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }

                    var table_select_options = ""

                    for(let i=0; i<table_column_json_arr.length ; i++){
                        let data = table_column_json_arr[i].table
                        table_select_options += '<option value="'+data+'">'+data+'</option>'
                    }

                    var table_select = 
                    '<div class="col-sm-2">'+
                        '<div class="form-group">' +
                            '<select class="form-control select2 unique-table-select2" data-placeholder="Choose table" required>' +
                                '<option></option>'+
                                table_select_options +
                            '</select>'+
                        '</div>'+
                    '</div>'
                            
                    //$(this).closest("div.validation-row").find("input").css("display", "block")


                            
                    $(this).closest("div.validation-row").append(table_select)
                    $('select').select2();

                    $('.unique-table-select2').on('select2:select', function (e) {


                        if($(this).closest("div.validation-row")[0].childNodes.length > 3){
                            var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                            for (let index = number_of_elements-1; index >= 3; index--) {

                                $(this).closest("div.validation-row")[0].childNodes[index].remove()

                            }
                        }
                        var selectedTable = e.params.data.text;

                        var columns_select_options = ""

                        for(let i=0; i<table_column_json_arr.length ; i++){
                            if(selectedTable === table_column_json_arr[i].table){
                                let columns_arr = table_column_json_arr[i].columns
                                for (let y = 0; y < columns_arr.length; y++) {
                                    var element = columns_arr[y];
                                    columns_select_options += '<option value="'+element+'">'+element+'</option>'
                                }
                            }
                        }

                        var columns_select = 
                        '<div class="col-sm-2">'+
                            '<div class="form-group">' +
                                '<select class="form-control select2"  data-placeholder="Choose column">' +
                                    '<option></option>'+
                                    columns_select_options +
                                '</select>'+
                            '</div>'+
                        '</div>'

                        //except
                        var models_select_options =""
                        for(let i=0; i<models.length ; i++){
                            let element = models[i]
                            models_select_options += '<option value="'+element+'">'+element+'</option>'
                        }
                
                        var models_select = 
                        '<div class="col-sm-2">'+
                            '<div class="form-group">' +
                                '<select class="form-control select2"  data-placeholder="Choose model">' +
                                    '<option></option>'+
                                    models_select_options +
                                '</select>'+
                            '</div>'+
                        '</div>'

                        var idColumn = 
                        '<div class="col-sm-2">'+
                            '<div class="form-group">' +
                                '<input type="text" class="form-control validation-input" placeholder="idColumn"/>'+
                            '</div>'+
                        '</div>'

                        var toBeAdded = columns_select + models_select + idColumn
                    
                        $(this).closest("div.validation-row").append(toBeAdded)
                        $('select').select2();
                    })


                }else{
                    if($(this).closest("div.validation-row")[0].childNodes.length > 2){
                        var number_of_elements = $(this).closest("div.validation-row")[0].childNodes.length

                        for (let index = number_of_elements-1; index >= 2; index--) {

                            $(this).closest("div.validation-row")[0].childNodes[index].remove()

                        }

                    }
                }
            });   

            
            $(".removeValidation").on('click', function (e){

                if($(this).closest('.card-body')[0] != undefined){
                    if($(this).closest('.card-body')[0].childNodes.length == 1){
                        $(this).closest('.validationrows').css("display","none")
                    }
                }


                $(this).closest('.validation-row').remove();
            })    
            var allValidations = $('.validation-row') 
            $('#validationrow-'+row_id).css("display","table-row")
            $('select').select2();
          
        })

        $('select').select2();
 
        clicks = clicks + 1;
    })

    function getModels(){

        return $.ajax({
            url: window.location.origin+"/cruder/models",
            type: 'GET',
            beforeSend: function(){
                
            },
            error: function (response){
            
            },
            success: function (response, status, jqXHR) {
            }
        
        })
    }
    function getValidationInputs(){
        var validationsArr = []
        var validation_card = $(".validation-card")

        for(var i=0; i<validation_card.length; i++){
            var validation_string = ""
            var validations = $(validation_card[i]).find(".validation-row")
           
            for(var y=0; y<validations.length; y++){

                var data=validations[y]
                var childLength = $(data)[0].children.length
                
                if(childLength == 2){
                   
                    var select_data = $(data).find("select").val()
                    validation_string += select_data + "|"

                }else if(childLength == 3){
                   
                    //if($(data)[0].children.length == 2){

                        if($(data)[0].children[1].children[0].children[0].nodeName === "SELECT" &&
                            $(data)[0].children[2].children[0].children[0].nodeName === "INPUT"){

                            var select_data = $(data).find("select").val()
                            var input_data = $(data).find("input").val()

                            validation_string += select_data + input_data + "|"

                        }else if($(data)[0].children[1].children[0].children[0].nodeName === "SELECT" &&
                        $(data)[0].children[2].children[0].children[0].nodeName === "SELECT"){

                       
                            if($(data)[0].children[1].children[0].children[0].value === "in:" || 
                            $(data)[0].children[1].children[0].children[0].value === "mimes:" ||
                            $(data)[0].children[1].children[0].children[0].value === "not_in:" ||
                            $(data)[0].children[1].children[0].children[0].value === "required_with:" ||
                            $(data)[0].children[1].children[0].children[0].value === "required_with_all:" ||
                            $(data)[0].children[1].children[0].children[0].value === "required_without:" ||
                            $(data)[0].children[1].children[0].children[0].value === "required_without_all:"
                            ){
                                //burada select_data2 den gelen valueların array gelmesi lazım
                                var select_data1 = $(data)[0].children[1].children[0].children[0].value

                                var optionList=$(data)[0].children[2].children[0].children[0].childNodes
                                var selectedValues=""
                                for (let index = 0; index < optionList.length; index++) {
                                    var element = optionList[index];
                  
                                    if(element.selected == true){
                                        selectedValues += element.text + ","
                                    }
                                    
                                }
                                if(selectedValues.slice(-1) === ","){
                                    selectedValues = selectedValues.slice(0,-1)
                                }

                                //var select_data2 = $(data)[0].children[2].children[0].children[0].value
                      
                                validation_string += select_data1 + selectedValues + "|"
                            }else{
                                var select_data1 = $(data)[0].children[1].children[0].children[0].value
                                var select_data2 = $(data)[0].children[2].children[0].children[0].value

                                validation_string += select_data1 + select_data2 + "|"
                            }

                            
                        }
                    //}
                    
                }else{
                        
                    if($(data)[0].children[1].children[0].children[0].nodeName === "SELECT" &&
                        $(data)[0].children[2].children[0].children[0].nodeName === "SELECT" &&
                        $(data)[0].children[3].children[0].children[0].nodeName === "INPUT"){

                        var select_data1 = $(data)[0].children[1].children[0].children[0].value
                        var select_data2 = $(data)[0].children[2].children[0].children[0].value
                        var input_data =  $(data)[0].children[3].children[0].children[0].value
                        validation_string += select_data1 + select_data2 + "," + input_data + "|"

                    }else if($(data)[0].children[1].children[0].children[0].nodeName === "SELECT" &&
                        $(data)[0].children[2].children[0].children[0].nodeName === "SELECT" &&
                        $(data)[0].children[3].children[0].children[0].nodeName === "SELECT"){

                        var select_data1 = $(data)[0].children[1].children[0].children[0].value
                        var select_data2 = $(data)[0].children[2].children[0].children[0].value
                        var select_data3 =  $(data)[0].children[3].children[0].children[0].value

                        if(select_data1 === "unique:"){
                            if(select_data3 === ""){
                                var validation_tr = $(data).closest("tr")
                                select_data3 = $(validation_tr).closest('tr').prev()[0].cells[0].childNodes[0].childNodes[0].value
                            }
                        }

                        if(select_data3 !== ""){
                            validation_string += select_data1 + select_data2 + "," + select_data3 + "|"
                        }else{
                            validation_string += select_data1 + select_data2 + "|"
                        }
                        
                    }
                }
            }
            if(validation_string.slice(-1) === "|"){
                validation_string = validation_string.slice(0,-1)
            }
            
            validationsArr.push(validation_string)
        }
        return validationsArr
    }

    function createTableColumnJsonArr(response){
        var arr = []
        for (let i = 0; i < response.length; i++) {
            let tableName = response[i];
            getColumnsFromTables(tableName).then( response2 => {
           
                var jsonObj = {
                    table: tableName,
                    columns: response2
                }

                arr.push(jsonObj)
            });
            
        }
        return arr;
    }

    function getTablesFromDatabase(){
        return $.ajax({
            url: window.location.origin+"/cruder/tables",
            type: 'GET',
            beforeSend: function(){
                
            },
            error: function (response){
            
            },
            success: function (response, status, jqXHR) {
            
                //return response;
            }
        
        })
    }

    function getColumnsFromTables(tableName){
        return $.ajax({
            url: window.location.origin+"/cruder/tables/"+tableName+"/columns",
            type: 'GET',
            beforeSend: function(){
                
            },
            error: function (response){
            
            },
            success: function (response, status, jqXHR) {
                //return response;
            }
        
        })
    }

    function create_validation_fields(){

        var formElement =
        '<div class="row mt-4 validation-row">'+
            '<div>'+
                '<button class="btn btn-icon btn-danger removeValidation" type="button"><i class="fas fa-times" aria-hidden="true"></i></button>'+
            '</div>'+
            '<div class="col-sm-3">'+
                '<div class="form-group">' +
                    '<select class="form-control select2 validation-select2" data-placeholder="Choose validation">' +
                    '<option></option>'+
                    '<option value="required" title="The field under validation must be present in the input data.">Required</option>' +
                    '<option value="required_if" title="The field under validation must be present if the field is equal to any value.">Required If</option>' +
                    '<option value="required_with" title="The field under validation must be present only if any of the other specified fields are present.">Required With</option>' +
                    '<option value="required_with_all" title="The field under validation must be present only if all of the other specified fields are present.">Required With All</option>' +
                    '<option value="required_without:" title="The field under validation must be present only when any of the other specified fields are not present.">Required Without</option>' +
                    '<option value="required_without_all:" title="The field under validation must be present only when all of the other specified fields are not present.">Required Without All</option>' +
                    '<option value="integer" title="The field under validation must have an integer value.">Integer</option>' +
                    '<option value="string" title="The field under validation must be a string type.">String</option>' +
                    '<option value="timezone" title="The field under validation must be a valid timezone identifier according to the timezone_identifiers_list PHP function.">Timezone</option>' +
                    '<option value="unique:" title="The field under validation must be unique on a given database table. If the column option is not specified, the field name will be used.">Unique</option>' +
                    '<option value="max:" title="The field under validation must be less than or equal to a maximum value. ">Max</option>' +
                    '<option value="min:" title="The field under validation must have a minimum value. ">Min</option>' +
                    '<option value="accepted" title="The field under validation must be yes, on, 1, or true. ">Accepted</option>' +
                    '<option value="active_url" title="The field under validation must be a valid URL according to the checkdnsrr PHP function.">Active URL</option>' +
                    '<option value="after:" title="The field under validation must be a value after a given date. ">After</option>' +
                    '<option value="before:" title="The field under validation must be a value preceding the given date. ">Before</option>' +
                    '<option value="alpha" title="The field under validation must be entirely alphabetic characters.">Alpha</option>' +
                    '<option value="alpha_dash" title="The field under validation may have alpha-numeric characters, as well as dashes and underscores.">Alpha Dash</option>' +
                    '<option value="alpha_num" title="The field under validation must be entirely alpha-numeric characters.">Alpha Num</option>' +
                    '<option value="array" title="The field under validation must be of type array.">Array</option>' +
                    '<option value="between:" title="The field under validation must have a size between the given min and max.">Between</option>' +
                    '<option value="boolean" title="The field under validation must be able to be cast as a boolean.">Boolean</option>' +
                    '<option value="confirmed" title="The field under validation must have a matching field of foo_confirmation.">Confirmed</option>' +
                    '<option value="date" title="The field under validation must be a valid date according to the strtotime PHP function.">Date</option>' +
                    '<option value="date_format" title="The field under validation must match the format defined according to the date_parse_from_format PHP function.">Date Format</option>' +
                    '<option value="different:" title="The given field must be different than the field under validation.">Different</option>' +
                    '<option value="digits:" title="The field under validation must be numeric and must have an exact length of value.">Digits</option>' +
                    '<option value="digits_between:" title="The field under validation must have a length between the given min and max.">Digits Between</option>' +
                    '<option value="email" title="The field under validation must be formatted as an e-mail address.">Email</option>' +
                    '<option value="exists:" title="The field under validation must exist on a given database table.">Exists</option>' +
                    '<option value="image" title="The file under validation must be an image (jpeg, png, bmp, gif, or svg)">Image</option>' +
                    '<option value="in:" title="The field under validation must be included in the given list of values.">In</option>' +
                    '<option value="not_in:" title="The field under validation must not be included in the given list of values.">Not In</option>' +
                    '<option value="ip" title="The field under validation must be formatted as an IP address.">Ip</option>' +
                    '<option value="mimes:" title="The file under validation must have a MIME type corresponding to one of the listed extensions.">Mimes</option>' +
                    '<option value="numeric" title="The field under validation must have a numeric value.">Numeric</option>' +
                    '<option value="regex:" title="The field under validation must match the given regular expression.">Regex</option>' +
                    '<option value="same:" title="The given field must match the field under validation.">Same</option>' +
                    '<option value="size:" title="The field under validation must have a size matching the given value.">Size</option>' +
                    '<option value="url" title="The field under validation must be formatted as an URL.">URL</option>' +
                    '</select>' +
                    '<div id="tooltip_container"></div>'+
                '</div>'+
            '</div>'+
            //'<div class="col-sm-6">'+
            //    '<div class="form-group">' +
            //        '<input type="text" class="form-control validation-input">'+
            //    '</div>'+
            //'</div>' +
        '</div>'

        return formElement;
    }

    $("#addRelationshipButton").on('click', function (e) {

      var tr_element = '<tr class="relationItem" >' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignFieldName" required>' +
        '</div>' +
        '</td>' +
        '<td>' +
        addRelationSelectToRelationshipTable() +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignModel" required>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignTableName" required>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignField">' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignShowField">' +
        '</div>' +
        '</td>' +
        '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>' +
        '</div>' +
        '</td>' + '</tr>'




      $('#relationShipTable tbody').append(tr_element);
      $('select').select2();
    })

    $(document).on('click', '.remove', function (e) {
      $(this).parents('tr').remove();
    });

    function create_default_fields(value) {
      var field = '<tr class="item">' +
        '<td>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control fieldNameInput" value="' + value + '" required>' +
        '</div>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Foreign table,Primary key">' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group" style="width: 130px;">' +
        '<select class="form-control select2 dbType-select2">' +
        '<option value="increments">Increments</option>' +
        '<option value="integer">Integer</option>' +
        '<option value="smallInteger">SmallInteger</option>' +
        '<option value="longText">LongText</option>' +
        '<option value="bigInteger">BigInteger</option>' +
        '<option value="double">Double</option>' +
        '<option value="float">Float</option>' +
        '<option value="decimal">Decimal</option>' +
        '<option value="boolean">Boolean</option>' +
        '<option value="string">String</option>' +
        '<option value="char">Char</option>' +
        '<option value="text">Text</option>' +
        '<option value="mediumText">MediumText</option>' +
        '<option value="longText">LongText</option>' +
        '<option value="enum">Enum</option>' +
        '<option value="binary">Binary</option>' +
        '<option value="dateTime">DateTime</option>' +
        '<option value="date">Date</option>' +
        '<option selected value="timestamp">Timestamp</option>' +
        '</select>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group">' +
        '<button class="btn btn-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>' +
        '</div>' +
        '</td>' +
        '<td>' +
        '<div class="form-group" style="width: 130px;">' +
        '<select class="form-control select2 htmlType-select2">' +
        '<option value="text">Text</option>' +
        '<option value="email">Email</option>' +
        '<option value="number">Number</option>' +
        '<option selected value="date">Date</option>' +
        '<option value="file">File</option>' +
        '<option value="password">Password</option>' +
        '<option value="select">Select</option>' +
        '<option value="radio">Radio</option>' +
        '<option value="checkbox">Checkbox</option>' +
        '<option value="textarea">TextArea</option>' +
        '<option value="toggle-switch">Toggle</option>' +
        '</select>' +
        '</div>' +
        '</td>' +
        '<td>' +
        create_checkbox("chkNullable", "") +
        '</td>' +
        '<td>' +
        create_checkbox("chkSearchable", "checked") +
        '</td>' +
        '<td>' +
        create_checkbox("chkFillable", "checked") +
        '</td>' +
        '<td>' +
        create_checkbox("chkInIndex", "") +
        '</td>' +
        '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>' +
        '</div>' +
        '</td>' + '</tr>'

      return field;
    }
    function create_input_text_empty_value() {
      var field = '<div class="form-group">' +
        '<input type="text" class="form-control fieldNameInput" required>' +
        '</div>'

      return field;
    }
    function create_select_dbtype() {
      var field = '<div class="form-group" style="width: 130px;">' +
        '<select class="form-control select2 dbType-select2">' +
        '<option value="increments">Increments</option>' +
        '<option value="integer">Integer</option>' +
        '<option value="smallInteger">SmallInteger</option>' +
        '<option value="longText">LongText</option>' +
        '<option value="bigInteger">BigInteger</option>' +
        '<option value="double">Double</option>' +
        '<option value="float">Float</option>' +
        '<option value="decimal">Decimal</option>' +
        '<option value="boolean">Boolean</option>' +
        '<option value="string">String</option>' +
        '<option value="char">Char</option>' +
        '<option value="text">Text</option>' +
        '<option value="mediumText">MediumText</option>' +
        '<option value="longText">LongText</option>' +
        '<option value="enum">Enum</option>' +
        '<option value="binary">Binary</option>' +
        '<option value="dateTime">DateTime</option>' +
        '<option value="date">Date</option>' +
        '<option value="timestamp">Timestamp</option>' +
        '</select>' +
        '</div>'

      return field;
    }
    function create_select_html() {
      var field = '<div class="form-group" style="width: 130px;">' +
        '<select class="form-control select2 htmlType-select2">' +
        '<option value="text">Text</option>' +
        '<option value="email">Email</option>' +
        '<option value="number">Number</option>' +
        '<option value="date">Date</option>' +
        '<option value="file">File</option>' +
        '<option value="password">Password</option>' +
        '<option value="select">Select</option>' +
        '<option value="radio">Radio</option>' +
        '<option value="checkbox">Checkbox</option>' +
        '<option value="textarea">TextArea</option>' +
        '<option value="toggle-switch">Toggle</option>' +
        '</select>' +
        '</div>'

      return field;
    }
    function create_checkbox(className, ischecked) {
      var field = '<div class="form-group">' +
        '<div class="form-check">' +
        '<input class="form-check-input ' + className + '"' +
        'type="checkbox" ' + ischecked + '>' +
        '</div>' +
        '</div>'

      return field;
    }
    function addRelationSelectToRelationshipTable() {
      var selectString = '<div class="form-group">' +
        '<select class="form-control select2 relationshipType-select2" >' +
        '<option value="1t1">One to One</option>' +
        '<option value="1tm">One to Many</option>' +
        '<option value="mtm" disabled>Many to Many(future)</option>' +
        '</select>' +
        '<div class="form-group">' +
        '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Custom Table Name"/>' +
        '</div>' +
        '</div>'


      return selectString;
    }

  });

</script>

</html>