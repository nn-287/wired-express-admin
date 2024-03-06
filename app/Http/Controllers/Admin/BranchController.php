<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('admin-views.branch.index', compact('branches'));
    }

    public function create(Request $request)
    {
        
    // $validatedData = $request->validate([
    //     'name' => 'required|string|max:255',
    //     'store_id' => 'required',
    //     'email' => 'required|email',
    //     'password' => 'required|min:6',
    //     'service_type' => 'required',
    //     'address' => 'required|string',
    //     'status' => 'required',
    //     'featured' => 'required|boolean',
    //     'coverage' => 'required',
    //     'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
    // ]);

    
    // if ($request->hasFile('image')) 
    // {
    //     $image = $request->file('image');
    //     $imageName = time() . '_' . $image->getClientOriginalName();
    //     $image->move(public_path('images'), $imageName);
       
    //     $validatedData['image'] = $imageName;
    // }

    
    // Branch::create($validatedData);

    
    // return redirect()->route('admin.branches.create');   
    return view('admin-views.branch.create');

            
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
