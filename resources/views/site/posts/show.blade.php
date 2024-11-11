@extends("site.layout.master")
@section("class_body","article-details")
@section("content")
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route("site.posts.index") }}">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="{{ $post->getFirstMediaUrl('image') }}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>{{ $post->title }}</h4>
                </div>
                <div class="icon col-6">
                    <a href="" class="favourite"  data-post-id="{{$post->id}}">
                        <i class="{{$post->isFavourite ? 'fas' : 'far'}} fa-heart"></i>
                    </a>
                </div>
            </div>

            <!--text-->
            <div class="text">
             <p>{{ $post->description }}</p>
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
                            @foreach($categoryPosts as $categoryPost)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{ $categoryPost->getFirstMediaUrl('image') }}" class="card-img-top" alt="...">
                                    <a href="{{ route("site.posts.show",$categoryPost->id) }}" class="click">المزيد</a>
                                </div>
                                <a href="" class="favourite"  data-post-id="{{$categoryPost->id}}">
                                    <i class="{{$categoryPost->isFavourite ? 'fas' : 'far'}} fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $categoryPost->title }}</h5>
                                    <p class="card-text">
                                        {{ $categoryPost->description }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script !src="">
        $('.favourite').on('click', function (e) {
            e.preventDefault();

            var post_id = $(this).data('post-id');
            var icon = $(this).find('i');

            $.ajax({
                url: "{{ route('site.posts.toggle', ':id') }}".replace(':id', post_id),
                method: "GET",
                success: function (response) {
                    if (response.toggled) {
                        icon.removeClass('far').addClass('fas');
                    } else {
                        icon.removeClass('fas').addClass('far');
                    }
                },
                error: function () {
                    alert('حدث خطأ أثناء معالجة الطلب.');
                }
            });
        });

    </script>
@endpush

