
<!DOCTYPE html>
<html lang="en">
<head>

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

<h1 class="title">Add Gems</h1>




    @if(session()->has('message'))

        <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert">X</button>

        {{session()->get('message')}}

        </div>

    @endif




    <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">

        @csrf

    <div style="padding: 15px;">
        <label>Gem title</label>
        <input style="color: black;" type="text" name="title" placeholder="Give a Gem Name" required="">
    </div>


    <div style="padding: 15px;">
        <label>Price</label>
        <input style="color: black;" type="number" name="price" placeholder="Give a Price" required="">
    </div>

    <div style="padding: 15px;">
        <label>Description</label>
        <input style="color: black;" type="text" name="des" placeholder="Give a Description" required="">
    </div>

    <div style="padding: 15px;">
        <label>Weight</label>
        <input style="color: black;" type="text" name="weight" placeholder="Give a Weight" required="">
    </div>

    <div style="padding: 15px;">
       <input type="file" name="file">
    </div>

    <div style="padding: 15px;">

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
