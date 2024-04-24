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
@include('layout.side-user')

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
              <li class="breadcrumb-item"><a href="#">User</a></li>
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
                  <h3 class="card-title">Cipta Laporan/Aduan Pengguna</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start --> 
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <h4>Maklumat Pengadu</h4> <hr>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Nama: {{ Auth::user()->name }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Email: {{ Auth::user()->email }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Tel: {{ Auth::user()->phoneNum }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ID Pengguna" name="userID" value="Peranan: {{ Auth::user()->role }}" disabled>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-8">
                      <h4>Laporan/Aduan</h4> <hr>
                      <form action="{{ route('complaints.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <select class="custom-select @error('roomID')  is-invalid @enderror" name="roomID">
                              @foreach ($room as $row)
                              <option value="{{ $row->id }}">{{ $row->name }}</option>
                              @endforeach
                            </select>                          
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span>Bilik/Ruang</span>
                            </div>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <select class="custom-select @error('category')  is-invalid @enderror" name="category">
                            @foreach (json_decode('{"kemudahan":"kemudahan", "perkhidmatan":"perkhidmatan"}') as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                            @endforeach
                          </select>                          
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span>Kategori Aduan</span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <textarea class="form-control"  cols="5" name="complaint"></textarea>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span>Aduan Pengguna</span>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <input type="hidden" name="status" value="tiada tindakan">
                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn bg-gradient-success sumbit">Simpan &nbsp;<i class="fa fa-save"></i></button>
                      </div>
                    </form>
                    </div>
                      

                  </div> <hr>

                  <div class="card-footer">
                    <a href="{{ route('complaints.index') }}"type="" class="btn bg-gradient-secondary">Kembali <i class="fa fa-home"></i></a>
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
