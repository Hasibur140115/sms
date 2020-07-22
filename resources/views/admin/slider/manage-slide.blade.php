@extends('admin.master')
@section('main-content')
<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">
            @if (Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>Message: </strong> {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            @if (Session::get('error_message'))
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>Error: </strong> {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">User List</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Slide Title</th>
                        <th>Slide Description</th>
                        <th>Slide Image</th>
                        <th>Status</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach ($slides as $slide) 
                    <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $slide->silde_title }}</td>
                    <td>{{ $slide->silde_description }}</td>
                    <td><img src="{{ asset('/' )}}{{ $slide->silde_image }}" style="width: 150px;" alt="Slide Image" ></td>
                    <td>{{ $slide->status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            @if($slide->status == 1)
                        <a href="{{ route('slide-unpublished',['id'=> $slide->id]) }}" title="Deactivate" class="btn btn-sm btn-success"><span class="fa fa-arrow-alt-circle-up"></span></a>
                            @else
                            <a href="{{ route('slide-published',['id'=> $slide->id]) }}" title="Activate" class="btn btn-sm btn-warning"><span class="fa fa-arrow-alt-circle-down"></span></a>
                            @endif

                            <a href="{{ route('slide-edit',['id'=> $slide->id]) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                            <a href="{{ route('slide-delete',['id'=> $slide->id]) }}" onclick="return confirm('If you want to delete this item Press  OK')" class="btn btn-sm btn-danger"><span class="fa fa-trash-alt"></span></a>
                            
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->
@endsection