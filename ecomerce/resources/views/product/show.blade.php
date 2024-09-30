<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <img src="{{ $product->photo }}" alt="{{ $product->name }}">
    <p>Price: ${{ number_format($product->price, 2) }}</p>
    <p>Stock: {{ $product->stock }}</p>
    <p>{{ $product->description }}</p>
    <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</body>
</html>
