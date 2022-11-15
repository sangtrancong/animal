@extends('layout.index')
@section('meta')
    <meta property="og:title" content="{{ $port->title }}" />
    <meta property="og:url" content="{{config('hostserver.domain') . 'port/' . $port->slug}}"/>
    <meta property="og:image" content="{{ config('hostserver.domain') . 'storage/' . $port->image }}" />
    <meta property="og:type" content="website" />
    <meta property="og:image:url" content="{{ config('hostserver.domain') . 'storage/' . $port->image }}" />
    <meta property="og:image:secure_url" content="{{ config('hostserver.domain') . 'storage/' . $port->image }}" />
    <meta property="og:description" content="{{ $port->short_content }}" />
    <meta name="twitter:card" content="summary" />
    <meta property="twitter:title" content="{{ $port->title }}" />
    <meta property="twitter:image" content="{{ config('hostserver.domain') . 'storage/' . $port->image }}" />
    <meta property="twitter:image:url" content="{{ config('hostserver.domain') . 'storage/' . $port->image }}" />
    <meta property="twitter:description" content="{{ $port->short_content }}" />
    <link rel="canonical" href="{{config('hostserver.domain') . 'port/' . $port->slug}}" />
@endsection
@section('title', 'Article')
@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v15.0"
        nonce="z7Ot7cfL"></script>
    <div class="child-content">
        <div class="container">
            <div class="row">

                <div class="col-sm-8">
                    <h3>{{ $port->title }}</h3>
                    <i>
                        @php
                            $diff = Carbon\Carbon::now()->diffInMinutes($port->updated_at);
                            if ($diff < 60) {
                                echo $diff . ' minute ago';
                            } elseif ($diff > 60 && $diff < 60 * 24) {
                                $diff = Carbon\Carbon::now()->diffInHours($port->updated_at);
                                echo $diff . ' hours ago';
                            } else {
                                $date = Carbon\Carbon::parse($port->updated_at)->format('m/d/Y H:i');
                                echo $date;
                            }
                        @endphp
                    </i>

                    <hr>
                    <style>
                        #M838529ScriptRootC1376678 {
                            min-height: 300px;
                        }
                    </style>
                    <!-- Composite Start -->
                    <div id="M838529ScriptRootC1376678"></div>
                    <script src="https://jsc.adskeeper.com/a/n/animalstoriesplus.com.1376678.js" async></script>
                    <!-- Composite End -->
                    @if ($port->video_url != null)
                        <iframe width="100%" height="400px" allowfullscreen
                            src="https://www.youtube.com/embed/{{ $port->video_url }}">
                        </iframe>
                    @endif
                    <h5>{{ $port->short_content }}</h5>
                    <div id="portContentDetailPage" class="portContentDetailPage">
                        {!! $port->content !!}
                    </div>
                    <div style="margin-bottom: 25px" class="text-right">
                        <a id="btnCoppy" style="margin-top: -8px; line-height: 1.3 !important;color: white" target="blank"
                            href="https://twitter.com/intent/tweet?url={{ config('hostserver.domain') . 'port/' . $port->slug }}"
                            class="btn btn-sm btn-primary" title="Coppy link"><i class="fa fa-twitter"></i>&nbsp;<b>
                                Share</b> </a>
                        <div class="fb-share-button" data-href="{{ config('hostserver.domain') . 'port/' . $port->slug }}"
                            data-layout="button_count" data-size="large"><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fsss%2F&amp;src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">Share</a></div>
                        <button id="btnCoppy" style="margin-top: -8px; line-height: 1.3 !important"
                            class="btn btn-sm btn-primary" title="Coppy link" onclick="copyText()"><i
                                class="fa fa-copy"></i></button>

                    </div>

                </div>
                <div class="col-sm-4">
                    @foreach ($portOther as $p)
                        <div class="item-article">
                            <span class="image-item">
                                <a href="/port/{{ $p->slug }}"> <img height="75px" width="100px"
                                        src="/storage/{{ $p->image }}" /></a>
                            </span>
                            <span> <a href="/port/{{ $p->slug }}">{{ $p->title }}</a></span>
                        </div>
                        <hr />
                    @endforeach
                    <!-- Composite Start -->
                    <div id="M838529ScriptRootC1376686">
                    </div>
                    <script src="https://jsc.adskeeper.com/a/n/animalstoriesplus.com.1376686.js" async></script>
                    <!-- Composite End -->
                </div>

            </div>
            <div class="col-sm-8 ">
                <!-- Composite Start -->
                <div id="M838529ScriptRootC1382553"></div>
                <script src="https://jsc.adskeeper.com/a/n/animalstoriesplus.com.1382553.js" async></script>
                <!-- Composite End -->
            </div>

            <!-- Composite Start -->
            <div id="M838529ScriptRootC1376694"></div>
            <script src="https://jsc.adskeeper.com/a/n/animalstoriesplus.com.1376694.js" async></script>
            <!-- Composite End -->

        </div>

    </div>


@endsection
@section('script')
    <script>
        function copyText() {
            var myServerData = <?= json_encode(Request::url()) ?>;
            /* Copy text into clipboard */
            navigator.clipboard.writeText(myServerData);
        }
        var adskeeper = '<div id="M838529ScriptRootC1378911"></div>';
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.src = "https://jsc.adskeeper.com/a/n/animalstoriesplus.com.1378911.js";
        $("#portContentDetailPage p:nth-child(4)").append(adskeeper);
        $("#portContentDetailPage p:nth-child(4)").append(s);
    </script>
@endsection
