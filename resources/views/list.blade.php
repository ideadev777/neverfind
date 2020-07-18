
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="{{URL::asset('custom/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" ></script>
<script src="{{URL::asset('custom/calendar.js')}}" type="text/javascript"></script>

<!DOCTYPE html>
  
<html lang="en">
<head>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel DataTable Ajax Crud Tutorial - Tuts Make</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
<h2>Laravel DataTable Ajax Crud Tutorial - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2>
<br>
<a href="https://www.tutsmake.com/how-to-install-yajra-datatables-in-laravel/" class="btn btn-secondary">Back to Post</a>
<a href="javascript:void(0)" class="btn btn-info ml-3" id="create-new-product">Add New</a>
<br><br>
  
<table class="table table-bordered table-striped" id="laravel_datatable">
   <thead>
      <tr>
         <th>S. No</th>
         <th>Order ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Address</th>
         <th>Mobile Number</th>
         <th>Status</th>
         <th>Action</th>
         <th>Change</th>
      </tr>
   </thead>
</table>
</div>
  
<div class="modal fade" id="ajax-product-modal" aria-hidden="true">


  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Order Information</h4>
          <form action = "order" method = "POST" class="needs-validation" novalidate>
            @csrf
            <input type="text" class="service-id" name="service-type" class="mb-3" hidden>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" id = "name" name="name" placeholder="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id = "email" name="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="cc-number">Mobile number</label>
                  <input type="text" class="form-control" id = "mobile-number" name="mobile-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Mobile Number is required
                  </div>
                </div>
              <div class="col-md-8 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id = "address" name="address" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your address.
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <div class="row">
              <div class="col-md-3 mb-3">
                <label>Start Date</label>
                <input id="startDate" id = "startDay" name = "startDay"/>
              </div>
              <div class="col-md-3 mb-3">
                <label>End Date</label>
                <input id="endDate" id = "endDay" name = "endDay"/>
              </div>
              <div class ="col-md-3 mb-3">
                <label>Start Time</label>
                <input id="starttimepicker" name = "startTime">
              </div>
              <div class ="col-md-3 mb-3">
                <label>End Time</label>
                <input id="endtimepicker" name = "endTime">
              </div>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Payment Info</h4>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" id = "pay-email" class="form-control" name="pay-email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address of paypal account.
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" >Order</button>
          </form>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
  
</div>

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
                  {data: 'id', name: 'id'},
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'address', name: 'address' },
                  { data: 'mobile_number', name: 'mobile_number' },
                  { data: 'status', name: 'status' },

                  {data: 'change', name: 'change', orderable: false},
                  {data: 'action', name: 'action', orderable: false},
               ],
        order: [[0, 'asc']]
      });
 
 /*  When user click add user button */
    $('#create-new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#orderCrudModal').html("Add New Product");
        $('#ajax-product-modal').modal('show');
    });
  
   /* When click edit user */
    $('body').on('click', '.edit-product', function () {
      var product_id = $(this).data('id');
      $.get('/product-list/' + product_id +'/edit', function (data) {
         $('#title-error').hide();
         $('#product_code-error').hide();
         $('#description-error').hide();
         $('#orderCrudModal').html("Edit Product");
          $('#btn-save').val("edit-product");
          $('#ajax-product-modal').modal('show');
          $('#product_id').val(data.id);

          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#mobile-number').val(data.mobile_number);
          $('#address').val(data.address);
          $('#startDate').val(data.start_date);
          $('#endDate').val(data.end_date);
          $('#starttimepicker').val(data.start_time);
          $('#endtimepicker').val(data.end_time);
          $('#pay-email').val(data.pay_email);
      })
   });
 
    $('body').on('click', '#delete-product', function () {
  
        var product_id = $(this).data("id");
        
        if(confirm("Are You sure want to deleete !")){
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
<script>
  $('#endtimepicker').timepicker();
  $('#starttimepicker').timepicker();
</script>
<script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
</script>

</body>
 
</html>

