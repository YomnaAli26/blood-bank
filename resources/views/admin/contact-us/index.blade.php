@inject("clients", "App\Models\Client")
@extends("admin.layout.master")
@section("title","Contact Us")
@section("breadcrumb_header","Contact Us")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
                            <form method="get" action="" id="filterForm">
                                <div class="row">
                                    <!-- Client Select Dropdown -->
                                    <div class="col-md-4 mb-3">
                                        <label for="client_id" class="form-label">Select Client</label>
                                        <select name="client_id" id="client_id" class="form-control">
                                            <option value="">Select a client</option>
                                            @foreach($clients->all() as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Message Title Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="message_title" class="form-label">Message Title</label>
                                        <input type="text" name="message_title" id="message_title" class="form-control" placeholder="Enter message title" value="{{ old('message_title') }}">
                                    </div>

                                    <!-- Message Body Input -->
                                    <div class="col-md-4 mb-3">
                                        <label for="message_body" class="form-label">Message Body</label>
                                        <input type="text" name="message_body" id="message_body" class="form-control" placeholder="Enter message body" value="{{ old('message_body') }}">
                                    </div>
                                </div>

                                <!-- Submit Button Row -->
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Displaying Table Data -->
                            <table class="table table-bordered mt-4" id="contactTable">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Client Phone</th>
                                    <th>Message Title</th>
                                    <th>Message Body</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$datum->client->name}}</td>
                                        <td>{{$datum->client->email}}</td>
                                        <td>{{$datum->client->phone}}</td>
                                        <td>{{$datum->message_title}}</td>
                                        <td>{{$datum->message_content}}</td>
                                        <td colspan="3">
                                            <a class="btn btn-danger"
                                               href="{{ route("admin.contact-us.destroy", $datum->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$datum->id}}').submit()">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{$datum->id}}"
                                                  action="{{ route("admin.contact-us.destroy", $datum->id) }}"
                                                  method="post" style="display: none;">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="align-middle">
                                        <td colspan="7">No Data Found</td>
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
@push("scripts")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
     $(document).ready(function (){
         $('#filterForm').on('submit',function (e){
             e.preventDefault();
             $.ajax({
                 url: {{ route("admin.contact-us.index") }},
                 type: 'GET',
                 data: $(this).serialize(),
                 success: function (response){
                     $('#contactTable tbody').html(response.html)
                 },
                 error: function (xhr){
                     console.log(xhr.responseText)
                 }

             })
         })
     })

    </script>
@endpush
