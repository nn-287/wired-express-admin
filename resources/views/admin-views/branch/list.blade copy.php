@extends('layouts.admin.app')

@section('title', 'Branches')

@push('css_or_js')
 
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> Branches</h1>
                </div>
                <div class="col-auto">
                    <form action="{{ route('admin.branch.add-new') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Create New Branch</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        

        <!-- Display Branches Data -->
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Store ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Service Type</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Coverage</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                            <tr>
                                <th scope="row">{{ $branch->id }}</th>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->store_id }}</td>
                                <td>{{ $branch->email }}</td>
                                <td>{{ $branch->service_type }}</td>
                                <td>{{ $branch->address }}</td>
                                <td>{{ $branch->status }}</td>
                                <td>{{ $branch->featured }}</td>
                                <td>{{ $branch->coverage }}</td>
                                <td>
                                     <!-- Update  -->
                                <form action="{{ route('admin.branch.update', $branch->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                                    
                                    <!-- Delete  -->
                                    <form action="{{ route('admin.branch.delete', $branch->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this branch?')">Delete</button>
                                    </form>

                                </td>
                                
                               
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- End Display Branches Data -->
    </div>
@endsection

@push('script')
   
@endpush

@push('script_2')
   
@endpush
