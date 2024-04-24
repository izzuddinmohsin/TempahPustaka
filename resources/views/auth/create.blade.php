<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TempahPustaka | Daftar Akaun</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/adminlte.min.css">
  

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Tempah</b>Pustaka</a>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg">Daftar akaun baharu</p>

        <form action="{{ url('/') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Nama" name="name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ID Pengguna" name="userID">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-id-badge"></span>
                  </div>
                </div>
              </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nombor Telefon" name="phoneNum">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
            </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Kata Laluan" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="custom-select" name="category">
                @foreach (json_decode('{"-Kategori Pengguna-":"--Kategori Pengguna--", "Warga UTHM":"Warga UTHM", "Orang Luar":"Orang Luar"}') as $optionKey => $optionValue)
                    <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                @endforeach
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users"></span>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <br>
      <a href="{{ url('/') }}" class="text-center">Saya sudah mempunyai akaun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <!-- /.login-logo -->

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}assets/dist/js/adminlte.min.js"></script>

@if (Session::get('success'))
<script>
Swal.fire({
    title: "Pendaftaran Akaun Telah Berjaya",
    html: "<p>Sila tunggu 24 jam untuk pihak pustakawan mengaktifkan akaun anda.</p><p>Sekiranya diperlukan pengaktifan dalam kadar segera, Sila rujuk di kaunter khidmat pelanggan di aras 1 PTTA untuk mengesahkan pengaktifan akaun anda.</p>",
    icon: "success"
}).then((result) => {
    if (result.isConfirmed) {
        // Redirect to the home page
        window.location.href = "/";
    }
});

</script>
@endif

@if (Session::get('error'))
<script>
Swal.fire({
  title: "Pendaftaran Akaun Tidak Berjaya",
    html: "<p>ID Pengguna yang di isi telah didaftarkan.</p><p>Sila tukar ID Pengguna lain.</p>",
    icon: "warning"
});
</script>
@endif

</body>
</html>