@extends('layout.index')
@section('title', 'Bài viết')
@section('content')

{{-- <div style="background-color: rgb(206, 207 ,209); padding-bottom: 35px">
    <div class="child-content">
        <div class="container">
            <h3 style="text-align: center;padding-bottom: 15px;color: #600c8b !important">BÀI VIẾT</h3>
            <div class="row">
                @foreach ($list as $p)
                    <div class="col-sm-6" style="margin-bottom: 30px">
                        <div class="port-home-image">
                            <a href="/port/{{ $p->slug }}">
                                <img height="300px" title="{{ $p->title }}" width="100%" src="/storage/{{ $p->image }}"
                                    alt="">
                        </div>
                        </a>

                        <h6 class="port-home-title">
                            <a href="/port/{{ $p->slug }}">
                                {{ Str::limit($p->title, 60, '...') }}
                            </a>

                        </h6>
                    </div>
                @endforeach


            </div>
        </div>

    </div>
</div> --}}
    <div class="child-content">
        <div class="row">

            <div class="col-sm-12">
                <div class="port-list">
                    @foreach ($list as $p)
                        <a href="/port/{{ $p->slug }}" title="{{ $p->title }}">
                            <div class="port-item">
                                <div class="port-item-image">
                                    <img height="120px" width="100%" src="/storage/{{ $p->image }}" />
                                </div>
                                <div class="port-item-content">
                                    {{ $p->title }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div style="float: right; padding-right: 15px">
                    {{ $list->links() }}
                </div>

            </div>


        </div>
    </div>


@endsection
