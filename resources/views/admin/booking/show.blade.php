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
  
              <div class="card card-dard">
                <div class="card-header">
                  <h3 class="card-title">Maklumat Tempahan Bilik/Ruang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start --> 
                <div class="form-group text-center"><br>
                  <img class="img-fluid border" id="img-preview" width="500px" src="{{ asset('image/room/'.$booking->room->picture) }}">

                  </div>

                  <div class="card-body form-group text-center">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>BookingID</th>
                            <th>Pemohon</th>
                            <th>Bilik/Ruang</th>
                            <th>Tarikh</th>
                            <th>Masa</th>
                            <th>Tujuan</th>
                            <th>Status</th>

                          </tr>
                          </thead>
                          <tbody>
                                
                            <tr>
                              <td>{{ $booking->bookingID }}</td>
                              <td>{{ $booking->users->name }}</td>
                              <td>{{ $booking->room->name }}</td>
                              <td>{{ $booking->startDate }} sehingga {{ $booking->endDate }} </td>
                              <td>{{ $booking->startTime }} sehingga {{ $booking->endtTime }} </td>
                              <td>{{ $booking->purpose }}</td>
                              <td>
                                @if ($booking->status == 'diluluskan')
                                <button type="button" class="btn btn-block btn-success btn-sm" disabled>{{ $booking->status }}</button>

                                @elseif ($booking->status == 'ditolak')
                                <button type="button" class="btn btn-block btn-danger btn-sm" disabled>{{ $booking->status }}</button>

                                @else
                                <button type="button" class="btn btn-block btn-dark btn-sm" disabled>{{ $booking->status }}</button>
                                @endif
                              </td>

                            </tr>
                         
    
                        </tbody>
                      </table>
                  </div>
                  
                  <div class="card-footer">
                    <a href="{{ route('booking.index') }}"type="" class="btn bg-gradient-secondary">Kembali <i class="fa fa-home"></i></a>
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
