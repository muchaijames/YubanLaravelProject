@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer Ride Request') }}</div>

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
                    <form method="POST" action="{{ route('storerideeddd') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="userRole" class="col-md-4 col-form-label text-md-end">{{ __('Select Customer:') }}</label>

    
                            <div class="col-md-6">
                                <select class="form-select @error('customer') is-invalid @enderror" id="customer" name="customer" value="{{ old('customer') }}" required autocomplete="customer">
                                    <option value="">-- Select a Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                    @endforeach
                                    <option value="other">Other (Enter Name Below)</option>
                                </select>
                                <!--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">-->

                                @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" id="newCustomerField" style="display: none;">
                            <label for="new_customer" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>

                            <div class="col-md-6">
                                
                                <input id="new_customer" type="text" class="form-control @error('new_customer') is-invalid @enderror" name="new_customer" value="{{ old('new_customer') }}"  autocomplete="new_customer" autofocus>


                                @error('new_customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Pick Point') }}</label>

                            <div class="col-md-6">
                                
                                <input id="point" type="text" class="form-control @error('point') is-invalid @enderror" name="point" value="{{ old('point') }}" required autocomplete="point" autofocus>


                                @error('point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="destination" class="col-md-4 col-form-label text-md-end">{{ __('Destination') }}</label>

                            <div class="col-md-6">
                                <input id="destination" type="text" class="form-control @error('destination') is-invalid @enderror" name="destination" value="{{ old('destination') }}" required autocomplete="destination" autofocus>


                                @error('destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Request a Ride') }}
                                </button>
                            </div>
                        </div>
                    </form>





                </div>

                <script>
                    document.getElementById('customer').addEventListener('change', function() {
                        var newCustomerField = document.getElementById('newCustomerField');
                        if (this.value === 'other') {
                            newCustomerField.style.display = 'block';
                        } else {
                            newCustomerField.style.display = 'none';
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
