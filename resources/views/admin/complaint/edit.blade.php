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
            <h1>Laporan/Aduan Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Aduan Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-lg-12">
  
              <div class="card card-dard">
                <div class="card-header">
                  <h3 class="card-title">Kemaskini Maklum Balas Bagi Laporan/Aduan Pengguna</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start --> 
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <h4>Maklumat Pengadu</h4> <hr>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Nama: {{ $complaint->users->name }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Email: {{ $complaint->users->email }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Tel: {{ $complaint->users->phoneNum }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Peranan: {{ $complaint->users->role }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <h4>Maklumat Bilik/Ruang</h4> <hr>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Nama: {{ $complaint->room->name }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-info"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Lokasi: {{ $complaint->room->location }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-info"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Kapasiti: {{ $complaint->room->capacity }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-info"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Kemudahan: {{ $complaint->room->facility }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-info"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Kegunaan: {{ $complaint->room->purpose }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-info"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <h4>Gambar Bilik/Ruang</h4> <hr>
                      <div class="form-group text-center"><br>
                        <img class="img-fluid border" id="img-preview" width="450px" src="{{ asset('image/room/'.$complaint->room->picture) }}">
    
                      </div>
                    </div>

                    <div class="col-lg-8">
                      <h4>Laporan/Aduan</h4> <hr>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Kategori Aduan: {{ $complaint->category }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-file"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <textarea class="form-control" name="" id="" cols="5"  disabled>Aduan: {{ $complaint->complaint }}</textarea>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-file"></span>
                          </div>
                        </div>
                      </div>
                      <form action="{{ route('complaint.update', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="">
                        <label class="card-title">Maklum Balas Pustakawan:</label><br>
                        <textarea class="form-control" name="feedback" id="" cols="5"> {{ $complaint->feedback }}</textarea>
                      </div>
                      <div class="card-footer">
                        <input type="hidden" name="status" value="selesai">
                        <button type="submit" class="btn bg-gradient-success sumbit">Simpan &nbsp;<i class="fa fa-save"></i></button>
                      </div>
                    </form>
                    </div>
                      

                  </div> <hr>

                  <div class="card-footer">
                    <a href="{{ route('complaint.index') }}"type="" class="btn bg-gradient-secondary">Kembali <i class="fa fa-home"></i></a>
                  </div>
                </div>
              </div>

                  <!-- /.card-body -->

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

</body>
</html>
