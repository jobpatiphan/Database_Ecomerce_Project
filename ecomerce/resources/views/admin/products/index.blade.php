{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Product List')

@section('content')
<h1>Product List</h1>

@if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="error-alert">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }} $</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if ($product->photo)
                        <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo">
                    @else
                        No Photo
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Links -->
{{ $products->links() }}
@endsection

@section('scripts')
<script>
    setTimeout(() => {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        if (successAlert) successAlert.style.display = 'none';
        if (errorAlert) errorAlert.style.display = 'none';
    }, 5000);
</script>
@endsection
