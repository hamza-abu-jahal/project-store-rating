@extends('dashboard.home.parent')

@section('title','Edit Store')


@section('styles')

@endsection

@section('page-large-title','Edit Store')
@section('root-page-title','Edit')
@section('page-small-title','Store')


@section('content')


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
                <h3 class="card-title">Update Store</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('stores.update' , $stores->id)}}" enctype="multipart/form-data">
                 @method('PUT')
                @csrf
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <ul>
                    @foreach ($errors->all() as $error )
                      <li>{{$error}}</li>  
                    @endforeach
                  </ul>  
                  </div>
                  @endif


                  @if (session()->has('message'))
                   <div class="alert @if(session('status')) alert-success @else alert-danger @endif alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas @if(session('status')) fa-check-circle @else fa-times @endif "></i> {{session('message')}}</h5>
                    </div> 
                  @endif

                  <div class="form-group">
                    <label for="exampleInputEmail1">Store Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                    name = 'name-store' placeholder="Enter name"
                    @if (old('name-store')) value="{{old('name-store')}}" @else value="{{$stores->name}}" @endif  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Store Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name = 'address-store' placeholder="Enter address"
                    @if (old('address-store')) value="{{old('address-store')}}" @else value="{{$stores->title}}" @endif  >

                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name = 'phone-store' placeholder="Enter number"
                    @if (old('phone-store')) value="{{old('phone-store')}}" @else value="{{$stores->mobile}}" @endif  >


                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name = 'category-store'>
                          <option value="{{$stores->store_category_id }}">
                            @if (old('category-store')) {{old('category-store')}} @else {{$stores->category->name}} @endif
                          </option>
                          @foreach ($infoCatrgory as $catrgory  )
                            @if ($catrgory->id != $stores->store_category_id )
                              <option value="{{$catrgory->id}}">{{$catrgory->name}}</option>
                            @endif
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
                      @if (!isset($_FILES['image-store']))
                            <div class="form-group">
                            <label>Selected Image</label>
                            <br>
                            <img src="{{$stores->path}}" id = 'image-id' width="150" height="80">
                            </div> 
                      @else
                      
                           {{-- <div class="form-group" claa='h'> 
                            <label>Selected Image</label>
                            <br>
                            <img src="{{$stores->path}}" id = 'image-id' width="150" height="80">
                            </div>   --}}
                      @endif
                  
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{route('stores.index')}}" class="btn btn-default float-right">Show Stores</button>

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



@endsection


@section('scripts')
<!-- bs-custom-file-input -->
<script src="{{asset('LTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
  var $contain = false;
  if (document.getElementById("exampleInputFile").files[0].name) {
     contain = true;
  }
</script>
@endsection
