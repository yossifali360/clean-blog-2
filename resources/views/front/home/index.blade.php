@extends('front.layouts.app')
@section('content')
    <style>
        .commentDate {
            font-size: 11px;
        }

        .info img {
            width: 30px;
            height: 30px;
        }
    </style>

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/home-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @foreach ($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview card p-2 rounded-2">
                        <a href="post.html">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->body }}</h3>
                        </a>
                        <img src="{{ asset('public/' . $post->image) }}" class="w-100 rounded-2" alt="postImg"
                            height="400px">
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            {{ $post->created_at->format('F j, Y') }}
                        </p>
                        <form action="" method="POST">
                            <div class="form-group mb-2 border p-2 rounded-2">
                                <label for="exampleInputName1">Your Name</label>
                                <input type="text" name="comment_name" class="form-control w-25 rounded-2 my-2"
                                    id="exampleInputName1">
                                <label for="exampleInputName1">Your Comment</label>
                                <input type="text" name="comment_text" class="form-control rounded-2 my-2"
                                    id="exampleInputName1">
                                <div class="d-flex justify-content-end my-2">
                                    <input type="submit" name="submit" class="btn btn-primary p-2 rounded-2">
                                    <input type="text" name="article_id" hidden value="1">
                                </div>
                            </div>
                        </form>
                        <div class="comments card p-2 rounded-2">
                            @foreach ($post->comments as $comment)
                                <div class="border m-2 p-2 rounded-2">
                                    <div class="info d-flex align-items-center gap-3">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png"
                                            alt="">
                                        <div>
                                            <h6 class="m-0">{{$comment->name}}</h6>
                                            <span class="text-muted commentDate">{{$comment->created_at}}</span>
                                        </div>
                                    </div>
                                    <p class="m-1">{{$comment->content}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach

                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
