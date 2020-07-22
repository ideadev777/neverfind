<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<title>Admin </title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('custom/resume.css')}}">


<style type="text/css">
.bd-example-modal-lg .modal-dialog{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
  }

  .bd-example-modal-lg .modal-dialog .modal-content{
    background-color: transparent;
    border: none;
  }
</style>

</head>
<body>



<section>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Cleaning Service | Admin</span>
      <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{URL::asset('images/admin_avatar.png')}}" alt="" /></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
    </button>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/admin/orderlist">Order List</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/admin/servicelist">Service List</a></li>
        <li class="nav-item"><a href="#" class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#user-update-modal">Change Admin Info</a></li>
        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/admin/logout">Log out</a></li>
      </ul>
    </div>
  </nav>  
</section>


<div class="container-fluid p-0">

<section>
  <div class="row">
    <div class="col-md-12" align="center"><h2><span>Order List</span></h2> </div>
  </div>
</section>

<section id = "table-section">
<div class="container table-responsive col-md-12">
<table class="table table-bordered table-striped" id="laravel_datatable">
   <thead>
      <tr>
         <th>S. No</th>
         <th>Service</th>
         <th style="text-align:left">Order Date</th>
         <th>Name</th>
         <th>Email</th>

         <th>Address</th>
         <th>Start Date</th>
         <th>End Date</th>
         <th>Payment Info</th>

         <th>Status</th>
         <th>Invoice</th>
         <th>Detail</th>
         <th>Delete</th>
      </tr>
   </thead>
</table>
</div>


<div class="modal fade" id="ajax-product-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Order Information</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="productForm" name="productForm" class="form-horizontal">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3" id="service-content" name ="service-content" class="service-content">d</h4>

            <input type="text" id="id" name="id" class="mb-3"  hidden>
            <input type="text" id="service-id" name="service-id" hidden class="mb-3" >
            <input type="text" id="status" name="status" hidden class="mb-3" >
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input disabled type="text" class="form-control" id = "name" name="name" placeholder="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id = "email" name="email" disabled  required>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="cc-number">Mobile number</label>
                  <input type="text" class="form-control" id = "mobile-number" name="mobile-number" disabled >
                </div>
              <div class="col-md-8 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id = "address" name="address" placeholder="1234 Main St" disabled >
              </div>
            </div>

            <hr class="mb-4">

            <div class="row">
              <div class="col-md-3 mb-3">
                <label>Start Date</label>
                <input id="startDate" id = "startDay" class="form-control"disabled name = "startDay"/>
              </div>
              <div class="col-md-3 mb-3">
                <label>End Date</label>
                <input id="endDate" id = "endDay" class="form-control"disabled name = "endDay"/>
              </div>
              <div class ="col-md-3 mb-3">
                <label>Start Time</label>
                <input id="starttimepicker" class="form-control"disabled name = "startTime">
              </div>
              <div class ="col-md-3 mb-3">
                <label>End Time</label>
                <input id="endtimepicker" disabled class="form-control"name = "endTime">
              </div>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Payment Info</h4>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" id = "pay-email" class="form-control" name="pay-email" disabled >
            </div>
            <hr class="mb-4">
            <div class="col-md-12">
             <button type="submit" hidden class="btn btn-primary" id="btn-save" value="create">Save changes</button>
            </div>      
         </div>
      </div>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
  
</div>

</section>

<div class="modal fade bd-example-modal-lg" id = "loadingModal" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="width: 48px">
            <span class="fa fa-spinner fa-spin fa-3x"></span>
        </div>
    </div>
</div>


<div class="modal fade" id="user-update-modal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered " role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Change Admin Info</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userForm" name="userForm" class="form-horizontal" action="/admin/update" method="POST">
          @csrf
            <div class="row">
              <div class="col-md-12 mb-3">
                <label >New User Name:</label>
                <input  type="text" class="form-control" id = "username" name="username" placeholder="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label >New Password:</label>
                <input type="password" class="form-control" id = "password" name="password"   required>
              </div>
              <!--
              <div class="col-md-12 mb-3" hidden>
                <label >Confirm Password:</label>
                <input type="password" class="form-control" id = "confirmpassword" name="confirmpassword"   required>
              </div>
            -->
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block" >Change</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div> 
<!-- End of Contents -->

<script>
 var SITEURL = '{{URL::to('/')}}';
 $(document).ready( function () {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
 });

 $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
         url: SITEURL + "/product-list",
         type: 'GET',
        },
        columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                  {data: 'service.name', name: 'service_id'},
                  {data: 'created_at', name: 'created_at'},
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'address', name: 'address' },
                  { data: 'start_date', name: 'start_date' },
                  { data: 'end_date', name: 'end_date' },
                  { data: 'pay_email', name: 'pay_email' },
                  {data: 'status', name: 'status', orderable: false},
                  {data: 'invoice', name: 'invoice', orderable: false},
                  {data: 'detail', name: 'detail', orderable: false},
                  {data: 'delete', name: 'delete', orderable: false},
               ],
        columnDefs:[
                  {targets:2, render:function(data){
                  return moment(data).format('MM/DD/YYYY'); 
                  }}
              ],
  });

 
 /*  When user click add user button */
    $('#create-new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#orderCrudModal').html("Add New Product");
        $('#ajax-product-modal').modal('show');
    });
  
   /* When click detail user */
    $('body').on('click', '.edit-product', function () {
      var product_id = $(this).data('id');
      $.get('/product-list/' + product_id +'/edit', function (data) {
         $('#title-error').hide();
         $('#product_code-error').hide();
         $('#description-error').hide();
         $('#orderCrudModal').html("Edit Product");
          $('#btn-save').val("edit-product");
          $('#service-content').text('Service | '+data.service.name) ;
          $('#id').val(data.id);
          $('#status').val(data.status);
          $('#service-id').val(data.service_id);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#mobile-number').val(data.mobile_number);
          $('#address').val(data.address);
          $('#startDate').val(data.start_date);
          $('#endDate').val(data.end_date);
          $('#starttimepicker').val(data.start_time);
          $('#endtimepicker').val(data.end_time);
          $('#pay-email').val(data.pay_email);
          $('#ajax-product-modal').modal('show');
      })
   });
 
    $('body').on('click', '#delete-product', function () {
  
        var product_id = $(this).data("id");
        
        if(confirm("Are you sure want to delete ?")){
          $.ajax({
              type: "get",
              url: SITEURL + "/product-list/delete/"+product_id,
              success: function (data) {
              var oTable = $('#laravel_datatable').dataTable(); 
              oTable.fnDraw(false);
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
    }); 

    $('body').on('click', '#send-invoice', function () {
  
        var product_id = $(this).data("id");
        
        if(confirm("Are you sure want to send invoice ?")){
          $('#loadingModal').modal('show');
          $.ajax({
              type: "get",
              url: SITEURL + "/product-list/sendinvoice/"+product_id,
              success: function (data) {
              var oTable = $('#laravel_datatable').dataTable(); 
              oTable.fnDraw(false);
              $('#loadingModal').modal('hide');
              },
              error: function (data) {
                  console.log('Error:', data);
                  $('#loadingModal').modal('hide');
              }
          });
        }
    }); 


    $('body').on('click', '#change-status', function () {
     var id = $(this).data('id') 
     var status = $(this).data('status') ;
     var prev = $(this).data('prev') ;
     if( status != prev ){
      $('#loadingModal').modal('show');
      $.ajax({
          data: {id: id, status: status},
          url: SITEURL + "/product-list/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);
              $('#loadingModal').modal('hide');
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
              $('#loadingModal').modal('hide');
          }
      });              
      $('#loadingModal').modal('hide');
     }
    }); 
   });
  
if ($("#productForm").length > 0) {
      $("#productForm").validate({
  
     submitHandler: function(form) {
  
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      $.ajax({
          data: $('#productForm').serialize(),
          url: SITEURL + "/product-list/store",
          type: "POST",
          dataType: 'json',
          success: function (data) {
  
              $('#productForm').trigger("reset");
              $('#ajax-product-modal').modal('hide');
              $('#btn-save').html('Save Changes');
              var oTable = $('#laravel_datatable').dataTable();
              oTable.fnDraw(false);
               
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}

</script>
<script src="js/scripts.js"></script>
</body>

</html>