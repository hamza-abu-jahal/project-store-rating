@extends('dashboard.home.parent')

@section('title','Stores')


@section('styles')

@endsection

@section('page-large-title','Stores')
@section('root-page-title','All Stores')
@section('page-small-title','Home Stores')


@section('content')

@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Stores</h3>

                  <div class="card-tools">
                    
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
                        <th>Category </th>
                        <th>Store Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store )
                            <tr>
                                <td>{{$store->id}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->title}}</td>
                                <td>{{$store->mobile}}</td>
                                <td>{{$store->category->name}}</td>
                                <td><img src="{{$store->path}}" width="150" height="80"></td>
                                <td>
                                  <div class="btn-group">
                                      <a href="{{route('stores.edit', $store)}}" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      {{-- <a href="" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                      </a> --}}

                                      <form method="POST" action="{{route('stores.destroy', $store->id)}}">
                                        @method('DELETE')
                                        @csrf
                                          <button type="submit" class="btn btn-danger">
                                           <i class="fas fa-trash"></i>
                                          </a>
                                      </button>
                                       </form>
                                 </div>
                                </td>

                            </tr>
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

@endsection


@section('scripts')

@endsection