@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>
@endsection
