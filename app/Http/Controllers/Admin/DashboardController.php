<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $admins = User::where('level', 'admin')->count();
        $users = User::where('level', 'user')->count();
        $news = News::count();
        $announcements = Announcement::count();

        return view('admin-panel.pages.dashboard', compact(
            'admins',
            'users',
            'news',
            'announcements'
        ));
    }
}
