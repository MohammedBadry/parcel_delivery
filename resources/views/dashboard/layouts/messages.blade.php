  <script>
    // Set the options that I want
    toastr.options = {
      "closeButton": true,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-left",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "300",
      "timeOut": "2000",
      "extendedTimeOut": "2000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>

    @if(session()->has('error'))
    <script>toastr.error("{{ session('error') }}");</script>
    @endif
    @if(session()->has('success'))
    <script>toastr.success("{{ session('success') }}");</script>
    @endif

    @if(count($errors->all()) > 0)
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      <script>toastr.error("{{ $error }}");</script>
      @endforeach
    @endif

    