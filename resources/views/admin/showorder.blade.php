
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

<div class="container-fluid page-body-wrapper">

    <div class="container" align="center">

        <table>
            <tr style="background-color: #0c5460;">
                <td style="padding: 20px;">Customer Name</td>
                <td style="padding: 20px;">Phone</td>
                <td style="padding: 20px;">Address</td>
                <td style="padding: 20px;">Product Title</td>
                <td style="padding: 20px;">Price</td>
                <td style="padding: 20px;">Weight</td>
                <td style="padding: 35px;">Status</td>
                <td style="padding: 30px;">Action</td>

            </tr>

            @foreach($order as $orders)

            <tr align-items="center" style="background-color: black;">
                <td style="padding: 30px">{{$orders->name}}</td>
                <td style="padding: 30px">{{$orders->phone}}</td>
                <td style="padding: 30px">{{$orders->address}}</td>
                <td style="padding: 30px">{{$orders->product_name}}</td>
                <td style="padding: 35px">{{$orders->price}}</td>
                <td style="padding: 30px">{{$orders->weight}}</td>
                <td style="padding: 35px">{{$orders->status}}</td>
                <td style="padding: 35px">
                    <a class="btn btn-success" href="{{url('updatestatus', $orders->id)}}">
                        Delivered
                    </a>
                </td>
            </tr>

            @endforeach

        </table>




    </div>
</div>




<!-- partial -->

@include('admin.script')
</div>
</body>
</html>
