<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('layout.head')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 {{-- header --}}
 @include('layout.header')

{{-- sidebar --}}
@include('layout.side-admin')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-lg-12">
  
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Daftar Bilik/Ruang Baharu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('users.store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengguna</label>
                            <input type="text" class="form-control @error('userID')  is-invalid @enderror" name="userID" required>     
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" required>     
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control @error('email')  is-invalid @enderror" name="email" required>     
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nombor Telefon</label>
                            <input type="text" class="form-control @error('phoneNum')  is-invalid @enderror" name="phoneNum" required>     
                          </div>
                        </div>                        
                        <div class="col-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Kata Laluan</label>
                            <input type="password" class="form-control" name="password" value="" >    
                          </div>
                        </div>
                         
                        <div class="col-2">
                          <div class="form-group">
                            <label>Peranan</label>
                            <select class="custom-select @error('role')  is-invalid @enderror" name="role">
                              @foreach (json_decode('{"admin":"admin", "user":"user"}') as $optionKey => $optionValue)
                              <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                              @endforeach
                            </select>                        
                          </div>                     
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Kategori</label>
                            <select class="custom-select @error('category')  is-invalid @enderror" name="category">
                              @foreach (json_decode('{"Warga UTHM":"Warga UTHM", "Orang Luar":"Orang Luar", "admin":"admin"}') as $optionKey => $optionValue)
                              <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                              @endforeach
                            </select>                        
                          </div>                     
                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select @error('status')  is-invalid @enderror" name="status">
                              @foreach (json_decode('{"aktif":"aktif", "tidak aktif":"tidak aktif", "disekat":"disekat"}') as $optionKey => $optionValue)
                              <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                              @endforeach
                            </select>                        
                          </div>                     
                        </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-success sumbit">Simpan &nbsp;<i class="fa fa-save"></i></button>
                    <a href="{{ route('users.index') }}"type="" class="btn bg-gradient-danger">Batal <i class="fa fa-times"></i></a>
                  </div>
                </form>
              </div>
            </div>

              </div>
              <!-- /.card -->
  
          </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
  <!-- /.content-wrapper -->

{{-- footer --}}
@include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/') }}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->



<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    function showFile(event){
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('img-preview');
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>


@if (Session::get('error'))
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
  });
  Toast.fire({
    icon: "error",
    title: "{{ Session::get('error') }}"
  });
</script>
    
@endif

</body>
</html>
