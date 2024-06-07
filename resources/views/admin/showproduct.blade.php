
<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

</head>
<body>

<!-- partial -->
<div class="container-scroller">
@include('admin.sidebar')


@include('admin.navbar')

<!-- partial -->

<div style="padding-bottom:40px;" class="container-fluid page-body-wrapper">

    <div class="container" align="center">

        @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">X</button>

                {{session()->get('message')}}

            </div>

        @endif


        <table>

          <tr style="background-color: #0c5460">
              <td style="padding: 20px">Title</td>
              <td style="padding: 20px">Description</td>
              <td style="padding: 20px">Price</td>
              <td style="padding: 20px">Weight</td>
              <td style="padding: 20px">Image</td>
              <td style="padding: 20px">Update</td>
              <td style="padding: 20px">Delete</td>


          </tr>
            @foreach($data as $product)

            <tr align-items="center" style="background-color: black;">

                <td style="padding: 30px">{{$product->title}}</td>
                <td style="padding: 30px">{{$product->description}}</td>
                <td style="padding: 30px">{{$product->price}}</td>
                <td style="padding: 30px">{{$product->weight}}</td>
                <td>
                    <img height="160" width="150" src="/productimage/{{$product->image}}">
                </td>

                <td style="padding: 30px">
                    <a class="btn btn-primary" href="{{url('updateview', $product->id)}}">Update</a>
                </td>


                <td style="padding: 30px">
                    <a class="btn btn-danger" onclick="return confirm('Are You Sure??')" href="{{url('deleteproduct',$product->id)}}">Delete</a>
                </td>

            </tr>

            @endforeach


        </table>


        <div>

        </div>
    </div>
</div>


<!-- partial -->

@include('admin.script')
    </div>

</body>
</html>
