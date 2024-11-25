@extends('layouts.boilerplate')

@section('title', 'New User')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
      <h1 class="mt-4">Add User</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
          <a href="{{ url('/user') }}">User</a>
        </li>
        <li class="breadcrumb-item active">Add User</li>
      </ol>
      <form action="/user" method="post" novalidate enctype="multipart/form-data" id="add-form">
        @csrf
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-floating mb-3 mb-md-0">
              <input
                class="form-control @error('first_name') is-invalid @enderror"
                id="inputFirstName"
                type="text"
                placeholder="Enter your first name"
                name="first_name"
                value="{{ old('first_name') }}"
              />
              <label for="inputFirstName">First name</label>
              @error('first_name') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input
                class="form-control @error('last_name') is-invalid @enderror"
                id="inputLastName"
                type="text"
                placeholder="Enter your last name"
                name="last_name"
                value="{{ old('last_name') }}"
              />
              <label for="inputLastName">Last name</label>
              @error('last_name') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-floating mb-3 mb-md-0">
              <input
                class="form-control @error('username') is-invalid @enderror"
                id="inputUsername"
                type="text"
                placeholder="Enter your username"
                name="username"
                value="{{ old('username') }}"
              />
              <label for="inputUsername">Username</label>
              @error('username') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input
                class="form-control @error('password') is-invalid @enderror"
                id="inputPassword"
                type="password"
                placeholder="Enter your password"
                name="password"
              />
              <label for="inputPassword">Password</label>
              @error('password') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-floating mb-3 mb-md-0">
              <input
                class="form-control @error('email') is-invalid @enderror"
                id="inputEmail"
                type="email"
                placeholder="Enter your email"
                name="email"
                value="{{ old('email') }}"
              />
              <label for="inputEmail">Email</label>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              <input
                class="form-control @error('phone_number') is-invalid @enderror"
                id="inputPhoneNo"
                type="number"
                placeholder="Enter your phone no"
                name="phone_number"
                value="{{ old('phone_number') }}"
              />
              <label for="inputPhoneNo">Phone No</label>
              @error('phone_number')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-2 mb-md-3">
          <div class="col-md-8">
            <div class="form-floating mb-3 mb-md-0">
              <textarea
                class="form-control @error('address') is-invalid @enderror"
                id="inputAddress"
                style="height: 100px"
                placeholder="Address"
                name="address"
              >{{ old('address') }}</textarea>
              <label for="inputAddress">Address</label>
              @error('address')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
            <div class="form-floating mb-3 mb-md-0">
              <input
                class="form-control @error('company_id_no')
                    is-invalid
                @enderror"
                id="inputCompanyId"
                type="number"
                placeholder="Enter your company id"
                name="company_id_no"
                value="{{ old('company_id_no') }}"
              />
              <label for="inputCompanyId">Company ID No</label>
              @error('company_id_no')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
              <select
                class="form-select @error('last_formal_education')
                    is-invalid
                @enderror"
                aria-label="Default select example"
                name="last_formal_education"
              >
                  <option value="">Last Formal Education</option>
                  <option value="SMA" {{ old('last_formal_education') == "SMA" ? 'selected' : '' }}>SMA</option>
                  <option value="SMK" {{ old('last_formal_education') == "SMK" ? 'selected' : '' }}>SMK</option>
                  <option value="D1" {{ old('last_formal_education') == "D1" ? 'selected' : '' }}>D1</option>
                  <option value="D2" {{ old('last_formal_education') == "D2" ? 'selected' : '' }}>D2</option>
                  <option value="D3" {{ old('last_formal_education') == "D3" ? 'selected' : '' }}>D3</option>
                  <option value="D4" {{ old('last_formal_education') == "D4" ? 'selected' : '' }}>D4</option>
                  <option value="S1" {{ old('last_formal_education') == "S1" ? 'selected' : '' }}>S1</option>
              </select>
              @error('last_formal_education')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
            <div class="input-group mb-3">
              <input
                type="file"
                class="form-control @error('photo') is-invalid @enderror"
                id="inputGroupFile02"
                accept="image/*"
                name="photo"
              />
              <label class="input-group-text" for="inputGroupFile02"
                >Upload Photo</label>
              @error('photo')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-8">
            <select
                class="form-select @error('role_id')
                    is-invalid
                @enderror"
                aria-label="Default select example"
                name="role_id"
            >
                <option value="">Role</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 text-end">
            <button type="button" class="btn btn-success btn-sm" onclick="confirmAction(null, 'add')">Add</button>
            <a href="{{ url('/user') }}" class="btn btn-danger btn-sm">Back</a>
          </div>
        </div>
      </form>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush