@extends("site.layout.master")
@section("class_body","who-are-us")
@section("content")
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="logo">
                    <img src="{{asset("site")}}/imgs/logo.png">
                </div>
                <div class="text">
                    <p>
                        {{ isset($settings['who-are-paragraph-1']) }}
                    </p>
                    <p>
                        {{ isset($settings['who-are-paragraph-2']) }}

                    </p>
                    <p>
                        {{ isset($settings['who-are-paragraph-3']) }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection


