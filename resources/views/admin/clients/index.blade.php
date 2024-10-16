@extends("admin.layout.master")
@section("title","Clients")
@section("breadcrumb_header","Clients")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">clients</li>
@endsection
@section("content")
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Clients</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   <th>Birth of date</th>
                                   <th>city</th>
                                   <th>bloodType</th>
                                   <th>is Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$datum->name}}</td>
                                        <td>{{$datum->email}}</td>
                                        <td>{{$datum->phone}}</td>
                                        <td>{{$datum->b_o_d}}</td>
                                        <td>{{$datum->city->name}}</td>
                                        <td>{{$datum->is_active}}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                               href="{{ route("admin.clients.destroy",$datum->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$datum->id}}').submit()">
                                                delete
                                            </a>
                                            <form id="delete-form-{{$datum->id}}"
                                                  action="{{ route("admin.clients.destroy",$datum->id)  }}"
                                                  method="post" style="display: none;">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="align-middle">
                                        <td>No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
        </div>
    </div>
@endsection
