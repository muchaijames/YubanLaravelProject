@extends('layouts.admin')

@section('title', 'Yuban')

@section('content')

<div class="page-wrapper">

    <div class="content container-fluid mt-5">

   

    <div class="row justify-content-center mt-4">
        <div class="col-md-12 col-lg-10">
            <div class="card shadow-sm" style="border-radius: 10px; background-color: #f8f9fa;">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="card-title mb-0">Rider Requests</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Chart Container with styling for width and height -->
                    <div class="card">
                         <!-- Riders Requests Table-->
                         <h2>Ride Requests</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Starting Point</th>
                                        <th>Destination</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rides as $ride)
                                    <tr>
                                        <td>{{ $ride->user->name ?? 'Unknown' }}</td>
                                        <td>{{ $ride->point }}</td>
                                        <td>{{ $ride->destination }}</td>
                                        <td>
                                            <span class="badge {{ $ride->status == 'pending' ? 'badge-primary' : 'badge-warning' }}">
                                                {{ ucfirst($ride->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           
                    </div>

                    <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                document.querySelectorAll('.toggle-status').forEach(button => {
                                    button.addEventListener('click', function () {
                                        let rideId = this.getAttribute('data-id');
                                        let button = this;

                                        fetch(`/rides/toggle-status/${rideId}`, {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                                'Content-Type': 'application/json'
                                            }
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                let newStatus = data.new_status;
                                                button.textContent = newStatus === 'pending' ? 'Mark as Completed' : 'Mark as Pending';
                                                button.className = `btn btn-sm ${newStatus === 'pending' ? 'btn-warning' : 'btn-primary'}`;
                                                button.closest('tr').querySelector('.badge').textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                                                button.closest('tr').querySelector('.badge').className = `badge ${newStatus === 'pending' ? 'badge-primary' : 'badge-warning'}`;
                                            }
                                        });
                                    });
                                });
                            });
                        </script>

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