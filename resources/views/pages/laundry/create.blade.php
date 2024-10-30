@extends('layouts.app')

@section('title', 'Add Laundry Transaction')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Laundry Transaction</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaction Details</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('laundry.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            </div>

                            <div class="form-group">
                                <label for="note_number">Note Number</label>
                                <input type="text" class="form-control" id="note_number" name="note_number"
                                    value="{{ str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT) }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" class="form-control" id="barcode" name="barcode"
                                    value="{{ Str::uuid() }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4>Items</h4>
                                </div>
                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-group mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="item_name">Item Name</label>
                                                    <input type="text" class="form-control" name="items[0][name]"
                                                        required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="item_price">Price</label>
                                                    <input type="number" class="form-control" name="items[0][price]"
                                                        required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="item_qty">Quantity</label>
                                                    <input type="number" class="form-control" name="items[0][qty]"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="item_duration">Duration</label>
                                                    <input type="text" class="form-control" name="items[0][duration]"
                                                        placeholder="e.g. 2 hours" required>
                                                </div>
                                                <div class="col-md-6 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger remove-item">Remove
                                                        Item</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success add-item">Add Item</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Save Transaction</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let itemCount = 1;

                // Add Item Button
                document.querySelector('.add-item').addEventListener('click', function() {
                    const itemWrapper = document.querySelector('.item-wrapper');
                    const newItemGroup = document.createElement('div');
                    newItemGroup.className = 'item-group mb-3';
                    newItemGroup.innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" name="items[${itemCount}][name]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="item_price">Price</label>
                        <input type="number" class="form-control" name="items[${itemCount}][price]" required>
                    </div>
                    <div class="col-md-4">
                        <label for="item_qty">Quantity</label>
                        <input type="number" class="form-control" name="items[${itemCount}][qty]" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label for="item_duration">Duration</label>
                        <input type="text" class="form-control" name="items[${itemCount}][duration]" placeholder="e.g. 2 hours" required>
                    </div>
                    <div class="col-md-6 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-item">Remove Item</button>
                    </div>
                </div>
            `;
                    itemWrapper.appendChild(newItemGroup);
                    itemCount++;
                });

                // Remove Item Button
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-item')) {
                        e.target.closest('.item-group').remove();
                    }
                });
            });
        </script>
    @endpush

@endsection
