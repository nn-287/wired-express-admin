<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BranchController extends Controller
{
    public function list()
    {
        $branches = Branch::paginate(10);
        return view('admin-views.branch.list', compact('branches'));
    }

    public function add_new()
    {
    return view('admin-views.branch.add-new');
    }


    public function store(Request $request)
    {
        
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'service_type' => 'required',
        'address' => 'required|string',
        'coverage' => 'required',
        'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
    ]);


    if (!empty($request->file('image'))) {
        $image_name = Carbon::now()->toDateString() . "-" . uniqid() . "." . 'png';
        if (!Storage::disk('public')->exists('branch')) {
            Storage::disk('public')->makeDirectory('branch');
        }
        $note_img = Image::make($request->file('image'))->stream();
        Storage::disk('public')->put('branch/' . $image_name, $note_img);

        $validatedData['image'] = $image_name;

    } else {
        $image_name = 'def.png';
    }
    $validatedData['password'] = bcrypt($request->password);

    Branch::create($validatedData);
    Toastr::success('Branched added successfully!');
    return redirect()->route('admin.branch.list');    
    }

    public function update(Request $request,$id)
    {
        // $productBranch = Branch::findOrFail($id);

        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'store_id' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        //     'service_type' => 'required',
        //     'address' => 'required|string',
        //     'status' => 'required',
        //     'featured' => 'required|boolean',
        //     'coverage' => 'required',
        //     'image' => 'nullable|image'
        //  ],[
        //     'image.image' => 'The image must be an image file.',
        //     'image.max' => 'The image size must not exceed 4 MB.'
        // ]);

        
        // $productBranch = new Branch();
        // $productBranch->name = $validatedData['name'];
        // $productBranch->store_id = $validatedData['store_id'];
        // $productBranch->email = $validatedData['email'];
        // $productBranch->password = bcrypt($validatedData['password']); 
        // $productBranch->service_type = $validatedData['service_type'];
        // $productBranch->address = $validatedData['address'];
        // $productBranch->status = $validatedData['status'];
        // $productBranch->featured = $validatedData['featured'];
        // $productBranch->coverage = $validatedData['coverage'];
        

        // $productBranch->save();
        return redirect()->route('admin.branches.update');

        
    }
    
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully');
    }

    
}
