<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TempahPustaka | Log Masuk</title>

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
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log masuk untuk membuat tempahan ruang di PTTA UTHM</p>

      <form class="user" action="{{ route('login') }}" method="POST">
        @csrf 
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Kata Laluan" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <hr>
      <p class="mb-0">
        <a href="{{ route('create') }}" class="text-center">Daftar akaun baharu?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('/') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}assets/dist/js/adminlte.min.js"></script>

@if (Session::get('noAccess'))
<script>
Swal.fire({
    title: "Log Masuk Tidak Berjaya",
    html: "<p>Akaun anda telah disekat atau belum disahkan pengaktifan oleh pihak pustakawan.</p><p>Sila rujuk kaunter khidmat pelanggan di aras 1 PTTA untuk sebarang persoalan berkenaan isu ini.</p>",
    icon: "error"
});
</script>
@endif

@if (Session::get('error'))
<script>
Swal.fire({
    title: "Log Masuk Tidak Berjaya",
    html: "<p>Sila pastikan ID Pengguna dan Kata Laluan adalah sah dan benar.</p><p>Sila rujuk kaunter khidmat pelanggan di aras 1 PTTA untuk sebarang persoalan berkenaan isu ini.</p>",
    icon: "warning"
});
</script>
@endif
</body>
</html>