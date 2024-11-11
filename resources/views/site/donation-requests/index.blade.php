
@extends("site.layout.master")
@section("content")
    <!--inside-article-->
    <div class="all-requests">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                    </ol>
                </nav>
            </div>

            <!--requests-->
            <div class="requests">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
                <div class="content">
                    <form class="row filter" id="searchForm" method="get" action="">
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control"  id="blood_type_id" name="blood_type_id">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach($bloodTypes as $bloodType)
                                            <option value="{{ $bloodType->id }}">{{ $bloodType->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="city_id" name="city_id">
                                        <option selected disabled>اختر المدينة</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients" id="requests">
                        @foreach($donationRequests as $donationRequest)
                            <div class="details">
                                <div class="blood-type">
                                    <h2 dir="ltr">{{ $donationRequest->bloodType->name }}</h2>
                                </div>
                                <ul>
                                    <li><span>اسم الحالة:</span> {{ $donationRequest->patient_name }}</li>
                                    <li><span>مستشفى:</span> {{ $donationRequest->hospital_name }}</li>
                                    <li><span>المدينة:</span> {{ $donationRequest->city->name }}</li>
                                </ul>
                                <a href="{{ route("site.requests.show",$donationRequest->id) }}">التفاصيل</a>
                            </div>
                        @endforeach

                    </div>
                    <div class="pages">
                        <nav aria-label="Page navigation example" dir="ltr">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#searchForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Get the selected values from the dropdowns
                var bloodType = $('#blood_type_id').val();
                var city = $('#city_id').val();

                // Perform the AJAX request
                $.ajax({
                    url: "{{ route('site.requests.index') }}",
                    type: 'GET',
                    data: {
                        blood_type_id: bloodType,
                        city_id: city,
                    },
                    success: function (response) {
                        console.log(response)
                        if (response.message === 'success') {
                            console.log('success')

                            $('#requests').empty(); // Clear existing requests
                            response.requests.forEach(function (request) {
                                $('#requests').append(`
                                    <div class="details">
                                        <div class="blood-type">
                                            <h2 dir="ltr">${request.blood_type.name}</h2>
                                        </div>
                                        <ul>
                                            <li><span>اسم الحالة:</span> ${request.patient_name}</li>
                                            <li><span>مستشفى:</span> ${request.hospital_name}</li>
                                            <li><span>المدينة:</span> ${request.city.name}</li>
                                        </ul>
                                        <a href="{{ route("site.requests.show",$donationRequest->id) }}">التفاصيل</a>
                                    </div>
                                `);
                            });
                        }
                    },
                    error: function () {
                        alert('حدث خطأ أثناء معالجة الطلب.');
                    }
                });
            });
        });
    </script>
@endpush
