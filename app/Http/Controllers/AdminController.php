<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Order;

use App\Models\User;


use Carbon\Carbon;




class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }






    public function uploadproduct(Request $request)

    {
        $data=new product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage', $imagename);

        $data->image=$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->weight=$request->weight;

        $data->save();

        return redirect()->back()->with('message','Gem Added Successfully');

    }






    public function showproduct()
    {
        $data=product::all();

        return view('admin.showproduct', compact('data'));
    }





    public function deleteproduct($id)
    {

        $data=product::find($id);

        $data->delete();

        return redirect()->back()->with('message','Gem Deleted');

    }




    public function updateview($id)
    {
        $data=product::find($id);

        return view('admin.updateview', compact('data'));
    }





    public function updateproduct(Request $request, $id)
    {
        $data=product::find($id);

        $image=$request->file;

        if($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename);

            $data->image = $imagename;

        }

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->des;

        $data->weight=$request->weight;

        $data->save();

        return redirect()->back()->with('message','Gem Updated Successfully');

    }





    Public function showorder()
    {
        $order=order::all();
        return view('admin.showorder', compact('order'));
    }




    Public function updatestatus($id)
    {

        $order=order::find($id);

        $order->status='Delivered';

        $order->save();

        return redirect()->back();

    }




    Public function showusers()
    {

        $data=user::all();
        return view('admin.showusers', compact('data'));

    }




    Public function manageuser($id)
    {

        $data=user::find($id);

        return view('admin.manageuser', compact('data'));

    }





    public function deleteuser($id)
    {
        $data = user::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'User Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }




//    public function analytics()
//    {
//        $totalUsers = User::count();
//        $totalProducts = Product::count();
//        $totalOrders = Order::count();
//
//        return view('admin.analytics', compact('totalUsers', 'totalProducts', 'totalOrders'));
//    }

//    public function analytics()
//    {
//        $totalUsers = User::count();
//        $totalProducts = Product::count();
//        $totalOrders = Order::count();
//
//        // Grouping orders by hour for the last 24 hours in SQLite
//        $ordersPerHour = Order::selectRaw('strftime(\'%H\', created_at) as hour, COUNT(*) as count')
//            ->where('created_at', '>=', Carbon::now()->subDay())
//            ->groupBy('hour')
//            ->orderBy('hour', 'asc')
//            ->get();
//
//        $hours = $ordersPerHour->pluck('hour')->toArray();
//        $orderCounts = $ordersPerHour->pluck('count')->toArray();
//
//        return view('admin.analytics', compact('totalUsers', 'totalProducts', 'totalOrders', 'hours', 'orderCounts'));
//    }


    public function analytics()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        $ordersPerHour = Order::selectRaw('strftime(\'%H\', created_at) as hour, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->groupBy('hour')
            ->orderBy('hour', 'asc')
            ->get();

        $hours = $ordersPerHour->pluck('hour')->toArray();
        $orderCounts = $ordersPerHour->pluck('count')->toArray();

        return view('admin.analytics', compact('totalUsers', 'totalProducts', 'totalOrders', 'hours', 'orderCounts'));
    }


}
