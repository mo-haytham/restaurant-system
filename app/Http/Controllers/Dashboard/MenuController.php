<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    use ImageTrait;
    public function index_category()
    {
        $categories = Category::where('status', 1)->get();
        return view('dashboard.menu.categories.index', compact('categories'));
    }

    public function new_category()
    {
        return view('dashboard.menu.categories.new');
    }

    public function save_category(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        $back_message = ['custom_success' => 'Category saved'];
        return redirect()->route('dashboard.categories')->with($back_message);
    }

    public function edit_category($category_id)
    {
        $category = Category::find($category_id);
        return view('dashboard.menu.categories.edit', compact('category'));
    }

    public function update_category(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $old_name = $category->name;
        $category->name = $request->name;
        $category->save();
        $back_message = ['custom_success' => $old_name . ' category updated to ' . $category->name];
        return redirect()->route('dashboard.categories')->with($back_message);
    }

    public function delete_category(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->status = 0;
        $category->save();
        $back_message = ['custom_success' => $category->name . ' category deleted'];
        return redirect()->back()->with($back_message);
    }

    public function index_item()
    {
        $items = Item::where('status', 1)->get();
        return view('dashboard.menu.items.index', compact('items'));
    }

    public function new_item()
    {
        $categories = Category::where('status', 1)->get();
        return view('dashboard.menu.items.new', compact('categories'));
    }

    public function save_item(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        try {
            if (isset($request->image)) {
                $image = $this->saveImage($request->image, 'uploads/menu');
            } else {
                $image = null;
            }

            $item = Item::create([
                'name' => $request->name,
                'price' => $request->price,
                'image_url' => $image,
                'category_id' => $request->category_id
            ]);
            if (isset($request->description)) {
                $item->description()->create([
                    'description' => $request->description
                ]);
            }

            $back_message = ['custom_success' => 'Item add successfully'];
            return redirect()->route('dashboard.items')->with($back_message);
        } catch (\Throwable $th) {
            $back_message = ['custom_error' => $th->getMessage()];
            return redirect()->route('dashboard.items')->with($back_message);
        }
    }

    public function edit_item($item_id)
    {
        $item = Item::find($item_id);
        $categories = Category::where('status', 1)->get();
        return view('dashboard.menu.items.edit', compact('item', 'categories'));
    }

    public function update_item(Request $request, $item_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        try {

            $item = Item::find($item_id);

            if (isset($request->image)) {
                $this->deleteImage($item->image_url);
                $image = $this->saveImage($request->image, 'uploads/menu');
            } else {
                $image = $item->image_url;
            }

            $item->update([
                'name' => $request->name,
                'price' => $request->price,
                'image_url' => $image,
                'category_id' => $request->category_id
            ]);
            if (isset($request->description)) {
                if (isset($item->description)) {
                    $item->description()->update([
                        'description' => $request->description
                    ]);
                } else {
                    $item->description()->create([
                        'description' => $request->description
                    ]);
                }
            }

            $back_message = ['custom_success' => 'Item updated successfully'];
            return redirect()->route('dashboard.items')->with($back_message);
        } catch (\Throwable $th) {
            $back_message = ['custom_error' => $th->getMessage()];
            return redirect()->route('dashboard.items')->with($back_message);
        }
    }

    public function delete_item(Request $request)
    {
        $item = Item::find($request->item_id);
        $item->status = 0;
        $item->save();
        $back_message = ['custom_success' => $item->name . ' item deleted'];
        return redirect()->back()->with($back_message);
    }
}
