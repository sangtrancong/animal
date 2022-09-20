@extends('layout.index')
@section('title', 'Trang chủ')
@section('content')

    <div style=" padding-bottom: 35px">
        {{-- <div class="child-content">
            <div class="row">
                <div class="col-sm-8">
                    @foreach ($hotContent as $post)
                        <div style="margin-bottom: 15px" class="card text-center">
                            <div class="card-header">


                                @php
                                $diff= Carbon\Carbon::now()->diffInMinutes($post->updated_at);
                                        if ( $diff<60) {
                                            echo "Posted ".$diff." minute ago";
                                        }
                                        else if ($diff>60 && $diff<60*24) {
                                            $diff= Carbon\Carbon::now()->diffInHours($post->updated_at);
                                            echo "Posted ".$diff." hours ago";
                                        }
                                        else {
                                            $date=Carbon\Carbon::parse($post->updated_at)->toFormattedDateString();
                                            echo "Posted On ".$date;
                                        }
                                @endphp
                            </div>
                            <div class="card-body">
                                <h5 style="text-align: center" class=""> <a href="/port/{{ $post->slug }}">{{ $post->title }}</a></h5>
                                @if ($post->video_url != null)
                                    <iframe width="100%" height="400px" allowfullscreen src="{{ $post->video_url }}">
                                    </iframe>
                                @else
                                <a href="/port/{{ $post->slug }}">
                                    <img width="100%" src="/storage/{{ $post->image }}" alt="">
                                </a>
                                @endif

                                <p class="card-text"> <a href="/port/{{ $post->slug }}">{{ $post->short_content }}</a></p>

                            </div>

                        </div>
                    @endforeach
                    <div class="text-center"><a class="btn btn-primary" href="/port">Read more</a></div>

                </div>
                <div  class="col-sm-4 homepage-left-content">
                    <img src="/storage/images/homepage/img1.jpg" width="100%" alt="">
                    <hr>
                    <img src="/storage/images/homepage/img2.jpg" width="100%" alt="">
                    <hr>
                    <img src="/storage/images/homepage/img3.png" width="100%" alt="">
                </div>
            </div>



        </div> --}}
        <div class="child-content">
            <div class="container  flexContent">
                <div  class="col-left-top">
                    @isset($hotContent[0])
                    <div class="top-port-new ">
                        <article class="thumb"><a href="/port/{{$hotContent[0]->slug}}"><img width="100%" style="max-width: 400px; float: left; padding-right: 15px" src="/storage/{{$hotContent[0]->image}}" alt=""></a> </article>
                        <h4 class="title-port"><a href="/port/{{$hotContent[0]->slug}}">{{$hotContent[0]->title}}</a></h4>
                        <p class="short-content"><a href="/port/{{$hotContent[0]->slug}}">{{$hotContent[0]->short_content}}</a></p>
                    </div>
                    @endisset

                    <div class="sub-port-new">
                        <div class="row">
                            @isset($hotContent[1])
                            <div class="col-sm-6" style="border-right: solid 2px #eae7e7">
                                <h5 class="title-port"><a href="/port/{{$hotContent[1]->slug}}">{{$hotContent[1]->title}}</a></h5>
                                <div class="short-content"><a href="/port/{{$hotContent[1]->slug}}">{{$hotContent[1]->short_content}}</a></div>
                            </div>
                            @endisset
                            @isset($hotContent[2])
                            <div class="col-sm-6">
                                <h5 class="title-port"><a href="/port/{{$hotContent[2]->slug}}">{{$hotContent[2]->title}}</a></h5>
                                <div class="short-content"><a href="/port/{{$hotContent[2]->slug}}">{{$hotContent[2]->short_content}}</a></div>
                            </div>
                            @endisset



                        </div>
                    </div>
                </div>
                <div class="col-right-top">
                    <img width="100%" src="/storage/images/homepage/img4.jpg" alt="">
                    <img width="100%" src="/storage/images/homepage/img2.jpg" alt="">
                    <img width="100%" src="/storage/images/homepage/img1.jpg" alt="">
                </div>
            </div>
            <div class="news container">

                <h1 class="text-center" ><a style="color: #bd2b08" href="/suc-khoe">Dog</a> </h1>
                <br>
                <div class="port-new-content">
                    <div class="row">
                        @foreach ($dogContent as $h)
                        <div class="col-sm-6  port-new-item">
                            <h5 class="title-port"><a href="/port/{{$h->slug}}">{{$h->title}}</a></h5>
                            <article class="thumb"> <a href="/port/{{$h->slug}}"><img width="100%" style="max-width: 200px; min-height: 115px; float: left; padding-right: 15px" src="/storage/{{$h->image}}" alt=""></a></article>
                            <p class="short-content"><a href="/port/{{$h->slug}}">{{$h->short_content}}</a></p>
                        </div>
                        @endforeach

                    </div>
                    <div> <a class="btn btn-custom" href="/dog">Read More</a></div>
                </div>
            </div>
            <div class="news container" style="">
                <hr>
                <h1 class="text-center" ><a style="color: #bd2b08 " href="/giao-duc">Cat</a></h1>
                <br>
                <div class="port-new-content">
                    <div class="row">
                        @foreach ($catContent as $h)
                        <div class="col-sm-6  port-new-item">
                            <h5 class="title-port"><a href="/port/{{$h->slug}}">{{$h->title}}</a></h5>
                            <article class="thumb"> <a href="/port/{{$h->slug}}"><img width="100%" style="max-width: 200px; min-height: 115px; float: left; padding-right: 15px" src="/storage/{{$h->image}}" alt=""></a></article>
                            <p class="short-content"><a href="/port/{{$h->slug}}">{{$h->short_content}}</a></p>
                        </div>
                        @endforeach

                    </div>
                    <div> <a class="btn btn-custom"  href="/cat">Read more</a></div>
                </div>
            </div>

        </div>
    </div>

@endsection
