@extends("site.layout.master")
@section("class_body","contact-us")
@section("content")
    <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>

            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="{{ asset('site') }}/imgs/logo.png">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{ isset($settings['contact_phone']) ? $settings['contact_phone'] : '' }}</li>
                                    <li><span>فاكس:</span> {{ isset($settings['contact_fax']) ? $settings['contact_fax'] : '' }}</li>
                                    <li><span>البريد الإلكترونى:</span> {{ isset($settings['contact_email']) ? $settings['contact_email'] : '' }}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon"><a href="{{ isset($settings['facebook_link']) ? $settings['facebook_link'] : '#' }}"><img src="{{asset('site') }}/imgs/001-facebook.svg"></a></div>
                                    <div class="out-icon"><a href="{{ isset($settings['twitter_link']) ? $settings['twitter_link'] : '#' }}"><img src="{{asset('site') }}/imgs/002-twitter.svg"></a></div>
                                    <div class="out-icon"><a href="{{ isset($settings['youtube_link']) ? $settings['youtube_link'] : '#' }}"><img src="{{asset('site') }}/imgs/003-youtube.svg"></a></div>
                                    <div class="out-icon"><a href="{{ isset($settings['instagram_link']) ? $settings['instagram_link'] : '#' }}"><img src="{{asset('site') }}/imgs/004-instagram.svg"></a></div>
                                    <div class="out-icon"><a href="{{ isset($settings['whatsapp_link']) ? $settings['whatsapp_link'] : '#' }}"><img src="{{asset('site') }}/imgs/005-whatsapp.svg"></a></div>
                                    <div class="out-icon"><a href="{{ isset($settings['google_link']) ? $settings['google_link'] : '#' }}"><img src="{{asset('site') }}/imgs/006-google-plus.svg"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">
                            <!-- Container for the success message, dynamically added -->
                            <div id="successMessage"></div>
                            <form id="contactForm">
                                @csrf
                                <input type="text" class="form-control" id="title" placeholder="عنوان الرسالة" name="message_title">
                                <input type="hidden" class="form-control" name="client_id" value="{{ auth()->user()->id }}">
                                <textarea placeholder="نص الرسالة" class="form-control" id="content" rows="3" name="message_content"></textarea>
                                <button type="submit">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Attach submit handler to the contact form
        $("#contactForm").submit(function (e) {
            e.preventDefault(); // Prevent default form submission

            // Perform AJAX request
            $.ajax({
                url: "{{ route('site.contact-us') }}", // Correct route
                method: "POST", // HTTP method
                data: $(this).serialize(), // Serialize form data
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                },
                success: function (response) {
                    // Handle success response
                    if(response.status === 'success') {
                        // Dynamically create and append the success alert to the page
                        $('#successMessage').html('<x-alert type="success" />');
                        // Optionally reset the form
                        $("#contactForm")[0].reset();
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error("There was an error:", error);
                    alert("Something went wrong. Please try again.");
                }
            });
        });
    </script>
@endpush
