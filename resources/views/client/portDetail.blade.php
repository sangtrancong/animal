@extends('layout.index')
@section('title', 'Bài viết')
@section('content')

    <div class="child-content">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <h3>{{$port->title}}</h3>
                    <i>
                        @php
                        $diff= Carbon\Carbon::now()->diffInMinutes($port->updated_at);
                                if ( $diff<60) {
                                    echo $diff." minute ago";
                                }
                                else if ($diff>60 && $diff<60*24) {
                                    $diff= Carbon\Carbon::now()->diffInHours($port->updated_at);
                                    echo $diff." hours ago";
                                }
                                else {
                                    $date=Carbon\Carbon::parse($port->updated_at)->format('m/d/Y H:i');
                                    echo $date;
                                }
                        @endphp
                    </i>

                    <hr>
                    @if ($port->video_url!=null)
                    <iframe width="100%" height="400px" allowfullscreen
                    src="{{$port->video_url}}">
                    </iframe>
                    @endif
                    <h5>{{$port->short_content}}</h5>
                    <div class="portContentDetailPage">
                        {!! $port->content !!}
                    </div>


                </div>
                <div class="col-sm-4">
                    @foreach ($portOther as $p)
                    <div class="item-article">
                        <span class="image-item">
                            <a href="/port/{{$p->slug}}" > <img height="75px" width="100px"
                                src="/storage/{{$p->image}}" /></a>
                        </span>
                        <span> <a href="/port/{{$p->slug}}" >{{$p->title}}</a></span>
                    </div>
                    <hr />
                    @endforeach

                </div>

            </div>
        </div>

    </div>


@endsection
