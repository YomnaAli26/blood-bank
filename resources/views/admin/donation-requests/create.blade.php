@inject("cities","App\Models\City")
@inject("bloodTypes","App\Models\BloodType")
@extends("admin.layout.master")
@section("title","Donation Requests")
@section("breadcrumb_header","Donation Requests")
@section("breadcrumb")
    @parent
    <li class="breadcrumb-item active" aria-current="page">Donation Requests</li>
@endsection
@section("content")
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row g-4"> <!--begin::Col-->
                <div class="col-12">

                    <!--begin::Form Validation-->
                    <div class="card  card-outline mb-4"> <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Create Client</div>
                        </div> <!--end::Header--> <!--begin::Form-->
                        <form class="needs-validation" method="post" action="{{ route("admin.donation-requests.store") }}"
                             enctype="multipart/form-data" novalidate> <!--begin::Body-->
                            @csrf
                            <div class="card-body"> <!--begin::Row-->
                                <div class="row g-3"> <!--begin::Col-->
                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{ old("name") }}" class="form-control"
                                               id="validationCustom01" required>
                                        @error('name')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{  old("email") }}"  class="form-control"
                                               id="validationCustom01" required>

                                        @error('email')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->
                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Phone</label>
                                        <input type="text" name="phone" value="{{  old("phone") }}"  class="form-control"
                                               id="validationCustom01" required>

                                        @error('phone')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Password</label>
                                        <input type="password" name="password" value="{{  old("password") }}"  class="form-control"
                                               id="validationCustom01" required>

                                        @error('password')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->
                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">Birth Of Date</label>
                                        <input type="date" name="b_o_d" value="{{  old("b_o_d") }}"  class="form-control"
                                               id="validationCustom01" required>

                                        @error('b_o_d')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label for="validationCustom01" class="form-label">last_donation_date</label>
                                        <input type="date" name="last_donation_date" value="{{  old("last_donation_date") }}"  class="form-control"
                                               id="validationCustom01" required>

                                        @error('last_donation_date')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->

                                    <div class="col-md-12">
                                        <label class="form-label">Status</label>
                                        <div>
                                            <!-- Radio button for "active" -->
                                            <input type="radio" name="is_active" value="1" id="active"
                                                   @checked(old('is_active') == 1) required>
                                            <label for="active">Active</label>

                                            <!-- Radio button for "de-active" -->
                                            <input type="radio" name="is_active" value="0" id="de-active"
                                                   @checked(old('is_active') == 0) required>
                                            <label for="de-active">De-active</label>
                                        </div>

                                        @error('is_active')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12"><label for="validationCustom01" class="form-label">Cities</label>
                                        <select class="form-control" name="city_id">
                                            @foreach($cities->all() as $city)
                                                <option value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->
                                    <div class="col-md-12"><label for="validationCustom01" class="form-label">Blood Types</label>
                                        <select class="form-control" name="blood_type_id">
                                            @foreach($bloodTypes->all() as $bloodType)
                                                <option value="{{$bloodType->id}}">
                                                    {{$bloodType->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('blood_type_id')
                                        <div class="error-message">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div> <!--end::Col--> <!--begin::Col-->
                                </div> <!--end::Row-->
                            </div> <!--end::Body--> <!--begin::Footer-->
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit">Create</button>
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
