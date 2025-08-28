<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Post;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->month;
        $thisYear = Carbon::now()->year;

        $total_product = Product::count();
        $total_category = Category::count();
        $total_order = Order::count();
        $total_alluser = User::count();
        $total_user = User::where('is_admin', 0)->count();
        $total_admin = User::where('is_admin', 1)->count();
        $today_orders = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrders = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrders = Order::whereYear('created_at', $thisYear)->count();

        // Total des posts de blog
        $total_posts = Post::count();

        // Total des témoignages
        $total_testimonials = Testimonial::count();

        return view('admin.dashboard', [
            'total_product' => $total_product,
            'total_category' => $total_category,
            'total_order' => $total_order,
            'total_alluser' => $total_alluser,
            'total_user' => $total_user,
            'total_admin' => $total_admin,
            'today_orders' => $today_orders,
            'thisMonthOrders' => $thisMonthOrders,
            'thisYearOrders' => $thisYearOrders,
            'total_posts' => $total_posts,
            'total_testimonials' => $total_testimonials 
        ]);
    }
}
