@extends('layout.index')
@section('title', 'Sản phẩm')
@section('content')

    <div class="child-content">
        <div class="container">
            <div id="mobileProductHomepage">
                <div class="mobile-product" draggable="true" ontouchstart="handleDragStart(event)" ontouchmove="handleDragEnter(event)" ontouchend="handleDragEnd(event)" id="mobile-product">
                    <div class="product-item-mobile product-item1" id="product-item1">
                        <div  class="image-product-mobile">
                            @isset($product1[0])
                                <a href="{{ $product1[0]->url }}" target="blank">
                                    <img  height="200px" width="100%" src="/storage/{{ $product1[0]->image }}"
                                        alt="">
                                </a>
                            @endisset
                        </div>
                        <div class="content-product-mobile">
                            @isset($product1[0])
                                <a href="{{ $product1[0]->url }}" target="blank">
                                    {{ Str::limit($product1[0]->name, 60, '...') }}
                                </a>
                            @endisset
                        </div>
                    </div>
                    <div class="product-item-mobile product-item2">
                        <div  class="image-product-mobile">
                            @isset($product1[1])
                                <a href="{{ $product1[1]->url }}" target="blank">
                                    <img  height="200px" width="100%" src="/storage/{{ $product1[1]->image }}"
                                        alt="">
                                </a>
                            @endisset
                        </div>
                        <div class="content-product-mobile">
                            @isset($product1[1])
                                <a href="{{ $product1[1]->url }}" target="blank">
                                    {{ Str::limit($product1[1]->name, 60, '...') }}
                                </a>
                            @endisset
                        </div>
                    </div>
                    <div class="product-item-mobile product-item3">
                        <div  class="image-product-mobile">
                            @isset($product1[2])
                                <a href="{{ $product1[2]->url }}" target="blank">
                                    <img  height="200px" width="100%" src="/storage/{{ $product1[2]->image }}"
                                        alt="">
                                </a>
                            @endisset
                        </div>
                        <div class="content-product-mobile">
                            @isset($product1[2])
                                <a href="{{ $product1[2]->url }}" target="blank">
                                    {{ Str::limit($product1[2]->name, 60, '...') }}
                                </a>
                            @endisset
                        </div>
                    </div>
                    <div class="product-item-mobile product-item4">
                        <div  class="image-product-mobile">
                            @isset($product1[3])
                                <a href="{{ $product1[3]->url }}" target="blank">
                                    <img  height="200px" width="100%" src="/storage/{{ $product1[3]->image }}"
                                        alt="">
                                </a>
                            @endisset
                        </div>
                        <div class="content-product-mobile">
                            @isset($product1[3])
                                <a href="{{ $product1[3]->url }}" target="blank">
                                    {{ Str::limit($product1[3]->name, 60, '...') }}
                                </a>
                            @endisset
                        </div>
                    </div>
                    <div class="product-item-mobile product-item5" id="product-item5">
                        <div  class="image-product-mobile">
                            @isset($product2[0])
                                <a href="{{ $product2[0]->url }}" target="blank">
                                    <img  height="200px" width="100%" src="/storage/{{ $product2[0]->image }}"
                                        alt="">
                                </a>
                            @endisset
                        </div>
                        <div class="content-product-mobile">
                            @isset($product2[0])
                                <a href="{{ $product2[0]->url }}" target="blank">
                                    {{ Str::limit($product2[0]->name, 60, '...') }}
                                </a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div id="desktopProductHomepage">
                <div class="child-content">

                    <div class="container">
                        <div class="row carousel-list-homepage">
                            <div class="col-md-12">

                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                @foreach ($product1 as $p)
                                                    <div class="col-sm-3">
                                                        <div class="thumb-wrapper">
                                                            <div class="img-box">
                                                                <a href="{{ $p->url }}" target="blank"> <img
                                                                        style="max-height: 160px;"
                                                                        src="/storage/{{ $p->image }}" class="img-fluid"
                                                                        alt=""></a>

                                                            </div>
                                                            <div class="thumb-content">
                                                                <a href="{{ $p->url }}" target="blank">
                                                                    <h6 style="font-size: 12px">
                                                                        {{ Str::limit($p->name, 20, '...') }}</h6>
                                                                </a>


                                                                <a href="{{ $p->url }}" target="blank"
                                                                    class="btn btn-primary">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach



                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                @foreach ($product2 as $p)
                                                    <div class="col-sm-3">
                                                        <div class="thumb-wrapper">
                                                            <div class="img-box">
                                                                <img style="max-height: 160px;"
                                                                    src="/storage/{{ $p->image }}" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                            <div class="thumb-content">
                                                                <h6 style="font-size: 12px">{{ Str::limit($p->name, 20, '...') }}
                                                                </h6>

                                                                <a href="#" class="btn btn-primary">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach



                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <div class="row">
                                                @foreach ($product3 as $p)
                                                    <div class="col-sm-3">
                                                        <div class="thumb-wrapper">
                                                            <div class="img-box">
                                                                <img style="max-height: 160px;"
                                                                    src="/storage/{{ $p->image }}" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                            <div class="thumb-content">
                                                                <h6 style="font-size: 12px">{{ Str::limit($p->name, 20, '...') }}
                                                                </h6>

                                                                <a href="#" class="btn btn-primary">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach



                                            </div>
                                        </div>


                                    </div>
                                    <!-- Carousel controls -->
                                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="search-group">
                <form action="/san-pham">
                    <h6 class="text-center" style="color: white">Tìm kiếm sản phẩm</h6>
                    <div class="searchBar">
                        <select name="category" onchange="this.form.submit()"  class="selectFilter">
                            <option  class="custom-option" value="all">Tất cả</option>
                            @foreach ($cats as $c)
                                <option {{request()->category==$c->id?'selected':''}} class="custom-option"  value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                        <div class="search-content">
                            <input  class="inputSearch" value="{{request()->productName}}" name="productName" type="text" >
                            <button class="btn-custom-search" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

            </div> --}}
            <div class="search-group-mobile">
                <form action="/san-pham">
                    <div class="searchBar-mobile">
                        <select style="width: 100%; text-align: center" name="category" onchange="this.form.submit()"  class="selectFilter">
                            <option  class="custom-option" value="all">Tất cả</option>
                            @foreach ($cats as $c)
                                <option {{request()->category==$c->id?'selected':''}} class="custom-option"  value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

            </div>

            <div class="row">
                <div class="col-md-3 product-left-col">
                    <h5>DANH MỤC</h5>
                    <ul class="list-group">
                        @foreach ($cats as $c)
                        <a href="/san-pham?category={{$c->id}}" class="list-group-item list-group-item-action list-group-item-info">{{$c->name}}</a>
                        @endforeach
                      </ul>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($products as $p)
                            <div class="col-md-4 product-item">
                                <div class="card" style="text-align: center"  >
                                    <a target="blank" href="{{$p->url}}"><img class="card-img-top"  src="/storage/{{$p->image}}" alt="Card image cap"></a>
                                    <div class="card-body">
                                       <a href="{{$p->url}}"><p style="font-size: 13px" class="card-title">{{Str::limit($p->name ,40,$end='...') }}</p></a>
                                        {{-- <p class="card-text">Some quick example text to buil .</p> --}}
                                        <a href="{{ $p->url }}" target="blank" class="btn btn-custom">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{ $products->links() }}
                </div>
            </div>

        </div>


    </div>

@endsection
