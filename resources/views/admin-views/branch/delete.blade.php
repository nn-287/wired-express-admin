@extends('layouts.admin.app')

@section('title', 'Delete Branch')

@section('content')
    <div class="container">
        <h1>Delete Branch</h1>
        <p>Are you sure you want to delete this branch?</p>
        <form action="{{ route('branches.delete', $branch->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
