@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <form action="/master-pelanggan" method="get">
                        <button type="submit" class="btn btn-default mr-2"><i class="fas fa-sync" aria-hidden="tr
                            "></i></button>
                    </form>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-tambahdata">
                        Tambah Data
                    </button>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        @include('layouts.datatables')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default-tambahdata">
    <div class="modal-dialog">
        <form method="POST" action="addPelanggan">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="Nama pelanggan">
                        <input type="text" class="form-control mb-3" name="nomor_hp_pelanggan" placeholder="Nomor HP Pelanggan">
                    </div>
                </div>

                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
@include('layouts.footer')

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });


</script>