<footer class="main-footer">
    <strong>Copyright &copy; Muhammad Izzuddin | DI210098 </a></strong> - Individual Project.
</footer>

<script>
    window.deleteConfirm = function(e){
        e.preventDefault();
        var form = e.target.form;
  
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: "btn btn-success",
                  cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
              });
              swalWithBootstrapButtons.fire({
                title: "Adakah anda pasti?",
                text: "Anda tidak boleh mengembalikan data yang telah dipadam",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, padam juga!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: true
              }).then((result) => {
                if (result.isConfirmed) {
                  form.submit();
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire({
                    title: "Dibatalkan",
                    text: "Proses pemadaman dibatalkan",
                    icon: "error"
                  });
                }
              });
    }
  </script>