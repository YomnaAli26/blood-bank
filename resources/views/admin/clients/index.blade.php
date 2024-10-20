@extends("admin.layout.master")
@inject("cities", "App\Models\City")
@inject("bloodTypes", "App\Models\BloodType")
@section("title", "Clients")
@section("breadcrumb_header", "Clients")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Clients</li>
@endsection

@section("content")
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Display Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Filters Form with Collapsible Card -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Filters</h3>
                            <button class="btn btn-sm btn-outline-primary" type="butgit add .ton" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                                Toggle Filters
                            </button>
                        </div>
                        <div class="collapse show" id="filterCollapse">
                            <div class="card-body">
                                <form method="GET" action="{{ route('admin.clients.index') }}" class="row g-3">
                                    <!-- Name Filter -->
                                    <div class="col-md-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ request()->name }}" placeholder="Enter name">
                                    </div>
                                    <!-- Email Filter -->
                                    <div class="col-md-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control" value="{{ request()->email }}" placeholder="Enter email">
                                    </div>
                                    <!-- City Filter -->
                                    <div class="col-md-3">
                                        <label for="city" class="form-label">City</label>
                                        <select id="city" name="city_id" class="form-select">
                                            <option value="">Select City</option>
                                            @foreach($cities->all() as $city)
                                                <option value="{{ $city->id }}" {{ request()->city == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Blood Type Filter -->
                                    <div class="col-md-3">
                                        <label for="blood_type" class="form-label">Blood Type</label>
                                        <select id="blood_type" name="blood_type_id" class="form-select">
                                            <option value="">Select Blood Type</option>
                                            @foreach($bloodTypes->all() as $bloodType)
                                                <option value="{{ $bloodType->id }}" {{ request()->blood_type == $bloodType->id ? 'selected' : '' }}>
                                                    {{ $bloodType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Status Filter -->
                                    <div class="col-md-3">
                                        <label for="is_active" class="form-label">Status</label>
                                        <select id="is_active" name="is_active" class="form-select">
                                            <option value="">Select Status</option>
                                            <option value="1" {{ request()->is_active == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ request()->is_active == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <!-- Filter Buttons -->
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                                        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Client Table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Clients</h3>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-success mb-3" href="{{ route("admin.clients.create") }}">Create</a>

                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birth Date</th>
                                    <th>City</th>
                                    <th>Blood Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                    <tr class="align-middle" id="client-{{ $datum->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $datum->name }}</td>
                                        <td>{{ $datum->email }}</td>
                                        <td>{{ $datum->phone }}</td>
                                        <td>{{ $datum->b_o_d }}</td>
                                        <td>{{ $datum->city->name }}</td>
                                        <td>{{ $datum->bloodType->name }}</td>
                                        <td>
                                            <span class="badge {{ $datum->is_active ? 'bg-success' : 'bg-danger' }}" id="status-{{ $datum->id }}">
                                                {{ $datum->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-info me-2 toggle-status" data-id="{{ $datum->id }}" data-status="{{ $datum->is_active }}">
                                                    {{ $datum->is_active == 1 ? 'Deactivate' : 'Activate' }}
                                                </button>
                                                <a class="btn btn-info"
                                                   href="{{ route("admin.clients.edit",$datum->id) }}">edit</a>

                                                <a class="btn btn-danger ml-2.5" href="{{ route('admin.clients.destroy', $datum->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $datum->id }}').submit()">
                                                    Delete
                                                </a>
                                                <form id="delete-form-{{ $datum->id }}" action="{{ route('admin.clients.destroy', $datum->id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="align-middle">
                                        <td colspan="9" class="text-center">No Data Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $data->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.querySelectorAll('.toggle-status').forEach(function (button) {
                button.addEventListener('click', function () {
                    const clientId = this.dataset.id;
                    const currentStatus = this.dataset.status;
                    const newStatus = currentStatus === '1' ? 0 : 1;
                    const url = `/admin/dashboard/clients/${clientId}/toggle-status`;

                    fetch(url, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            is_active: newStatus
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                const badge = document.getElementById(`status-${clientId}`);
                                badge.className = data.is_active ? 'badge bg-success' : 'badge bg-danger';
                                badge.textContent = data.is_active ? 'Active' : 'Inactive';

                                this.textContent = data.is_active ? 'Deactivate' : 'Activate';
                                this.dataset.status = newStatus;
                            } else {
                                alert('Failed to update status.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while updating status.');
                        });
                });
            });
        </script>
    @endpush
@endsection
