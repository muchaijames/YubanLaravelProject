@extends('layouts.admin')

@section('title', 'Yuban')

@section('content')

<div class="page-wrapper">

    <div class="content container-fluid mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border-radius: 5px !important;">
                <div class="card-header">

                    <h2 class="mb-3">Registered Drivers</h2>
                      <!-- Filter Form -->
                        <form method="POST" action="{{ route('driversindex') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="county">Select County:</label>
                                    <select name="county" id="county" class="form-control">
                                        <option value="">All Counties</option>
                                        @foreach ($counties as $county)
                                            <option value="{{ $county }}">{{ $county }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="sub_county">Select Sub-County:</label>
                                    <select name="sub_county" id="sub_county" class="form-control">
                                        <option value="">All Sub-Counties</option>
                                        @foreach ($subCounties as $subCounty)
                                            <option value="{{ $subCounty }}">{{ $subCounty }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
               
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-10">
            <div class="card shadow-sm" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="card-title mb-0">Registered Drivers</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Chart Container with styling for width and height -->
                    <div class="card">
                         <!-- Customers Table -->
                            <!-- Drivers Table -->
                           <!-- Display Drivers -->
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>County</th>
                                        <th>Sub-County</th>
                                        <th>Registered On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $key => $driver)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $driver->name }}</td>
                                            <td>{{ $driver->county }}</td>
                                            <td>{{ $driver->subcounty }}</td>
                                            <td>{{ $driver->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                   <!-- <script>
                                $(document).ready(function() {
                                    $('#filterBtn').click(function() {
                                        var county = $('#countyFilter').val();
                                        var subCounty = $('#subCountyFilter').val();

                                        console.log("Filtering drivers: ", {county, subCounty});

                                        $.ajax({
                                            url: "{{ route('driversindex') }}",
                                            type: "GET",
                                            data: { county: county, sub_county: subCounty },
                                            success: function(response) {
                                                console.log("Response received: ", response);
                                                
                                                var rows = "";
                                                response.drivers.forEach(function(driver, index) {
                                                    rows += `<tr>
                                                        <td>${index + 1}</td>
                                                        <td>${driver.name}</td>
                                                        <td>${driver.county}</td>
                                                        <td>${driver.sub_county}</td>
                                                        <td>${driver.phone}</td>
                                                        <td>${new Date(driver.created_at).toLocaleString()}</td>
                                                    </tr>`;
                                                });
                                                $("#driversTable").html(rows);
                                            },
                                            error: function(error) {
                                                console.error("Error fetching drivers: ", error);
                                            }
                                        });
                                    });
                                });
                            </script>-->
                </div>

            </div>
        </div>
    </div>
    </div>

    
</div>



@endsection