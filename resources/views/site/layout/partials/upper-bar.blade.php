<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="language">
                    <a href="index.html" class="ar active">عربى</a>
                    <a href="index-ltr.html" class="en inactive">EN</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="social">
                    <div class="icons">
                        <a href="{{ $settings['facebook_link'] ?? '' }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $settings['instagram_link'] ?? '' }}" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="{{ $settings['twitter_link'] ?? '' }}" class="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $settings['whatsapp_link'] ?? '' }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <!-- not a member-->
            <div class="col-lg-4">
                <div class="info" dir="ltr">
                    @guest
                    <div class="accounts" dir="ltr">
                        <a href="{{ route("login") }}" class="signin">الدخول</a>
                        <a href="{{ route("register") }}" class="create-new">إنشاء حساب جديد</a>
                    </div>
                    @else
                    <div class="phone">
                        <i class="fas fa-phone-alt"></i>
                        <p>{{ $settings['contact_phone'] ?? '' }}</p>
                    </div>
                    <div class="e-mail">
                        <i class="far fa-envelope"></i>
                        <p> {{ $settings['contact_email'] ?? ''}}</p>
                    </div>
                    @endguest
                </div>



            </div>
        </div>
    </div>
</div>
