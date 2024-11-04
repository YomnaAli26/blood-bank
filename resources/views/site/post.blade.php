
@extends("site.layout.master")
@section("content")
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="imgs/p1.jpg">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>طريقة الوقاية من الأمراض</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>

            <!--text-->
            <div class="text">
                <p>
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                    ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                    هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                </p> <br>
                <p>
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                    ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                    هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.
                </p>
            </div>

            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>مقالات ذات صلة</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                    <p class="card-text">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                    <p class="card-text">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                    <p class="card-text">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                    <p class="card-text">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="photo">
                                    <img src="imgs/p2.jpg" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">طريقة الوقاية من الأمراض</h5>
                                    <p class="card-text">
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')

@endpush
