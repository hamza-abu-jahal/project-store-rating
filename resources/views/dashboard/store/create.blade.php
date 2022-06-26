@extends('dashboard.home.parent')

@section('title','Create Store')


@section('styles')

@endsection

@section('page-large-title','Create Store')
@section('root-page-title','Create')
@section('page-small-title','Store')


@section('content')
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Store</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('stores.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                  @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert !</h5>
                        <ul>
                          @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>  
                          @endforeach
                        </ul>  
                    </div>
                  @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Store Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                    name = 'name-store' placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Store Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name = 'address-store' placeholder="Enter address">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name = 'phone-store' placeholder="Enter number">

                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name = 'category-store'>
                          <option value="">-- Select category --</option>
                          @foreach ($storeCategories as $Categories  )
                           <option value="{{$Categories->id}}">{{$Categories->name}}</option> 
                          @endforeach
                        </select>
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Store Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name = 'image-store' id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('scripts')
<!-- bs-custom-file-input -->
<script src="{{asset('LTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection