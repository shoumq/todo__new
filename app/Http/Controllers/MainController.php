<?php

namespace App\Http\Controllers;

use App\Models\TODOList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $list = TODOList::latest()->get();
        return Inertia::render('Dashboard', compact('list', 'user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return Inertia::render('Profile/Profile', compact('user'));
    }

    public function delItem(Request $request)
    {
        TODOList::destroy($request->item_id);
    }

    public function addItem(Request $request)
    {
        $list = new TODOList();
        $list->title = $request->titleItem;
        $list->save();

        return $list;
    }

    public function saveItem(Request $request)
    {
        $list = TODOList::where('id', $request->item_id)->first();
        $list->title = $request->title;
        $list->save();
    }

    public function statusItem(Request $request)
    {
        $list = TODOList::where('id', $request->item_id)->first();
        $list->status = (int)$request->status;
        $list->save();

        return $list;
    }
}
