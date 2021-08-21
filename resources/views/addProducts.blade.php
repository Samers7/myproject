<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add product</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
              </div>
              <h4>Add Product +</h4>

              <h6 class="font-weight-light"></h6>
              <form method="POST" action="/addProducts" enctype="multipart/form-data" class="pt-3">
                @csrf

                <div class="form-group">
                  <input type="text" name="name" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Product Name">
                </div>

                <div class="form-group">
                    <textarea name="description" required id="" cols="30" rows="4" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="describe the product here"></textarea>
                </div>

                <div class="form-group">
                  <input type="text" name="price" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Price">
                </div>
                <div class="form-group">
                <input type="number" name="quantity" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Quantity">
                </div>
                <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" name="image" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Image">
                </div>






                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Add +</button>
                </div>
                <div class="text-center mt-4 font-weight-light">

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>
