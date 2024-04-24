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
            <h1>Tempahan Bilik/Ruang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Tempahan Bilik@Ruang</li>
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
                  <h3 class="card-title">Cipta Tempahan Bilik/Ruang Baharu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <label for="exampleInputEmail1">Bilik/Ruang</label>
                          <select class="custom-select @error('roomID')  is-invalid @enderror" name="roomID">
                            @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                          </select>
                        </div>  
                      </div><br>
                      <div class="row">
                        <div class="col-3">
                          <div class="form-group">
                            <label>Tarikh Mula</label>
                            <input type="date" class="form-control @error('startDate')  is-invalid @enderror" name="startDate" value="{{ old('startDate') }}" required>
                          </div> 
                        </div>         
                        <div class="col-3">
                          <div class="form-group">
                            <label>Tarikh Akhir</label>
                            <input type="date" class="form-control @error('endDate')  is-invalid @enderror" name="endDate" value="{{ old('endDate') }}" required>
                          </div> 
                        </div>         
                        <div class="col-3">
                          <div class="form-group">
                            <label>Masa Mula</label>
                            <input type="time" class="form-control @error('startTime')  is-invalid @enderror" name="startTime" value="{{ old('startTime') }}" required>
                          </div> 
                        </div>         
                        <div class="col-3">
                          <div class="form-group">
                            <label>Masa Akhir</label>
                            <input type="time" class="form-control @error('endtTime')  is-invalid @enderror" name="endtTime" value="{{ old('endtTime') }}" required>
                          </div> 
                        </div>         
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <label for="exampleInputEmail1">Tujuan Tempahan</label>
                          <input type="text" class="form-control @error('purpose')  is-invalid @enderror" name="purpose" value="{{ old('purpose') }}" required>
                        </div>  
                      </div><br>
                      </div>
                      <div class="card-footer">
                        <input type="hidden" name="userID" value="{{ Auth::user()->id }}" required>

                        <button type="submit" class="btn bg-gradient-success sumbit">Simpan &nbsp;<i class="fa fa-save"></i></button>
                        <a href="{{ route('booking.index') }}"type="" class="btn bg-gradient-danger">Batal <i class="fa fa-times"></i></a>
                      </div>
                  

                  <!-- /.card-body -->
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
