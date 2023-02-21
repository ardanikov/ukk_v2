@if(Route::is('master-user'))
<div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th style="width: 60px">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $u)
        <tr>
          <td>{{ $index+1 }}</td>
          <td>{{ $u->name }}
          </td>
          <td>{{ $u->email }}</td>
          @if($u->roles == 1)
          <td>Admin</td>
          @endif
          @if($u->roles == 2)
          <td>Kasir</td>
          @endif
          @if($u->roles == 0)
          <td>Owner</td>
          @endif
          
          <td>
            {{-- <a href="/getUser/{{ $p->id }}"> --}}
            <button type="button" id="edit-button" class="btn btn-sm btn-success mr-1" data-nama="{{ $u->name }}" data-email ="{{ $u->email }}" data-roles = "{{ $u->roles }}" data-toggle="modal" data-target="#modal-default" onclick="editUser({
                id : '{{ $u->id }}',
                name : '{{ $u->name }}',
                email : '{{ $u->email }}',
                roles : '{{ $u->roles }}',
            })">
                <i class="fa fa-edit"></i>
            </button> 
            {{-- </a> --}}
            <a href="/deleteUserData/{{ $u->id }}">
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </a>
        </td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <div class="modal fade" style="" id="modal-default">
    <div class="modal-dialog">
        <form method="POST" action="updateUser">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                @csrf
            <div class="form-group rolesUser">
                <input id="namaUser" type="text" class="form-control mb-3" name="name" placeholder="Username">
                <input id="idUser" type="hidden" class="form-control mb-3" name="id" placeholder="Username">
                <input type="email" class="form-control mb-3" name="email" id="emailUser" placeholder="Email">
                <input type="password" class="form-control mb-3" name="password" id="passwordUser" placeholder="kosongi jika tidak ingin diubah">
                <select id="rolesUserSelect" name="roles" class="form-control rolesUser">
                    <option value="0" hidden>Owner</option>
                    <option value="1">Admin</option>
                    <option value="2" >Kasir</option>
                  </select>
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
 <script>
    function editUser($data) {
        $('#namaUser').val($data['name'])
        $('#idUser').val($data['id'])
        $('#emailUser').val($data['email'])
        if ($data['roles'] == 1) {
             $("div.rolesUser select").val("1")
             $("#rolesUserSelect").prop('disabled', false)
         } if($data['roles'] == 2) {
             $("div.rolesUser select").val("2")
             $("#rolesUserSelect").prop('disabled', false)
         }
         if($data['roles'] == 0) {
            $("div.rolesUser select").val("0")
            $("#rolesUserSelect").prop('disabled', true)
         }
    }
 </script>
  @endif


 
  @if(Route::is('master-produk'))
  <div class="card">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th style="width: 60px">Aksi</th>
          </tr>
          </thead>
          <tbody>
          @foreach($produk as $index => $p)
          <tr>
            <td>{{ $index+1 }}</td>
            <td>{{ $p->nama_produk }}
            </td>
            <td>{{ $p->deskripsi_produk }}</td>
          <td>{{ $p->harga_produk }}</td>
            
            <td>
              {{-- <a href="/getUser/{{ $p->id }}"> --}}
              <button type="button" id="edit-button" class="btn btn-sm btn-success mr-1"  data-toggle="modal" data-target="#modal-default" onclick="editProduk({
                  id_produk : '{{ $p->id_produk }}',
                  nama_produk : '{{ $p->nama_produk }}',
                  deskripsi_produk : '{{ $p->deskripsi_produk }}',
                  harga_produk : '{{ $p->harga_produk }}',
              })">
                  <i class="fa fa-edit"></i>
              </button> 
              {{-- </a> --}}
              <a href="/deleteProdukData/{{ $p->id_produk }}">
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </a>
          </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="modal fade" style="" id="modal-default">
      <div class="modal-dialog">
          <form method="POST" action="updateProduk">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                  @csrf
              <div class="form-group">
                  <input id="namaProduk" type="text" class="form-control mb-3" name="nama_produk" placeholder="Nama Produk">
                  <input id="idProduk" type="hidden" class="form-control mb-3" name="id_produk" placeholder="">
                  <input type="text" class="form-control mb-3" name="deskripsi_produk" id="deskripsiProduk" placeholder="Deskripsi Produk">
                  <input type="text" class="form-control mb-3" name="harga_produk" id="hargaProduk" placeholder="10000">
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
   <script>
      function editProduk($data) {
          $('#namaProduk').val($data['nama_produk'])
          $('#idProduk').val($data['id_produk'])
          $('#deskripsiProduk').val($data['deskripsi_produk'])
          $('#hargaProduk').val($data['harga_produk'])
         
      }
   </script>
    @endif
    @if(Route::is('master-outlet'))
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Outlet</th>
              <th>Lokasi</th>
              <th style="width: 60px">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($outlet as $index => $o)
            <tr>
              <td>{{ $index+1 }}</td>
              <td>{{ $o->nama_outlet }}
              </td>
              <td>{{ $o->lokasi_outlet }}</td>
              
              <td>
                {{-- <a href="/getUser/{{ $p->id }}"> --}}
                <button type="button" id="edit-button" class="btn btn-sm btn-success mr-1"  data-toggle="modal" data-target="#modal-default" onclick="editOutlet({
                    id_outlet : '{{ $o->id_outlet }}',
                    nama_outlet : '{{ $o->nama_outlet }}',
                    lokasi_outlet : '{{ $o->lokasi_outlet }}'
                })">
                    <i class="fa fa-edit"></i>
                </button> 
                {{-- </a> --}}
                <a href="/deleteOutletData/{{ $o->id_outlet }}">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </a>
            </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="modal fade" style="" id="modal-default">
        <div class="modal-dialog">
            <form method="POST" action="updateOutlet">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    @csrf
                <div class="form-group">
                    <input id="namaOutlet" type="text" class="form-control mb-3" name="nama_outlet" placeholder="Nama Outlet">
                    <input id="idOutlet" type="hidden" class="form-control mb-3" name="id_outlet" placeholder="">
                    <input type="text" class="form-control mb-3" name="lokasi_outlet" id="lokasiOutlet" placeholder="Lokasi Outlet">
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
     <script>
        function editOutlet($data) {
            $('#namaOutlet').val($data['nama_outlet'])
            $('#idOutlet').val($data['id_outlet'])
            $('#lokasiOutlet').val($data['lokasi_outlet'])
           
        }
     </script>
      @endif
    
    @if(Route::is('master-pelanggan'))
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>No HP</th>
              <th style="width: 60px">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pelanggan as $index => $pl)
            <tr>
              <td>{{ $index+1 }}</td>
              <td>{{ $pl->nama_pelanggan }}
              </td>
              <td>{{ $pl->nomor_hp_pelanggan }}</td>
              
              <td>
                {{-- <a href="/getUser/{{ $p->id }}"> --}}
                <button type="button" id="edit-button" class="btn btn-sm btn-success mr-1"  data-toggle="modal" data-target="#modal-default" onclick="editPelanggan({
                    id_pelanggan : '{{ $pl->id_pelanggan }}',
                    nama_pelanggan : '{{ $pl->nama_pelanggan }}',
                    nomor_hp_pelanggan : '{{ $pl->nomor_hp_pelanggan }}'
                })">
                    <i class="fa fa-edit"></i>
                </button> 
                {{-- </a> --}}
                <a href="/deletePelangganData/{{ $pl->id_pelanggan }}">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </a>
            </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="modal fade" style="" id="modal-default">
        <div class="modal-dialog">
            <form method="POST" action="updatePelanggan">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    @csrf
                <div class="form-group">
                    <input id="namaPelanggan" type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="Nama Pelanggan">
                    <input id="idPelanggan" type="hidden" class="form-control mb-3" name="id_pelanggan" placeholder="">
                    <input type="text" class="form-control mb-3" name="nomor_hp_pelanggan" id="nomorHpPelanggan" placeholder="Nomor HP">
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
     <script>
        function editPelanggan($data) {
            $('#namaPelanggan').val($data['nama_pelanggan'])
            $('#idPelanggan').val($data['id_pelanggan'])
            $('#nomorHpPelanggan').val($data['nomor_hp_pelanggan'])
           
        }
     </script>
      @endif
    
    @if(Route::is('master-transaksi'))
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>No.Transaksi</th>
              <th>Pelanggan</th>
              <th>Tanggal Masuk</th>
              <th>Tanggal Ambil</th>
              <th>Total</th>
              <th>Status</th>
              <th>Aksi</th>
              <th style="width: 60px">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transaksi as $index => $t)
            <tr>
              <td>{{ $index+1 }}</td>
              <td>{{ $t->no_transaksi }}
              </td>
              <td>{{ $t->nama_pelanggan }}</td>
              
              <td>
                {{-- <a href="/getUser/{{ $p->id }}"> --}}
                <button type="button" id="edit-button" class="btn btn-sm btn-success mr-1"  data-toggle="modal" data-target="#modal-default" onclick="editTransaksi({
                    id_transaksi : '{{ $t->id_transaksi }}',
                    nama_pelanggan : '{{ $t->nama_pelanggan }}',
                    nomor_hp_pelanggan : '{{ $t->nomor_hp_pelanggan }}'
                    tanggal_masuk : '{{ $t->tanggal_masuk }}',
                    tanggal_ambil : '{{ $t->tanggal_ambil }}',
                    status : '{{ $t->status }}',
                })">
                    <i class="fa fa-edit"></i>
                </button> 
                {{-- </a> --}}
                <a href="/deleteTransaksiData/{{ $t->id_transaksi }}">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </a>
            </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="modal fade" style="" id="modal-default">
        <div class="modal-dialog">
            <form method="POST" action="updateTransaksi">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    @csrf
                <div class="form-group">
                    <input id="namaPelanggan" type="text" class="form-control mb-3" name="nama_pelanggan" placeholder="Nama Pelanggan">
                    <input id="idPelanggan" type="hidden" class="form-control mb-3" name="id_pelanggan" placeholder="">
                    <input type="text" class="form-control mb-3" name="nomor_hp_pelanggan" id="nomorHpPelanggan" placeholder="Nomor HP">
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
     <script>
        function editPelanggan($data) {
            $('#namaPelanggan').val($data['nama_pelanggan'])
            $('#idPelanggan').val($data['id_pelanggan'])
            $('#nomorHpPelanggan').val($data['nomor_hp_pelanggan'])
           
        }
     </script>
      @endif
    