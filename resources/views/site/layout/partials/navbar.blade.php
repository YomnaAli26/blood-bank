@auth
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('site/imgs/logo.png') }}" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('site.home') }}">الرئيسية <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.about') }}">عن بنك الدم</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.posts.index') }}">المقالات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.requests.index') }}">طلبات التبرع</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("site.who-are") }}">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("site.contact-us") }}">اتصل بنا</a>
                        </li>
                    </ul>

                    <!-- Donate Button -->
                    <a href="{{ route("site.requests.create") }}" class="donate mx-2">
                        <img src="{{ asset('site/imgs/transfusion.svg') }}" alt="request.png">
                        <p>طلب تبرع</p>
                    </a>

                    <!-- User Dropdown Menu -->
                    <div class="dropdown ml-auto">
                        <button class="btn donate dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right shadow-lg rounded-lg" aria-labelledby="userDropdown">
                            <a class="dropdown-item text-primary" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
@endauth
