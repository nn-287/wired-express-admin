<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\Category;
use App\Model\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class BannerController extends Controller
{
    function index()
    {
        $products = Product::orderBy('name')->get();
        $categories = Category::where(['parent_id'=>0])->orderBy('name')->get();
        return view('admin-views.banner.index', compact('products', 'categories'));
    }

    function list()
    {
        $banners=Banner::latest()->paginate();
        return view('admin-views.banner.list',compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ], [
            'title.required' => 'Title is required!',
        ]);

        if (!empty($request->file('image'))) {
            $image_name = Carbon::now()->toDateString() . "-" . uniqid() . "." . 'png';
            if (!Storage::disk('public')->exists('banner')) {
                Storage::disk('public')->makeDirectory('banner');
            }
            $note_img = Image::make($request->file('image'))->stream();
            Storage::disk('public')->put('banner/' . $image_name, $note_img);
        } else {
            $image_name = 'def.png';
        }

        $banner = new Banner;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->banner_position = $request->banner_position;
        $banner->category_id = $request->category_id;
        $banner->image = $image_name;
        $banner->save();
        Toastr::success('Banner added successfully!');
        return redirect('admin/banner/list');
    }

    public function edit($id)
    {
        $products = Product::orderBy('name')->get();
        $banner = Banner::find($id);
        $categories = Category::where(['parent_id'=>0])->orderBy('name')->get();
        return view('admin-views.banner.edit', compact('banner', 'products', 'categories'));
    }

    public function status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = $request->status;
        $banner->save();
        Toastr::success('Banner status updated!');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Title is required!',
        ]);

        $banner = Banner::find($id);

        if (!empty($request->file('image'))) {
            $image_name = Carbon::now()->toDateString() . "-" . uniqid() . "." . 'png';
            if (!Storage::disk('public')->exists('banner')) {
                Storage::disk('public')->makeDirectory('banner');
            }
            if (Storage::disk('public')->exists('banner/' . $banner['image'])) {
                Storage::disk('public')->delete('banner/' . $banner['image']);
            }
            $note_img = Image::make($request->file('image'))->stream();
            Storage::disk('public')->put('banner/' . $image_name, $note_img);
        } else {
            $image_name = $banner['image'];
        }

        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->banner_position = $request->banner_position;
        $banner->category_id = $request->category_id;
        $banner->image = $image_name;
        $banner->save();
        Toastr::success('Banner updated successfully!');
        return redirect('admin/banner/list');
    }

    public function delete(Request $request)
    {
        $banner = Banner::find($request->id);
        if (Storage::disk('public')->exists('banner/' . $banner['image'])) {
            Storage::disk('public')->delete('banner/' . $banner['image']);
        }
        $banner->delete();
        Toastr::success('Banner removed!');
        return back();
    }
}
