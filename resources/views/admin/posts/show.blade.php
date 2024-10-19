@extends("admin.layout.master")

@section("title","Posts")

@section("breadcrumb_header","Posts")

@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">posts</li>
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
                                    <h5>Post Title:</h5>
                                    <p>{{$model->title}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Post Description:</h5>
                                    <p>{{$model->description}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Post Image:</h5>
                                    <p>{{$model->image}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Category:</h5>
                                    <p>{{$model->category->name}}</p>
                                </div>

                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
    </div> <!-- /.app-content -->
@endsection
