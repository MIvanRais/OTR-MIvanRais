@extends('layouts.boilerplate')

@section('title', 'Change Password')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
      @if (session()->has('change_password_failed'))
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {{ session('change_password_failed') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
      <h1 class="mt-4">Change Password</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
          <a href="{{ url('/dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol>
      <form action="{{ route('password.update') }}" method="post">
        @csrf
        <div class="row mb-4">
          <div class="col-md-8">
            <div class="form-floating mb-3 mb-md-0">
              <input
                class="form-control @error('current_password') is-invalid @enderror"
                id="inputCurrentPassword"
                type="password"
                placeholder="Enter your current password"
                name="current_password"
              />
              <label for="inputCurrentPassword">Current Password</label>
              @error('current_password') 
                 <div class="invalid-feedback">
                    {{ $message }}
                  </div> 
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
            <div class="form-floating">
              <input
                class="form-control @error('password') is-invalid @enderror"
                id="inputNewPassword"
                type="password"
                placeholder="Enter your new password"
                name="password"
              />
              <label for="inputNewPassword">New Password</label>
              @error('password') 
                 <div class="invalid-feedback">
                    {{ $message }}
                  </div> 
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
            <div class="form-floating">
              <input
                class="form-control @error('confirm_password') is-invalid @enderror"
                id="inputConfirmPassword"
                type="password"
                placeholder="Enter your confirm password"
                name="confirm_password"
              />
              <label for="inputConfirmPassword">Confirm Password</label>
              @error('confirm_password') 
                 <div class="invalid-feedback">
                    {{ $message }}
                  </div> 
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 text-end">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
            <a href="{{ url('/dashboard') }}" class="btn btn-danger btn-sm">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </main>
@endsection

@push('scripts')
    
@endpush