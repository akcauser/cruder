<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Cruder Builder</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet"  href="{{ asset('stisla') }}/lib/select2/select2.min.css"/>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/components.css">


  <style>
    #table th:last-child, #table td:last-child{
      padding-left: 0px;
      width: 30px;
    }
    #table th {
      padding: 15px 0px 15px 5px;
    }
    #table td {
      padding: 15px 0px 0px 5px;
    }
    #table th:nth-child(3), #table td:nth-child(3) {
      width: 100px;
    }

    #table th:nth-child(5), #table td:nth-child(5),
    #table th:nth-child(6), #table td:nth-child(6),
    #table th:nth-child(7), #table td:nth-child(7),
    #table th:nth-child(8), #table td:nth-child(8),
    #table th:nth-child(9), #table td:nth-child(9),
    #table th:nth-child(10),#table td:nth-child(10),
    #table th:nth-child(11),#table td:nth-child(11) {
      text-align: center;
    }
    .form-check-input{
      width: 16px;
      height: 16px;
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
            <li class="nav-item active"><a href="{{route('cms.index')}}" class="nav-link">Go to CMS</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Options</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Cruder</div>
              <a href="{{ route('cms.index') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> CMS
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
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Cruder</span></a>
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
          <!--
          @include('cruder::builder_rollback')
          -->
          @include('cruder::builder_from_schema')

        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Developed By <a href="https://github.com/akcauser">akcauser</a> and <a href="https://github.com/mrvyldr">mrvyldr</a>
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('stisla') }}/js/stisla.js"></script>
  <script src="{{ asset('stisla') }}/lib/select2/select2.full.min.js"></script>
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla') }}/js/scripts.js"></script>
  <script src="{{ asset('stisla') }}/js/custom.js"></script>
</body>

<script>
  $(document).ready(function () {
    var clicks = 0;

    $("#form").on("submit", function (e) {
          e.preventDefault();
          var fieldArr = [];
          var relationFieldArr = [];
          console.log("item->",$('.item'))
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
                  validations: $(this).find('.validationInput').val(),
                  foreignTable: $(this).find('.txtForeignTable').val(),
                  nullable: $(this).find('.chkNullable').prop('checked'),
                  searchable: $(this).find('.chkSearchable').prop('checked'),
                  fillable: $(this).find('.chkFillable').prop('checked'),
                  inIndex: $(this).find('.chkInIndex').prop('checked')
              });
          });
       
          $('.relationItem').each(function () {
              relationFieldArr.push({
                  relationType: $(this).find('.relationshipType-select2').val(),
                  foreignModel: $(this).find('.txtForeignModel').val(),
                  foreignTable: $(this).find('.txtForeignTable').val(),
                  foreignKey: $(this).find('.txtForeignKey').val(),
                  localKey: $(this).find('.txtLocalKey').val(),
              });
          });
          console.log("fieldArr: ", fieldArr)
          var data = {
              modelName: $('#modelNameInput').val(),
              tableName: $('#customTableNameInput').val(),
              options: {
                  softDelete: $('#chkDelete').prop('checked'),
                  timestamps: $('#chkTimestamps').prop('checked'),
                  save: $('#chkSave').prop('checked'),
                  //prefix: $('#prefixInput').val(),
                  paginate: $('#paginateInput').val(),
                  forceMigrate: $('#chkForceMigrate').prop('checked'),
                  swagger: $('#chkSwagger').prop('checked'),
              },
              fields: fieldArr,
              relations: relationFieldArr
          };
          console.log("data , ", data)
          data['_token'] = $('#token').val();

          $("#info").html("");
          $("#info").append('<div class="alert alert-success">Successfully created.</div>');
          $("#info").show();
          var $container = $("html,body");
          var $scrollTo = $('#info');
          $container.animate({scrollTop: 0, scrollLeft: 0},1000);
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
                 $container.animate({scrollTop: 0, scrollLeft: 0},1000);
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
                 $container.animate({scrollTop: 0, scrollLeft: 0},1000);
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
          handler: function(modal) {
          }
        },
        {
          text: 'Cancel',
          class: 'btn btn-secondary btn-shadow',
          handler: function(modal) {
          }
        }
      ]
    });

    $("#addFieldButton").click(function() {
      clicks = 1;
      if(clicks >= 1){
        var tr_element ='<tr class="item">'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control fieldNameInput" required>'+
            '</div>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Foreign table,Primary key">'+
            '</div>'+
          '</td>'+
          '<td>'+
            create_select_dbtype()+
          '</td>'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control validationInput">'+
            '</div>'+
          '</td>'+
          '<td>'+
            create_select_html()+
          '</td>'+
          '<td>'+
            create_checkbox("chkNullable", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkSearchable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkFillable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInIndex","")+
          '</td>'+
          '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>'+
          '</div>'+
          '</td>'+'</tr>'

          $('#table tbody').append(tr_element)
      }else if(clicks == 0){
        
        var created_at_field = create_default_fields("created_at")
        var updated_at_field = create_default_fields("updated_at")
        var default_rows = created_at_field + updated_at_field
        
     
        $('#table tbody').append(default_rows)
      }
      $('select').select2();
      clicks = clicks + 1;
    })

    $("#addRelationshipButton").on('click', function(e){  

      var tr_element ='<tr class="relationItem" >'+'<td>'+
          addRelationSelectToRelationshipTable()+
          '</td>'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control txtForeignModel" required>'+
            '</div>'+
          '</td>'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control txtForeignKey">'+
            '</div>'+
          '</td>'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control txtLocalKey">'+
            '</div>'+
          '</td>'+
          '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>'+
          '</div>'+
          '</td>'+'</tr>'
            
          
          
      
          $('#relationShipTable tbody').append(tr_element);
          $('select').select2();
    })

    $(document).on('click', '.remove', function(e) {
          $(this).parents('tr').remove();
    });

    function create_default_fields(value){
      var field = '<tr class="item">'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control fieldNameInput" value="'+value+'" required>'+
            '</div>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Foreign table,Primary key">'+
            '</div>'+
          '</td>'+
          '<td>'+
            '<div class="form-group" style="width: 130px;">'+
              '<select class="form-control select2 dbType-select2">'+
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
                '<option selected value="timestamp">Timestamp</option>'+
              '</select>'+
            '</div>'+
          '</td>'+
          '<td>'+
            '<div class="form-group">'+
              '<input type="text" class="form-control validationInput">'+
            '</div>'+
          '</td>'+
          '<td>'+
            '<div class="form-group" style="width: 130px;">'+
              '<select class="form-control select2 htmlType-select2">'+
                '<option value="text">Text</option>'+
                '<option value="email">Email</option>'+
                '<option value="number">Number</option>'+
                '<option selected value="date">Date</option>'+
                '<option value="file">File</option>'+
                '<option value="password">Password</option>'+
                '<option value="select">Select</option>'+
                '<option value="radio">Radio</option>'+
                '<option value="checkbox">Checkbox</option>'+
                '<option value="textarea">TextArea</option>'+
                '<option value="toggle-switch">Toggle</option>'+
              '</select>'+
            '</div>'+
          '</td>'+
          '<td>'+
            create_checkbox("chkNullable", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkSearchable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkFillable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInIndex","")+
          '</td>'+
          '<td><i class="remove fas fa-trash" style="cursor: pointer;color: red"></i></td>'+
          '</div>'+
          '</td>'+'</tr>'

      return field;    
    }
    function create_input_text_empty_value(){
      var field = '<div class="form-group">'+
                      '<input type="text" class="form-control fieldNameInput" required>'+
                    '</div>'

      return field;
    }
    function create_select_dbtype(){
      var field = '<div class="form-group" style="width: 130px;">'+
                      '<select class="form-control select2 dbType-select2">'+
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
                      '</select>'+
                    '</div>'
                
      return field;
    }
    function create_select_html(){
      var field = '<div class="form-group" style="width: 130px;">'+
                      '<select class="form-control select2 htmlType-select2">'+
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
                    '</div>'

      return field;
    }
    function create_checkbox(className, ischecked){
      var field = '<div class="form-group">'+
              '<div class="form-check">'+
              '<input class="form-check-input '+ className+'"'+
              'type="checkbox" '+ischecked+'>'+
              '</div>'+
              '</div>'

      return field;
    }

    function addRelationSelectToRelationshipTable(){
      var selectString='<div class="form-group">'+
      '<select class="form-control select2 relationshipType-select2" >'+
        '<option value="1t1">One to One</option>'+
        '<option value="1tm">One to Many</option>'+
        '<option value="mt1">Many to One</option>'+
        '<option value="mtm">Many to Many</option>'+
        '</select>'+
          '<div class="form-group">'+
            '<input type="text" class="form-control foreignTable txtForeignTable" style="display: none" placeholder="Custom Table Name"/>'+
          '</div>'+
        '</div>'


      return selectString;
    }

  });
  
</script>
</html>
