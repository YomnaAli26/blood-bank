@extends("site.layout.master")
@section("class_body","signin-account")
@section("content")
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                <form action="{{ route("login") }}" method="post" id="loginForm">
                    @csrf
                    <div class="logo">
                        <img src="{{asset("site/imgs/logo.png")}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الجوال" name="phone">
                    </div>
                    @error('phone')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                    </div>
                    @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{asset("site")}}/imgs/complain.png">
                            <a href="#">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <a href="" onclick="event.preventDefault();document.getElementById('loginForm').submit();">دخول</a>
                        </div>
                        <div class="col-md-6 left">
                            <a href="{{ route("register") }}">انشاء حساب جديد</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

