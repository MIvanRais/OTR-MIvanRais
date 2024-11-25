<div class="row">
  @switch(Auth()->user()->role->name)
      @case('Admin')
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                  <h1 class="fs-2">{{ $total_proposal }}</h1>
                  Proposal
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="card-body text-dark">
                  <h1 class="fs-2">{{ $total_verification }}</h1>
                  Verification
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">
                  <h1 class="fs-2">{{ $total_assessment }}</h1>
                  Assessment
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                  <h1 class="fs-2">{{ $total_rejection }}</h1>
                  Rejection
                </div>
              </div>
            </div>
          @break
      {{-- @case('Engineer')
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              Proposal
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body text-dark">
              <h1 class="fs-2">10</h1>
              Verification
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              Assessment
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              Rejection
            </div>
          </div>
        </div>
          @break
      @case('PIC')
        <div class="col-xl-4 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body text-dark">
              <h1 class="fs-2">10</h1>
              Verification
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              Approval
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-12">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              Rejection
            </div>
          </div>
        </div>
          @break
      @case('Quality Inspector')
        <div class="col-xl-4 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body text-dark">
              <h1 class="fs-2">10</h1>
              Assessment
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              PASS
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-12">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">
              <h1 class="fs-2">10</h1>
              FAIL
            </div>
          </div>
        </div>
          @break --}}
          
  
  @endswitch   
</div>