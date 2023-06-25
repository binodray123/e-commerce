<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProducts = Product::count();
        // $totalAllUsers = User::count();

        $todayDate = Carbon::now()->format('d-m-y');
        $thisMonth = Carbon::now()->format('m');

        // $totalOrders = Order::count();
        // Total orders in today
        $todayOrders = Order::whereDate('created_at', $todayDate)->count();
        // Total orders in this month
        $thisMonthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        // Total pending orders taken from order table of status column
        $totalPaymentStatus = Order::where('payment_status', 'pending')->count();

        $orders = Order::with('product','user')->latest()->get();

        return view('admin.dashboard',
            compact('totalProducts', 'todayOrders', 'thisMonthOrders', 'totalPaymentStatus','orders')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function login()
    {
        return view('admin.login');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        $admin = Admin::where('email', '=', $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->Session()->put('loginId', $admin->id);

                return redirect()->route('admins.dashboard')->with('success', 'Welcome to Dashboard');
            } else {
                return back()->with('fail', 'Password is not matches');
            }
        } else {
            return back()->with('fail', 'This email is not registered for Admin');
        }
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('admins.login');
        }
    }
}
