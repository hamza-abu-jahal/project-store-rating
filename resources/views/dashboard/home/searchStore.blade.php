@extends('dashboard.home.parent')

@section('title','Search Store')


@section('styles')

@endsection

@section('page-large-title','Search Store')
@section('root-page-title','Search')
@section('page-small-title','Store')


@section('content')


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stores</h3>

                <div class="card-tools">
                  <form method="POST" action="{{route('stores.search')}}">
                    @csrf
                  <div class="input-group input-group-sm" style="width: 200px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search Store Name">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                </div>


              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Store Name</th>
                      <th>Store Address</th>
                      <th>Phone Number</th>
                      <th>Category</th>
                      <th>Number of reviews</th>
                      <th>Average Ratings</th>
                      <th>Store Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($searchStore as $store )
                            <tr>
                                <td>{{$store->id}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->title}}</td>
                                <td>{{$store->mobile}}</td>
                                <td>{{$store->category->name}}</td>
                                <td></td>
                                <td></td>
                                <td><img src="{{$store->path}}" width="150" height="80"></td>
                            </td>
                        @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection


@section('scripts')

@endsection