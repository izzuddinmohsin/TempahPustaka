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
              <div class="card card-primary card-outline">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Senarai Pengguna</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Bil</th>
                        <th>userID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Peranan</th>
                        <th>Tindakan</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if (count($users) > 0)
                        @foreach ($users as $item)
                            
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->userID }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->phoneNum }}</td>
                          <td>{{ $item->category }}</td>
                          <td>
                              @if ($item->status == 'aktif')
                              <button type="button" class="btn btn-block btn-success btn-sm">{{ $item->status }}</button>
  
                              @elseif ($item->status == 'disekat')
                              <button type="button" class="btn btn-block btn-danger btn-sm">{{ $item->status }}</button>
  
                              @else
                              <button type="button" class="btn btn-block btn-warning btn-sm">{{ $item->status }}</button>
                              @endif
                          </td>
                          <td>{{ $item->role }}</td>

                          <td>
                            <div class="btn-group">
                              <form action="{{ route('users.destroy',$item->id) }}" method="POST" class="btn-group">
                                @method('delete')
                                @csrf
                                <a href="{{ route('users.show',$item->id) }}" class="btn btn btn-info"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('users.edit',$item->id) }}" class="btn btn btn-secondary"><i class="fa fa-edit"></i></a>
                                <button class="btn btn btn-danger" onclick="deleteConfirm(event)">
                                    <i class="fa fa-trash"></i>
                                </button>
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


</body>
</html>
