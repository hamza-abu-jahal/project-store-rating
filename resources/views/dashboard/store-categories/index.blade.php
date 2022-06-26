@extends('dashboard.home.parent')

@section('title','Categories')


@section('styles')

@endsection

@section('page-large-title','Categories')
@section('root-page-title','All Categories')
@section('page-small-title','Home Categories')


@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">

              

              @if (session()->has('undelete'))
                   <div class="alert alert-warning alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <h5><i class="icon fas fa-exclamation-triangle"></i> Alert !</h5>
                  The Category cannot be deleted because it contains existing stores ...
                   </div>
              @endif

              {{-- @if (Session::has('tosatrMsg'))
              @isset(Session::get('tosatrMsg')['success'])
                  toastr.success("{{ Session::get('tosatrMsg')['success'] }}");
              @endisset
              @isset(Session::get('tosatrMsg')['error'])
                  toastr.error("{{ Session::get('tosatrMsg')['error'] }}");
              @endisset
              @endif --}}


          
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Categories</h3>

                  <div class="card-tools">
                    
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                  <div class="btn-group">
                                      <a href="{{route('categories.edit', $category)}}" class="btn btn-info">
                                        <i class="fas fa-edit"></i>
                                      </a>
                                      {{-- <a href="" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                      </a> --}}

                                      <form method="POST" action="{{route('categories.destroy', $category->id)}}">
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


@section('scripts')

@endsection