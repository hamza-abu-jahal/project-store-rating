@extends('dashboard.home.parent')

@section('title','Store Ratings')


@section('styles')

@endsection

@section('page-large-title','Store Ratings')
@section('root-page-title','Store')
@section('page-small-title','Ratings')


@section('content')


<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
             @if (session()->has('messageSearch'))
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-info"></i>Alert !</h5>
                   Serach Store Not Found ...
                </div>
              @endif
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stores</h3>


                <div class="card-tools">
                  <form method="GET" action="{{route('stores.search')}}">
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
                      <th>Category</th>
                      <th>Number of reviews</th>
                      <th>Average Ratings</th>
                      {{-- <th>Trend</th> --}}
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allData as $store )
                            <tr>
                                <td>{{$store->id}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->category->name}}</td>
                                <td>{{$store->ratings_number}}</td>
                                <td>{{$store->avarge_rating}}</td>
                                {{-- <td></td> --}}
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
        {{$allData->links()}}
    {{-- <div class="row">
    
      <div class="col-md-12>
        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
          <ul class="pagination">
            <li class="paginate_button page-item previous disabled" id="example1_previous">
              <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
            </li>
            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a>
            </li>
            <li class="paginate_button page-item ">
              <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a>
            </li>
            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a>
            </li>
            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a>
            </li>
            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a>
            </li>
            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a>
            </li>
            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection


@section('scripts')

@endsection