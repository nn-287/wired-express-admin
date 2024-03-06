@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Branch</div>

                    <div class="card-body">
                    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $branch->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="store_id">Store ID</label>
                            <input type="text" class="form-control" id="store_id" name="store_id" value="{{ $branch->store_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $branch->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <input type="text" class="form-control" id="service_type" name="service_type" value="{{ $branch->service_type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $branch->address }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ $branch->status }}" required>
                        </div>

                        <div class="form-group">
                            <label for="featured">Featured</label>
                            <input type="text" class="form-control" id="featured" name="featured" value="{{ $branch->featured }}" required>
                        </div>

                        <div class="form-group">
                            <label for="coverage">Coverage</label>
                            <input type="text" class="form-control" id="coverage" name="coverage" value="{{ $branch->coverage }}" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        

                        <button type="submit" class="btn btn-primary">Update Branch</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
