@extends('dashboard.home.parent')

@section('title','Create Category')


@section('styles')

@endsection

@section('page-large-title','Create Category')
@section('root-page-title','Create')
@section('page-small-title','Category')


@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{route('categories.store')}}">
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
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2.5 col-form-label"> Name Category </label>
                    <div class="col-sm-10">
                      <input type="text" name="name-category" value="" class="form-control" id="inputEmail3" placeholder="Name Category">
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Create</button>
                  <button type="button" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('scripts')

@endsection