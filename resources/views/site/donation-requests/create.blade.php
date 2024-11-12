@extends("site.layout.master")
@section("class_body", "inside-request")
@section("content")
    <div class="ask-donation">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('site.home') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('site.requests.index') }}">طلبات التبرع</a></li>
                    </ol>
                </nav>
            </div>

            <div class="details">
                <div class="col-md-12">
                    <!-- Form Start -->
                    <form action="{{ route('site.requests.store') }}" method="POST" id="donationForm">
                        @csrf
                        <!-- Patient Name -->
                        <div class="form-group">
                            <label for="patient_name">اسم المريض</label>
                            <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="patient_name" name="patient_name" required placeholder="أدخل اسم المريض" value="{{ old('patient_name') }}">
                            @error('patient_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Patient Phone -->
                        <div class="form-group">
                            <label for="patient_phone">رقم الاتصال</label>
                            <input type="text" class="form-control @error('patient_phone') is-invalid @enderror" id="patient_phone" name="patient_phone" required placeholder="أدخل رقم الاتصال" value="{{ old('patient_phone') }}">
                            @error('patient_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Patient Age -->
                        <div class="form-group">
                            <label for="patient_age">عمر المريض</label>
                            <input type="number" class="form-control @error('patient_age') is-invalid @enderror" id="patient_age" name="patient_age" required placeholder="أدخل عمر المريض" min="1" max="120" value="{{ old('patient_age') }}">
                            @error('patient_age')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Blood Type -->
                        <div class="form-group">
                            <label for="blood_type_id">فصيلة الدم</label>
                            <select class="form-control @error('blood_type_id') is-invalid @enderror" id="blood_type_id" name="blood_type_id" required>
                                <option value="" selected disabled>اختر فصيلة الدم</option>
                                @foreach($bloodTypes as $bloodType)
                                    <option value="{{ $bloodType->id }}" {{ old('blood_type_id') == $bloodType->id ? 'selected' : '' }}>{{ $bloodType->name }}</option>
                                @endforeach
                            </select>
                            @error('blood_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Number of Bags -->
                        <div class="form-group">
                            <label for="bags_num">عدد أكياس الدم المطلوبة</label>
                            <input type="number" class="form-control @error('bags_num') is-invalid @enderror" id="bags_num" name="bags_num" required min="1" placeholder="أدخل عدد أكياس الدم" value="{{ old('bags_num') }}">
                            @error('bags_num')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hospital Name -->
                        <div class="form-group">
                            <label for="hospital_name">اسم المستشفى</label>
                            <input type="text" class="form-control @error('hospital_name') is-invalid @enderror" id="hospital_name" name="hospital_name" required placeholder="أدخل اسم المستشفى" value="{{ old('hospital_name') }}">
                            @error('hospital_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hospital Address -->
                        <div class="form-group">
                            <label for="hospital_address">عنوان المستشفى</label>
                            <input type="text" class="form-control @error('hospital_address') is-invalid @enderror" id="hospital_address" name="hospital_address" required placeholder="أدخل عنوان المستشفى" value="{{ old('hospital_address') }}">
                            @error('hospital_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="form-group">
                            <label for="city_id">المدينة</label>
                            <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                                <option value="" selected disabled>اختر المدينة</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="form-group">
                            <label for="notes">ملاحظات</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" required rows="3" placeholder="أدخل ملاحظات">{{ old('notes') }}</textarea>
                            @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hidden Latitude and Longitude -->
                        <input type="hidden" id="latitude" name="latitude" value="3.22" required>
                        <input type="hidden" id="longitude" name="longitude" value="3.22" required>
                        <input type="hidden"  name="client_id" value="{{ auth()->user()->id }}"  required>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">إرسال طلب التبرع</button>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add a map to get the coordinates -->
    <div id="map" style="height: 400px; width: 100%;"></div>

@endsection

@push("scripts")
    <!-- Include Google Maps API -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap&libraries=places"
        async
        defer>
    </script>

    <script>
        function initMap() {
            // Default to Cairo's coordinates
            var mapOptions = {
                center: {lat: 30.0339, lng: 31.2357},
                zoom: 12,
            };

            // Initialize the map
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Add a draggable marker to get latitude and longitude
            var marker = new google.maps.Marker({
                map: map,
                position: map.getCenter(),
                draggable: true,
            });

            // Update hidden input fields when marker is dragged
            google.maps.event.addListener(marker, 'dragend', function() {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();
                document.getElementById("latitude").value = lat;
                document.getElementById("longitude").value = lng;
            });

            // Update marker position when map is clicked
            google.maps.event.addListener(map, 'click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                marker.setPosition(event.latLng);
                document.getElementById("latitude").value = lat;
                document.getElementById("longitude").value = lng;
            });
        }
    </script>
@endpush
