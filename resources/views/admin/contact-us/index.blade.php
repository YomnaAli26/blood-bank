@extends("admin.layout.master")
@section("title","Contact Us")
@section("breadcrumb_header","Contact Us")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">contact us</li>
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
                            <h3 class="card-title">Contact Us</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Message Title</th>
                                    <th>Message Body</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$datum->message_title}}</td>
                                        <td>{{$datum->message_content}}</td>
                                        <td colspan="3">

                                            <a class="btn btn-danger"
                                               href="{{ route("admin.contact-us.destroy",$datum->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$datum->id}}').submit()">
                                                delete
                                            </a>
                                            <form id="delete-form-{{$datum->id}}"
                                                  action="{{ route("admin.contact-us.destroy",$datum->id)  }}"
                                                  method="post" style="display: none;">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="align-middle">
                                        <td colspan="4">No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div>
        </div>
    </div>
@endsection
