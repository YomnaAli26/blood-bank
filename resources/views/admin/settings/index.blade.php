@extends("admin.layout.master")
@section("title","Settings")
@section("breadcrumb_header","Settings")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Settings</li>
@endsection

@section("content")
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <x-alert type="success"/>
                    <x-alert type="danger"/>

                    <!-- Settings Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                        </div>

                        <div class="card-body">
                            <!-- Form Start -->
                            <form action="{{ route("admin.settings.update") }}" method="POST">
                                @csrf
                                @method('PUT')

                                @forelse($data as $key => $datum)
                                    <div class="form-group row mb-3">
                                        <!-- Label -->
                                        <label for="{{ $key }}" class="col-md-3 col-form-label text-capitalize">
                                            {{ str_replace('_', ' ', $key) }}
                                        </label>

                                        <!-- Input -->
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="{{ $key }}" name="{{ $key }}" value="{{ old($key, $datum) }}">
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-warning">
                                        No settings available to display.
                                    </div>
                                @endforelse

                                <!-- Save Button -->
                                @if($data->isNotEmpty())
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                @endif
                            </form>
                            <!-- Form End -->
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.app-content -->
@endsection
