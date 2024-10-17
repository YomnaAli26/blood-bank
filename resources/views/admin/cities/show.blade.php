@extends("admin.layout.master")

@section("title","Cities")

@section("breadcrumb_header","Cities")

@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">cities</li>
@endsection

@section("content")
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Details</h3>
                        </div> <!-- /.card-header -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>City Name:</h5>
                                    <p>{{$model->name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Governorate Name:</h5>
                                    <p>{{$model->governorate->name}}</p>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.app-content -->
@endsection
