{{-- resources/views/admin/orders/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Customer Orders')

@section('content')
<h1>Customer Orders</h1>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if ($orders->isEmpty())
    <p class="text-muted text-center">No orders found.</p>
@else
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total Price</th>
                <th>Session</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ number_format($order->total_price, 2) }} $</td>
                    <td>
                        <form action="{{ route('admin.orders.updateSession', $order->id) }}" method="POST">
                            @csrf
                            <select name="session" {{ $order->session == 'none' ? 'disabled' : '' }}>
                                <option value="none" {{ $order->session == 'none' ? 'selected' : '' }}>None</option>
                                <option value="packing" {{ $order->session == 'packing' ? 'selected' : '' }}>Packing</option>
                                <option value="transport" {{ $order->session == 'transport' ? 'selected' : '' }}>Transport</option>
                                <option value="success" {{ $order->session == 'success' ? 'selected' : '' }}>Success</option>
                            </select>
                            @if($order->session != 'none')
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
