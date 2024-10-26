@extends("admin.layout.master")
@section("title", "Admins")
@section("breadcrumb_header", "Admins")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Admins</li>
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



                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Admins</h3>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-success mb-3" href="{{ route("admin.admins.create") }}">Create</a>

                            <table class="table table-striped table-hover">
                                <thead class="table-primary">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $datum)
                                    <tr class="align-middle" id="client-{{ $datum->id }}">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $datum->name }}</td>
                                        <td>{{ $datum->email }}</td>

                                        <td>
                                                <a class="btn btn-info"
                                                   href="{{ route("admin.admins.edit",$datum->id) }}">edit</a>

                                                <a class="btn btn-danger ml-2.5" href="{{ route('admin.admins.destroy', $datum->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $datum->id }}').submit()">
                                                    Delete
                                                </a>
                                                <form id="delete-form-{{ $datum->id }}" action="{{ route('admin.admins.destroy', $datum->id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method("DELETE")
                                                </form>
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
                    const url = `/admin/dashboard/admins/${clientId}/toggle-status`;

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
