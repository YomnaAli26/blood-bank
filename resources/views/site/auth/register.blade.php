@extends("site.layout.master")
@section("class_body","create")
@section("content")
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                <form method="post" action="{{ route("register") }}">
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="الإسم" value="{{ old("name") }}">
                    @error("name")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكترونى" value="{{ old("email") }}">
                    @error("email")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="date" name="b_o_d" class="form-control" placeholder="تاريخ الميلاد" value="{{ old("b_o_d") }}">
                    @error("b_o_d")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <!-- Blood type dropdown -->
                    <select class="form-control" name="blood_type_id">
                        <option selected disabled hidden value="">فصيلة الدم</option>
                        @foreach($bloodTypes as $bloodType)
                            <option value="{{ $bloodType->id }}" @selected($bloodType->id == old("blood_type_id"))>{{ $bloodType->name }}</option>
                        @endforeach
                    </select>
                    @error("blood_type_id")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <!-- Governorate dropdown -->
                    <select class="form-control" id="governorates" name="governorate_id">
                        <option selected disabled hidden value="">المحافظة</option>
                        @foreach($governorates as $governorate)
                            <option value="{{ $governorate->id }}" @selected($governorate->id == old("governorate_id"))>{{ $governorate->name }}</option>
                        @endforeach
                    </select>
                    @error("governorate_id")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <!-- City dropdown -->
                    <select class="form-control" id="cities" name="city_id">
                        <option selected disabled hidden value="">المدينة</option>
                    </select>
                    @error("city_id")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" value="{{ old("phone") }}">
                    @error("phone")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="date" name="last_donation_date" class="form-control" placeholder="آخر تاريخ تبرع" value="{{ old("last_donation_date") }}">
                    @error("last_donation_date")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                    @error("password")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <input type="password" name="password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">
                    @error("password_confirmation")<div class="text-danger small mt-1">{{$message}}</div> @enderror

                    <div class="create-btn">
                        <input type="submit" value="إنشاء">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script>
        // Event listener for governorate selection change
        $("#governorates").change(function() {
            var governorateId = $(this).val();  // Get selected governorate ID
            if(governorateId)
            {
                $("#cities").empty().append('<option selected disabled hidden value="">المدينة</option>');  // Clear and reset city dropdown

                $.ajax({
                    url: `{{ route("cities",':id') }}`.replace(':id',governorateId),  // Adjust URL format with governorateId
                    type: 'GET',
                    success: function(response) {
                        if (response.data) {
                            // Populate cities dropdown with response data
                            response.data.forEach(function(city) {
                                $("#cities").append(new Option(city.name, city.id));
                            });
                        } else {
                            console.error("No cities found for the selected governorate.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching cities:", error);
                    }
                });
            }



        });
    </script>
@endpush
