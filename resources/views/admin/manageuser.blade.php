
<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">

    @include('admin.css')

    <style type="text/css">

        .title
        {
            color: white;
            padding-top: 25px;
            font-size: 25px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

    </style>

</head>
<body>

<!-- partial -->
<div class="container-scroller">
@include('admin.sidebar')
@include('admin.navbar')

<!-- partial -->


<div class="container-fluid page-body-wrapper">

    <div class="container" align="center">

        <h1 class="title">Manage User</h1>




        @if(session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">X</button>

                {{session()->get('message')}}

            </div>

        @endif




        <form action="{{url('showusers')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div style="padding: 35px;">
                <label>ID</label>
                <input style="color: black;" type="text" name="title" value="{{$data->id}}" required="">
            </div>


            <div style="padding-right: 80px;">
                <label for="status">Active OR Deactive</label>
                <select id="status" name="status" style="color: black;" value="{{$data->status}}" required>
                    <option value="active">Active</option>
                    <option value="deactive">Deactive</option>
                </select>
            </div>






            <div style="padding: 30px;">

                <input class="btn btn-success" type="submit" >
            </div>

        </form>

    </div>

</div>



<!-- partial -->

@include('admin.script')
</div>
</body>
</html>
