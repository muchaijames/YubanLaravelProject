@extends('layouts.admin')

@section('title', 'Yuban')

@section('content')

<div class="page-wrapper">

    <div class="content container-fluid mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border-radius: 5px !important;">
                <div class="card-header">


                    <h2>Registered Customers</h2>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('customersfilter') }}" class="mb-4">
                        <label for="date">Filter by Registration Date:</label>
                        <input type="date" name="date" id="date" class="form-control w-25 d-inline-block" required>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-10">
            <div class="card shadow-sm" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="card-title mb-0">Registered Customers</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Chart Container with styling for width and height -->
                    <div class="card">
                         <!-- Customers Table -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Registered On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No customers found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            {{ $customers->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    
</div>



@endsection