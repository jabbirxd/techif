@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="py-4 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Order #{{ $order->id }} Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                            <p><strong>Total Amount:</strong> {{ $order->total_price }}</p>
                            <p><strong>Status:</strong> {{ $order->status_message ?? $order->status }}</p>
                            <p><strong>Payment Mode:</strong> {{ $order->payment_mode ?? 'N/A' }}</p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                        </div>

                        <h5 class="mb-3">Products</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity * $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 text-end">
                            <a href="{{ url('admin/orders') }}" class="btn btn-secondary">Back to Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
