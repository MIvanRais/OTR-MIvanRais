<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OTR Lion Group | Login</title>
    <link href="{{ asset('vendor/css/styles.css') }}" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-dark">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('password_changed'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('password_changed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                  </div>
                  <div class="card-body">
                    <form action="/login" method="POST">
                      @csrf
                      <div class="form-floating mb-3">
                        <input
                          class="form-control @error('username') is-invalid @enderror"
                          id="inputUsername"
                          type="text"
                          placeholder="Username"
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
                      <div class="form-floating mb-3">
                        <input
                          class="form-control @error('password') is-invalid @enderror"
                          id="inputPassword"
                          type="password"
                          placeholder="Password"
                          name="password"
                        />
                        <label for="inputPassword">Password</label>
                        @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div
                        class="d-flex align-items-center justify-content-end mt-4 mb-0"
                      >
                        <button type="submit" class="btn btn-dark">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('vendor/js/scripts.js') }}"></script>
  </body>
</html>
