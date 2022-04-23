<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->whereHas('items', function ($item) {
            $item->where('status', 1);
        })->with('items', function ($item) {
            $item->where('status', 1);
        })->get();
        foreach ($categories as $category) {
            $category->name_as_id = str_replace(' ', '', $category->name);
        }
        return view('website.index', compact('categories'));
    }
}
