
<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>


                    <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 10px;">

                        @csrf

                        <input class="form-control" type="search" name="search" placeholder="search">

                        <input type="submit" value="Search" class="btn btn-success">

                    </form>


                </div>
            </div>


            @foreach($data as $product)



            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img height="300" width="200" src="/productimage/{{$product->image}}" alt=""></a>
                    <div class="down-content">
                        <a href="#"><h4>{{$product->title}}</h4></a>
                            <h6 >${{$product->price}}</h6>
                            <p>{{$product->description}}</p>
                        <p align="right">{{$product->weight}}</p>

{{--                        <form action="{{url('addcart', $product->id)}}" method="POST">--}}

{{--                            @csrf--}}

{{--                            <input class="btnn btn-primary" type="submit" value="Add Cart">--}}

{{--                        </form>--}}


                        @if ($product->price >= 120)
                            <form action="{{url('/contact')}}">
                                <input class="btnn btn-primary" type="submit" value="Visit Store">
                            </form>
                        @else
                            <form action="{{url('addcart', $product->id)}}" method="POST">

                                @csrf

                                <input class="btnn btn-primary" type="submit" value="Add Cart">

                            </form>
                        @endif

                    </div>
                </div>
            </div>



            @endforeach

            @if(method_exists($data,'links'))

            <div class="d-flex justify-content-center" style="margin-top: 20px">

            {!! $data->links() !!}

            </div>

            @endif

        </div>
    </div>
</div>
