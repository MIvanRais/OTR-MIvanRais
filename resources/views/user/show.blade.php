@extends('layouts.boilerplate')

@section('title', 'New User')

@section('content')
<main>
    <div class="container-fluid px-4 mb-4">
      <h1 class="mt-4">Preview User</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
          <a href="{{ url('/user') }}">User</a>
        </li>
        <li class="breadcrumb-item active">Preview User</li>
      </ol>
      <div class="d-flex flex-column flex-md-row align-items-start">
        <div class="me-3">
          @if ($user->photo)
              <img src="{{ asset('storage/'.$user->photo) }}" alt="Photo Profile" class="rounded" width="300px" height="300px">  
          @else
              <img src="{{ asset('assets/avatar.png') }}" alt="Photo Profile" class="rounded" width="300px" height="300px">  
          @endif
        </div>
        <div class="mt-3 mt-md-0">
          <div class="d-flex align-items-center">
            <h1 class="fs-3 me-2">{{ $user->first_name . ' ' . $user->last_name }}</h1>
            @switch($user->role->name)
                @case('Admin')
                    <span class="badge text-bg-danger">{{ $user->role->name }}</span>
                    @break
                @case('Engineer')
                    <span class="badge text-bg-primary">{{ $user->role->name }}</span>
                    @break
                @case('PIC')
                    <span class="badge text-bg-warning">{{ $user->role->name }}</span>
                    @break
                @case('Quality Inspector')
                    <span span class="badge text-bg-success">{{ $user->role->name }}</span>
                    @break
            @endswitch
          </div>
          <div style="width: 400px">
            <div class="d-flex align-items-center ">
              <p class="text-muted me-3">Company Id No</p>
              <p>{{ $user->company_id_no }}</p>
            </div>
            <div class="d-flex align-items-center ">
              <p class="text-muted me-3">Phone Number</p>
              <p>{{ $user->phone_number }}</p>
            </div>
            <div class="d-flex align-items-center ">
              <p class="text-muted me-3">Email</p>
              <p>{{ $user->email }}</p>
            </div>
            <div class="d-flex align-items-center ">
              <p class="text-muted me-3">Last Formal Education</p>
              <p>{{ $user->last_formal_education }}</p>
            </div>
            <div class="d-flex align-items-center ">
              <p class="text-muted me-3">Address</p>
              <p>{{ $user->address }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('resources/js/dynamic-form.js') }}"></script>
@endpush