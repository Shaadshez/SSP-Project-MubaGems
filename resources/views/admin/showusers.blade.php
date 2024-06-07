
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


        @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">X</button>

                {{session()->get('message')}}

            </div>

        @endif



            <table>
                <tr style="background-color: #0c5460">
                    <td style="padding: 20px">ID</td>
                    <td style="padding: 20px">Name</td>
                    <td style="padding: 20px">Email</td>
                    <td style="padding: 20px">Phone</td>
                    <td style="padding: 20px">Address</td>
                    <td style="padding: 20px">Status</td>
                    <td style="padding: 20px">Manage</td>
                    <td style="padding: 20px">Delete</td>
                </tr>

                @foreach($data as $user)
                    <tr style="background-color: black;">
                        <td style="padding: 30px">{{$user->id}}</td>
                        <td style="padding: 30px">{{$user->name}}</td>
                        <td style="padding: 30px">{{$user->email}}</td>
                        <td style="padding: 30px">{{$user->phone}}</td>
                        <td style="padding: 30px">{{$user->address}}</td>
                        <td style="padding: 30px">

                            @if($user->status == 'active')
                                Deactive
                            @else
                                Active
                            @endif
                        </td>

                        <td style="padding: 30px">
                            <a class="btn btn-primary" href="{{url('manageuser', $user->id)}}">Manage</a>
                        </td>
                        <td style="padding: 30px">
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure??')" href="{{url('deleteuser', $user->id)}}">Delete</a>
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
