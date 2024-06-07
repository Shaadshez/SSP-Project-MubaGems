<x-site-layout>

    <div class="page-heading products-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>new arrivals of Gemstones</h4>
                        <h2>MubaGems</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <li>Naturals</li>
                        <li>Treated</li>
                        <li>Lots</li>
                    </ul>
                </div>
                <div class="section-heading">


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
                            <h6>${{$product->price}}</h6>
                            <p>{{$product->description}}</p>
                            <p align="right">{{$product->weight}}</p>

                            <form action="{{url('addcart', $product->id)}}" method="POST">

                                @csrf



                                <input class="btnn btn-primary" type="submit" value="Add Cart">

                            </form>

                        </div>
                    </div>
                </div>



            @endforeach

            @if(method_exists($data,'links'))

                <div class="d-flex justify-content-center">

                    {!! $data->links() !!}

                </div>

            @endif

        </div>
    </div>
</div>
</x-site-layout>

