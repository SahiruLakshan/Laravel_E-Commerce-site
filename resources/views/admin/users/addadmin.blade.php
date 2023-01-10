@extends('layouts.admin')
@section('title')
    Add New Admin

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add New Admin</h4>
        </div>
        <div class="card-body">
            <form action="{{url ('Add-admin-update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- name input -->
            <div class="col-md-6 mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>
            

            <!-- e mail input -->
            <div class="col-md-6 mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

            <!-- password input -->
            <div class="col-md-6 mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
            </div>

            <!-- Confirm Password input -->
            <div class="col-md-6 mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                
                
            </div>


            <!-- role -->

            <div class="col-md-6 mb-3">
                    <label for="">Role_as</label>
                    <input type="checkbox" name="role_as" checked="true" activated>
                </div>

                
            <!-- register button -->
            <p align="right">
            <button type="submit" class="form-control btn btn-danger submit px-3" >Add New Admin</button>
            @if (Route::has('password.request'))
                                        
            @endif
            </p>
                </div>
            </form>
    </div>
        
    </div>    
@endsection