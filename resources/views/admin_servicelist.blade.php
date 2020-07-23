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

<link href="{{URL::asset('custom/tomstyle.css')}}" rel="stylesheet">

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
  .curtail-text1{ 
    overflow: hidden; 
    text-overflow: ellipsis; 
    display: -webkit-box; 
    line-height: 30px;  
    max-height: 60px;      
    min-height: 60px;
    -webkit-line-clamp: 2;  
    -webkit-box-orient: vertical; 
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


<div class="container">

<section>
  <div class="row">
    <div class="col-md-12" align="center"><h2><span>Service List</span></h2> </div>
    <div class="col-md-12" >
    <button href="#" class="btn btn-info" data-toggle="modal" data-target="#add-modal">Add new service</button>
    <p></p>
    </div>
    <br>
  </div>
</section>

<section id = "table-section">

<div class="container">
 <table class="table table-striped" width="100%;">
    <thead>
      <tr>
        <th>No</th>
        <th>Service Name</th>
        <th>Summary</th>
        <th>Detail</th>
        <th>Image Path</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Show in Home</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php $rank = 1 ; ?>
          @foreach($services as $service)
          <tr>
            <td>{{$rank++}}</td>
            <td>{{$service->name}}</td>
            <td><div class="curtail-text1">{{$service->summary}}</div></td>
            <td><div class="curtail-text1">{{$service->detail}}</div></td>
            <td>{{$service->image_path}}</td>
            <td>{{$service->price}}</td>
            <td>
                <button href="#" class=" col-md-12 float-right my_link btn btn-success" data-val="{{$service->id}}" data-name="{{$service->name}}" data-summary="{{$service->summary}}" data-detail="{{$service->detail}}" data-image="{{$service->image_path}}" data-price="{{$service->price}}" data-rank="{{$service->rank}}" data-toggle="modal" data-target="#edit-modal" style="align:right">Edit</button>
            </td>
            <td>
              <div class="form-check">     
                  <input 
                  type="checkbox" class="col-md-12 form-check-input" value=""
                  @if($service->ishome==1)
                  checked
                  @endif
                  onclick="window.location.href='/admin/showinhome/{{$service->id}}'" 
                  >
              </div>
            </td>
            <td>
                <button href="#" class=" float-right my_link btn btn-danger" data-val="{{$service->id}}" data-toggle="modal" data-target="#delete-modal" style="align:right">Delete</button>
            </td>
          </tr>
          @endforeach
    </tbody>
  </table>

</div>

</section>


</div> 
<!-- End of Contents -->

<!-- Edit Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Service information</h4>
          <form action = "editservice" id="orderForm" name="orderForm" method = "POST" class="needs-validation" >
            @csrf
            <input type="text" class="service-id" name="id" class="mb-3"  hidden>

            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Service Name</label>
                  <input class="form-control name" type="text" name="name" placeholder="" required />
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Summary</label>
                  <textarea rows="3" class="form-control summary" name="summary" placeholder="" required ></textarea>
                </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Detail</label>
                  <textarea rows="8" class="form-control detail" name="detail" placeholder="" required ></textarea>
                </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="cc-number">Image Path</label>
                  <input type="text" class="form-control image_path" name="image_path" placeholder="" required>
                </div>
              <div class="col-md-4 mb-3">
                <label for="Price">Price</label>
                <input type="number" class="form-control price" name="price" required maxlength="8">
              </div>
              <div class="col-md-4 mb-3">
                <label for="Rank">Rank</label>
                <input type="number" class="form-control rank" name="rank" required maxlength="8">
              </div>
            </div>

            <hr>
            <button class="btn btn-success btn-lg btn-block" type="submit" id="formSubmit" name="formSubmit" >Update</button>
            <button style="display: none;" id="formReset" name="formReset" type="reset">Reset</button>
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
<!-- End of Edit Modal -->


<!-- Add Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Service information</h4>
          <form action = "addservice" id="orderForm" name="orderForm" method = "POST" class="needs-validation" >
            @csrf
            <input type="text" class="service-id" name="id" class="mb-3"  hidden>

            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Service Name</label>
                  <input class="form-control name" type="text" name="name" placeholder="" required />
                </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Summary</label>
                  <textarea rows="3" class="form-control summary" name="summary" placeholder="" required ></textarea>
                </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-12">
                  <label for="cc-number">Detail</label>
                  <textarea rows="8" class="form-control detail" name="detail" placeholder="" required ></textarea>
                </div>
            </div>
            <br>

            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="cc-number">Image Path</label>
                  <input type="text" class="form-control image_path" name="image_path" placeholder="" required>
                </div>
              <div class="col-md-4 mb-3">
                <label for="address">Price</label>
                <input type="number" class="form-control price" name="price" required maxlength="8">
              </div>
              <div class="col-md-4 mb-3">
                <label for="Rank">Rank</label>
                <input type="number" class="form-control rank" name="rank" value="1" required maxlength="8">
              </div>

            </div>

            <hr>
            <button class="btn btn-success btn-lg btn-block" type="submit" id="formSubmit" name="formSubmit" >Save</button>
            <button style="display: none;" id="formReset" name="formReset" type="reset">Reset</button>
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
<!-- End of Add Modal -->


<!-- Delete Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

      <div class="row">
        <div class="col-md-12 order-md-1">
          <p class="mb-3">Are you sure to delete this service?</p>
          <form action = "deleteservice" id="orderForm" name="orderForm" method = "POST" class="needs-validation" >
            @csrf
            <input type="text" class="service-id" name="id" class="mb-3"  hidden>
            <hr>
            <button class="btn btn-success btn-block" type="submit" id="formSubmit" name="formSubmit" >Delete</button>
          </form>
        </div>
      </div>
      </div>
    
    </div>
    
  </div>
</div>
<!-- End of Add Modal -->

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


<script type="text/javascript">
$('#edit-modal').on('show.bs.modal', function (event) {
  var name = $(event.relatedTarget).data('name');
  var id = $(event.relatedTarget).data('val');

  var summary = $(event.relatedTarget).data('summary');
  var detail = $(event.relatedTarget).data('detail');
  var image = $(event.relatedTarget).data('image');
  var price = $(event.relatedTarget).data('price');
  var rank = $(event.relatedTarget).data('rank');

  var btn = document.getElementById('formReset');
  btn.click();
//  $("#formSubmit").attr('disabled', 'disabled');

  $(this).find(".name").val(name);
  $(this).find(".service-id").val(id);
  $(this).find(".summary").val(summary);
  $(this).find(".detail").val(detail);
  $(this).find(".image_path").val(image);
  $(this).find(".price").val(price);
  $(this).find(".rank").val(rank);
});

$('#delete-modal').on('show.bs.modal', function (event) {
  var id = $(event.relatedTarget).data('val');
  $(this).find(".service-id").val(id);
});

</script>


</body>


</html>