@extends('layouts.boilerplate')

@section('title', 'Users')

@section('content')
<main>
  <div class="container-fluid px-4">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>    
    @endif
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <a href="{{ url('/dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Users</li>
    </ol>
    <a href="{{ url('/user/create') }}" class="btn btn-success mb-2 btn-sm">
      <i class="fa-solid fa-plus me-2"></i>Add
    </a>
    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Users
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>
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
                </td>
                <td>
                  <div class="d-flex">
                    <a
                      href="{{ route('user.edit', $user->id) }}"
                      class="btn btn-primary"
                      style="
                        --bs-btn-padding-y: 0.2rem;
                        --bs-btn-padding-x: 0.5rem;
                        --bs-btn-font-size: 0.7rem;
                      "
                      ><i class="fa-regular fa-pen-to-square"></i
                    ></a>
                    <a
                      href="{{ route('user.show', $user->id) }}"
                      class="btn btn-warning ms-2"
                      style="
                        --bs-btn-padding-y: 0.2rem;
                        --bs-btn-padding-x: 0.5rem;
                        --bs-btn-font-size: 0.7rem;
                      "
                      ><i class="fa-regular fa-eye"></i></a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="ms-2" id="delete-form-{{ $user->id }}">
                      @csrf
                      @method('DELETE')
                      <button
                        type="button"
                        class="btn btn-danger"
                        style="
                          --bs-btn-padding-y: 0.2rem;
                          --bs-btn-padding-x: 0.5rem;
                          --bs-btn-font-size: 0.7rem;
                        "
                        onclick="confirmAction({{ $user->id }}, 'delete')"
                      >
                        <i class="fa-regular fa-trash-can"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection

@push('scripts')
  <script src="{{ asset('resources/js/confirm-action.js') }}"></script>
@endpush