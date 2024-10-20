@inject("categories","App\Models\Category")
@extends("admin.layout.master")
@section("title","Posts")
@section("breadcrumb_header","Posts")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Posts</li>
@endsection
@section("content")
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-4"> <!--begin::Col-->
                <div class="col-12">

                    <!--begin::Form Validation-->
                    <div class="card  card-outline mb-4"> <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Update post</div>
                        </div> <!--end::Header--> <!--begin::Form-->
                        <form class="needs-validation" method="post" action="{{ route("admin.posts.update",$model->id) }}"
                              enctype="multipart/form-data" novalidate> <!--begin::Body-->
                            @csrf
                            @method("put")
                            <div class="card-body"> <!--begin::Row-->
                                <div class="row g-3"> <!--begin::Col-->
                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Title</label>
                                        <input type="text" name="title" value="{{ $model->title }}" class="form-control"
                                               id="validationCustom01" required>
                                        @error('title')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Description</label>
                                        <textarea type="text" name="description"  class="form-control"
                                                  id="validationCustom01" required>{{ $model->description }}</textarea>

                                        @error('description')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Image</label>
                                        <input type="file" name="image"  class="form-control"
                                               id="validationCustom01" >
                                        @error('image')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12"><label for="validationCustom01" class="form-label">Categories</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories->all() as $category)
                                                <option value="{{$category->id}}" @selected($model->category_id == $category->id)>
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('governorate_id')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->
                                </div> <!--end::Row-->
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div> <!--end::Footer-->
                        </form> <!--end::Form--> <!--begin::JavaScript-->
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (() => {
                                "use strict";

                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                const forms =
                                    document.querySelectorAll(".needs-validation");

                                // Loop over them and prevent submission
                                Array.from(forms).forEach((form) => {
                                    form.addEventListener(
                                        "submit",
                                        (event) => {
                                            if (!form.checkValidity()) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }

                                            form.classList.add("was-validated");
                                        },
                                        false
                                    );
                                });
                            })();
                        </script> <!--end::JavaScript-->
                    </div> <!--end::Form Validation-->
                </div>
            </div>
        </div>
    </div>
@endsection
