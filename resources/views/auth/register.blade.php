@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

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
                    <form method="POST" action="{{ route('registerrr') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="name" autofocus>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="userRole" class="col-md-4 col-form-label text-md-end">{{ __('Select Role') }}</label>

    
                            <div class="col-md-6">
                                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}" required autocomplete="role">
                                    <option value="">-- Select Role --</option>
                                    <option value="driver">Driver</option>
                                    <option value="customer">Customer</option>
                                </select>
                                <!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">-->

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                       <!-- County Dropdown -->
                        <div class="row mb-3" id="county-container" style="display: none;">
                            <label for="county" class="col-md-4 col-form-label text-md-end">{{ __('Select County') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="county" name="county" required>
                                    <option value="">-- Select County --</option>
                                    <option value="nairobi">Nairobi</option>
                                    <option value="kiambu">Kiambu</option>
                                    <option value="bungoma">Bungoma</option>
                                </select>
                            </div>
                        </div>


                        <!-- Sub-County Dropdown -->
                        <div class="row mb-3" id="subcounty-container" style="display: none;">
                            <label for="subcounty" class="col-md-4 col-form-label text-md-end">{{ __('Select Sub-County') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="subcounty" name="subcounty" required>
                                    <option value="">-- Select Sub-County --</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>


                    <script>
                    $(document).ready(function() {
                        console.log("jQuery is loaded and script is running!");
                    // Sub-counties mapping based on county selection
                        let subCounties = {
                            nairobi: ["Westlands", "Kibra", "Dagoretti"],
                            kiambu: ["Lari", "Limuru", "Muguga"],
                            bungoma: ["Kanduyi", "Webuye", "Kimilili"]
                        };

                        // Show/hide county & sub-county dropdowns based on role selection
                        $("#role").change(function() {
                            let selectedRole = $(this).val();
                            console.log("Selected Role:", selectedRole); // Debugging log

                            if (selectedRole === "driver") {
                                $("#county-container").show();
                                $("#subcounty-container").show();
                                console.log("Showing county and sub-county dropdowns."); // Debugging log
                            } else {
                                $("#county-container").hide();
                                $("#subcounty-container").hide();
                                console.log("Hiding county and sub-county dropdowns."); // Debugging log
                            }
                        });

                        // Populate sub-counties based on selected county
                        $("#county").change(function() {
                            let selectedCounty = $(this).val();
                            console.log("Selected County:", selectedCounty); // Debugging log

                            let subcountyDropdown = $("#subcounty");

                            subcountyDropdown.empty().append('<option value="">-- Select Sub-County --</option>');

                            if (subCounties[selectedCounty]) {
                                subCounties[selectedCounty].forEach(function(subCounty) {
                                    subcountyDropdown.append(`<option value="${subCounty.toLowerCase()}">${subCounty}</option>`);
                                });
                                console.log("Sub-counties populated:", subCounties[selectedCounty]); // Debugging log
                            } else {
                                console.log("No sub-counties found for selected county."); // Debugging log
                            }
                        });
                    });
                    </script>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
