@extends("site.layout.master")
@section("class_body","article-details")
@section("content")
    <!--inside-article-->
    <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route("site.home") }}">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route("site.posts.index") }}">المقالات</a></li>
                    </ol>
                </nav>
            </div>

            <!--articles-->
            <div class="articles">
                @foreach($posts as $post)

                <div class="title">
                    <div class="head-text">
                        <h2>Category: {{ $post->category->name }}</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            <div class="card">
                                <div class="photo">
                                    <img src="{{ $post->getFirstMediaUrl('image') }}" class="card-img-top" alt="...">
                                    <a href="{{ route("site.posts.show",$post->id) }}" class="click">المزيد</a>
                                </div>
                                <a href="#" class="favourite">
                                    <i class="far fa-heart"></i>
                                </a>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">
                                        {{ $post->description }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection
