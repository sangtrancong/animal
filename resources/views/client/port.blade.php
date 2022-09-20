@extends('layout.index')
@section('title', 'Bài viết')
@section('content')


    <div class="child-content">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <div class="row">
                        @foreach ($list as $p)
                            <div class="col-sm-6" style="margin-bottom: 30px">
                                <div class="port-home-image">
                                    @if ($p->video_url != null||$p->video_url != '')
                                        <iframe width="100%" height="250px" allowfullscreen src="{{ $p->video_url }}">
                                        </iframe>
                                    @else
                                        <a href="/port/{{ $p->slug }}">
                                            <img height="250px" title="{{ $p->title }}" width="100%"
                                                src="/storage/{{ $p->image }}" alt="">
                                        </a>
                                    @endif
                                </div>


                                <h6 class="port-home-title">
                                    <a href="/port/{{ $p->slug }}">
                                        {{ Str::limit($p->title, 100, '...') }}
                                    </a>

                                </h6>
                            </div>
                        @endforeach


                    </div>
                    <div style="float: right; padding-right: 15px">
                        {{ $list->links() }}
                    </div>

                </div>
                <div  class="col-sm-4 homepage-left-content">
                    <img src="/storage/images/homepage/img1.jpg" width="100%" alt="">
                    <hr>
                    <img src="/storage/images/homepage/img2.jpg" width="100%" alt="">
                    <hr>
                    <img src="/storage/images/homepage/img3.png" width="100%" alt="">
                </div>

            </div>
        </div>

    </div>


@endsection
