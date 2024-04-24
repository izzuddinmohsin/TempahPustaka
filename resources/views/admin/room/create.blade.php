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
            <h1>Bilik/Ruang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Bilik@Ruang</li>
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
                <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <label for="exampleInputEmail1">Nama</label>
                          <input type="text" class="form-control @error('name')  is-invalid @enderror" name="name" value="{{ old('name') }}" required>     
                        </div>
                        <div class="col-3">
                          <label for="exampleInputEmail1">Lokasi</label>
                          <select class="custom-select @error('location')  is-invalid @enderror" name="location">
                            @foreach (json_decode('{"Aras 1":"Aras 1", "Aras 2":"Aras 2", "Aras 3":"Aras 3","Aras 4":"Aras 4", "Aras 5":"Aras 5"}') as $optionKey => $optionValue)
                            <option value="{{ $optionKey }}" >{{ $optionValue }}</option>
                            @endforeach
                          </select>

                        </div>
                        <div class="col-3">
                          <div class="form-group">
                            <label>Kapasiti</label>
                            <input type="number" class="form-control @error('capacity')  is-invalid @enderror" name="capacity" value="{{ old('capacity') }}" required>
                        </div>                     
                      </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-6">
                          <label for="exampleInputEmail1">Fasiliti/Kemudahan</label>
                          <input type="text" class="form-control @error('facility')  is-invalid @enderror" name="facility" value="{{ old('facility') }}" required>
                          <span class="small">*contoh : - 2 Unit PA sistem - 1 Unit Sofa</span>
                        </div>
                        <div class="col-6">
                          <label for="exampleInputEmail1">Tujuan/Kegunaan Bilik</label>
                          <input type="text" class="form-control @error('purpose')  is-invalid @enderror"  name="purpose" value="{{ old('purpose') }}" required>                      
                        </div>
                      </div> <br>
                  
                    <div class="form-group">
                      <label for="exampleInputFile">Gambar</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <span class="input-group-text">Muat Naik</span>
                          <input type="file" class="form-control" id="picture" name="picture" accept="image/*" onchange="showFile(event)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Pratonton dokumen yang dimuat naik</label>
                        <div class="input-group-append">
                          <img class="img-fluid border" id="img-preview" height="200" width="200">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-success sumbit">Simpan &nbsp;<i class="fa fa-save"></i></button>
                    <a href="{{ route('room.index') }}"type="" class="btn bg-gradient-danger">Batal <i class="fa fa-times"></i></a>
                  </div>
                </form>
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
