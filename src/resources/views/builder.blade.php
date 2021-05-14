<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet"  href="{{ 'vendor' }}/cruder/assets/stisla/library/select2.min.css"/>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ 'vendor' }}/cruder/assets/stisla/css/style.css">
  <link rel="stylesheet" href="{{ 'vendor' }}/cruder/assets/stisla/css/components.css">

</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="index.html" class="navbar-brand sidebar-gone-hide">Cruder</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav">
            <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
          </ul>
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Generator Builder</h1>
            {{--
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
            --}}
          </div>

          <div id="info" style="display: none"></div>

          <div class="section-body">
            {{--
            <h2 class="section-title">This is Example Page</h2>
            <p class="section-lead">This page is just an example for you to create your own page.</p>
            --}}
            <div class="card">
              <div class="card-header">
                <h4>Builder</h4>
              </div>
              <div class="card-body">
                <form role="form" id="form">
                  @method('post')
                  <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}"/>
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Model Name <span class="required">*</span></label>
                          <input type="text" class="form-control" id="modelNameInput" placeholder="Enter model name" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Custom Table Name</label>
                            <input type="text" class="form-control" id="customTableNameInput" placeholder="Enter custom table name">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                      <div class="control-label">Options</div>
                      <div class="custom-switches-stacked mt-2">
                        <label class="custom-switch">
                          <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="chkDelete">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Soft delete</span>
                        </label>
                        <label class="custom-switch">
                          <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="chkSave">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Save schema</span>
                        </label>
                        <label class="custom-switch">
                          <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="chkSwagger">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Swagger</span>
                        </label>
                        <label class="custom-switch">
                          <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="chkForceMigrate">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Force migrate</span>
                        </label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Prefix</label>
                        <input type="text" class="form-control" id="prefixInput" placeholder="Enter prefix">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Paginate</label>
                        <input type="text" class="form-control" id="paginateInput" placeholder="Enter prefix">
                      </div>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="table-responsive mt-4">
                      <table class="table table-striped table-md" id="table">
                        <thead>
                        <tr>
                          <th>Field Name <span class="required">*</span></th>
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
                      <tbody>
                      </tbody>
                      </table>
                    </div>
                    <button type="button" class="btn btn-icon btn-success mt-4" id="addFieldButton"><i class="fas fa-plus"></i> Add field</button>
                  </div>

                  {{--  
                  <div class="row">
                    <div  class="btn-group mb-3" role="group">
                    <a href="#" class="btn btn-icon btn-secondary" id="addRelationshipButton"><i class="far fa-edit"></i> Add relationship</a>
                    <div class="form-group" style="padding-left: 10px">
                      <button type="button" class="btn btn-default " id="addRelationshipButton" style="background-color:#ffc107; color: white">Add relationship</button>
                    </div>
                    </div>
                  </div>
                  --}}

                  <div class="row mt-4" id="relationShip">
                    <div class="table-responsive mt-4">
                      <table class="table table-striped table-md" id="relationShipTable">
                        <thead>
                          <tr>
                            <th>Relation Type</th>
                            <th>Foreign Model <span class="required">*</span></th>
                            <th>Foreign Key</th>
                            <th>Local Key</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>

                      <button type="button" class="btn btn-icon btn-success mt-4" id="addRelationshipButton"><i class="fas fa-plus"></i> Add relationship</button>
                    </div>
                  </div>

                  

                  <div class="row justify-content-end mt-4">
                    <div class="buttons mb-3 mt-4">
                      <button class="btn btn-primary" type="submit" id="btnGenerate">Generate</button>
                      <button class="btn btn-secondary" type="button" id="btnReset">Reset</button>
                    </div>
                  </div>

                

                  {{-- 
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
                  --}}

                </form>
              </div>
              <div class="card-footer bg-whitesmoke">
                
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Rollback</h4>
              </div>
              <div class="card-body">
                <form role="form" id="rollbackForm">
                  @method('post')
                  <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}"/>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Model name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="RBModelNameInput" placeholder="Enter name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="RBPrefixInput">Prefix</label>
                          <input type="text" class="form-control" id="RBPrefixInput" placeholder="Enter prefix">
                        </div>
                    </div>
                  </div>
                  <div class="row justify-content-end mt-4">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-block btn-primary" id="btnRollback">Rollback</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer bg-whitesmoke">
                
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Generate CRUD From Schema</h4>
              </div>
              <div class="card-body">
                <form role="form" id="schemaForm">
                  @method('post')
                  <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}"/>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Model name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="SmModelNameInput" placeholder="Enter name" required>
                      </div>
                    </div>
                    <div class="col-md-6 mt-4">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="schemaFile">
                        <label class="custom-file-label" for="schemaFile">Choose file</label>
                      </div>
                    
                    </div>
                  </div>
                  <div class="row justify-content-end mt-4">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-block btn-primary" id="btnSmGenerate">Generate</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer bg-whitesmoke">
                
              </div>
            </div>
          </div>


        </section>
      </div>


      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
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
  <script src="{{ 'vendor' }}/cruder/assets/stisla/js/stisla.js"></script>
  <script src="{{ 'vendor' }}/cruder/assets/stisla/library/select2.full.min.js"></script>
  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ 'vendor' }}/cruder/assets/stisla/js/scripts.js"></script>
  <script src="{{ 'vendor' }}/cruder/assets/stisla/js/custom.js"></script>
</body>
<script>
  $(document).ready(function () {
    var clicks = 0;
    

    $("#form").on("submit", function () {
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
                  dbType: $(this).find('.dbType-select2').val(),
                  htmlType: htmlValue,
                  validations: $(this).find('.validationInput').val(),
                  foreignTable: $(this).find('.txtForeignTable').val(),
                  isForeign: $(this).find('.chkForeign').prop('checked'),
                  searchable: $(this).find('.chkSearchable').prop('checked'),
                  fillable: $(this).find('.chkFillable').prop('checked'),
                  primary: $(this).find('.chkPrimary').prop('checked'),
                  inForm: $(this).find('.chkInForm').prop('checked'),
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
                  save: $('#chkSave').prop('checked'),
                  prefix: $('#prefixInput').val(),
                  paginate: $('#paginateInput').val(),
                  forceMigrate: $('#chkForceMigrate').prop('checked'),
              },
              addOns: {
                  swagger: $('#chkSwagger').prop('checked')
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
            location.reload();
          }, 1501);
          
          //$.ajax({
          //    type: "POST",
          //    url: "{!! route('cruder.generate') !!}",
          //    method: "POST",
          //    dataType: 'json',
          //    contentType: 'application/json',
          //    data: JSON.stringify(data),
          //    success: function (result) {
          //        $("#info").html("");
          //        $("#info").append('<div class="alert alert-success">Successfully created.</div>');
          //        $("#info").show();
          //        var $container = $("html,body");
          //        var $scrollTo = $('#info');
          //        $container.animate({scrollTop: 0, scrollLeft: 0},1000);
          //        setTimeout(function () {
          //            $('#info').fadeOut('slow');
          //        }, 1500);
          //        setTimeout(function () {
          //          location.reload();
          //        }, 1501);
          //    },
          //    error: function (result) {
          //        var result = JSON.parse(JSON.stringify(result));
          //        var errorMessage = '';
          //        if (result.hasOwnProperty('responseJSON') && result.responseJSON.hasOwnProperty('message')) {
          //            errorMessage = result.responseJSON.message;
          //        }
          //        $("#info").html("");
          //        $("#info").append('<div class="alert alert-success">Successfully created.</div>');
          //        $("#info").show();
          //        var $container = $("html,body");
          //        var $scrollTo = $('#info');
          //        $container.animate({scrollTop: 0, scrollLeft: 0},1000);
          //        setTimeout(function () {
          //            $('#info').fadeOut('slow');
          //        }, 1500);
          //        setTimeout(function () {
          //          location.reload();
          //        }, 1501);
          //    }
          //});
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
            create_checkbox("chkPrimary", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkForeign", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkSearchable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkFillable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInForm","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInIndex","checked")+
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
            '<div class="form-group">'+
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
            '<div class="form-group">'+
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
            create_checkbox("chkPrimary", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkForeign", "")+
          '</td>'+
          '<td>'+
            create_checkbox("chkSearchable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkFillable","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInForm","checked")+
          '</td>'+
          '<td>'+
            create_checkbox("chkInIndex","checked")+
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
      var field = '<div class="form-group">'+
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
      var field = '<div class="form-group">'+
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
