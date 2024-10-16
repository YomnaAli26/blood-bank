@extends("admin.layout.master")
@section("title","Governorates")
@section("breadcrumb_header","Governorates")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">governorates</li>
@endsection
@section("content")
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Governorates</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <a class="btn btn-success mb-3" href="{{ route("admin.governorates.create") }}">Create Governorate</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                <tr class="align-middle">
                                    <td>{{$loop->iteration}}.</td>
                                    <td>{{$datum->name}}</td>
                                    <td colspan="3">
                                        <a class="btn btn-primary" href="">show</a>
                                        <a class="btn btn-info" href="{{ route("admin.governorates.edit",$datum->id) }}">edit</a>
                                        <a class="btn btn-danger" href="">delete</a>
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
                                <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                            </ul>
                        </div>
                    </div> <!-- /.card -->

                </div> <!-- /.col -->
            </div>
        </div>
    </div>
@endsection
