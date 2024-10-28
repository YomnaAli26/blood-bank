@extends("admin.layout.master")
@section("title","Posts")
@section("breadcrumb_header","Posts")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">posts</li>
@endsection
@section("content")

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-alert type="success"/>
                    <x-alert type="danger"/>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Posts</h3>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-success mb-3" href="{{ route('admin.posts.create') }}">Create Post</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($data as $datum)
                                    <tr class="align-middle">
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$datum->title}}</td>
                                        <td>{{$datum->description}}</td>
                                        <td>
                                                <img src="{{  $datum->getFirstMediaUrl('image') }}"
                                                     alt="{{ $datum->title }}"
                                                     style="max-width: 50px; max-height: 50px; border-radius: 50%;"/>
                                        </td>
                                        <td>{{$datum->category->name}}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{ route('admin.posts.show', $datum->id) }}">Show</a>
                                            <a class="btn btn-info"
                                               href="{{ route('admin.posts.edit', $datum->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                               href="{{ route('admin.posts.destroy', $datum->id) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$datum->id}}').submit()">
                                                Delete
                                            </a>
                                            <form id="delete-form-{{$datum->id}}"
                                                  action="{{ route('admin.posts.destroy', $datum->id) }}"
                                                  method="post" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="align-middle">
                                        <td colspan="6">No Data Found</td>
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
@endsection
