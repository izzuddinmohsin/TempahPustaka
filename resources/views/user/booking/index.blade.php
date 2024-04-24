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
            <h1>Tempahan Bilik/Ruang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
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
              <div class="card card-primary card-outline">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Senarai Tempahan Bilik / Ruang</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>BookingID</th>
                        <th>Bilik/Ruang</th>
                        <th>Tarikh</th>
                        <th>Masa</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if (count($bookings) > 0)
                        @foreach ($bookings as $item)
                            
                        <tr>
                          <td>{{ $item->bookingID }}</td>
                          <td>{{ $item->room->name }}</td>
                          <td>{{ $item->startDate }} sehingga {{ $item->endDate }} </td>
                          <td>{{ $item->startTime }} sehingga {{ $item->endtTime }} </td>
                          <td>{{ $item->purpose }}</td>
                          <td>
                            @if ($item->status == 'diluluskan')
                            <button type="button" class="btn btn-block btn-success btn-sm">{{ $item->status }}</button>

                            @elseif ($item->status == 'ditolak')
                            <button type="button" class="btn btn-block btn-danger btn-sm">{{ $item->status }}</button>
                            
                            @elseif ($item->status == 'dibatalkan')
                            <button type="button" class="btn btn-block btn-danger btn-sm">{{ $item->status }}</button>

                            @else
                            <button type="button" class="btn btn-block btn-dark btn-sm">{{ $item->status }}</button>
                            @endif
                          </td>

                          <td>
                            <div class="btn-group">
                              <form action="{{ route('booking.destroy',$item->id) }}" method="POST" class="btn-group">
                                @method('delete')
                                @csrf
                                <a href="{{ route('bookings.show',$item->id) }}" class="btn btn btn-info"><i class="fa fa-eye"></i></a>
                                @if ($item->status == 'dipohon')
                                <a href="{{ route('bookings.edit',$item->id) }}" class="btn btn btn-danger"><i class="fa fa-trash"></i></a>                                    
                                @endif
                                {{-- <button class="btn btn btn-danger" onclick="deleteComfirm(event)">
                                    <i class="fa fa-trash"></i>
                                </button> --}}
                              </form>
                            </div>
                          </td>
                        </tr>
    
                        @endforeach
                        @endif
                       
  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
          </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
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

@if (Session::get('success'))
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
    icon: "success",
    title: "{{ Session::get('success') }}"
  });
</script>
    
@endif

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
