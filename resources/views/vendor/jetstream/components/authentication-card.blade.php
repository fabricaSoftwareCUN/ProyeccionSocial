<div class="container">
  <div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-5">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
      <div class="header-login">
          {{ $logo }}
      </div>

      <div class="w-full sm:max-w-md mt-6 px-6 pt-4 shadow-md overflow-hidden card-login">
          {{ $slot }}
      </div>
    </div>
    </div>
  </div>
</div>
