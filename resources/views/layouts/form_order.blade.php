<form>
  <div class="row">
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          @if ( in_array(Auth::user()->divisi->level_access, array(5, 4)) )
            <li class="tab col s3"><a href="#test1" class="active"><i class="fa fa-shopping-cart"></i> Pemesanan</a></li> 
            <li class="tab col s3"><a href="#test3"><i class="fa fa-edit"></i> Pesanan</a></li> 
          @endif
          @if ( in_array(Auth::user()->divisi->level_access, array(1)) )
            <li class="tab col s3"><a href="#test4"><i class="fa fa-check-square"></i> Keluarkan</a></li> 
          @endif
          @if ( in_array(Auth::user()->divisi->level_access, array(2, 3, 4)) )
            <li class="tab col s3"><a href="#test2"><i class="fa fa-mouse-pointer"></i> Persetujuan</a></li> 
          @endif

        </ul>
      </div>
      @if ( in_array(Auth::user()->divisi->level_access, array(1)) )
        <div id="test4" class="col s12">
          <br>
          <h4 class="center">KELUARKAN STOK</h4>
          <table class="highlight striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>No MIRS</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>s</td>
                <td>s</td> 
                <td>s</td> 
                <td>
                  <span data-badge-caption="Ditolak" class="new badge red"></span>
                  <span data-badge-caption="Disetujui" class="new badge green"></span>
                  <span data-badge-caption="Menunggu" class="new badge"></span>

                </td> 
                <td>
                  <a href="#modal1" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                </td> 
              </tr>
            </tbody>
          </table>
        </div>
      @endif
      @if ( in_array(Auth::user()->divisi->level_access, array(5, 4)) )
        <div id="test3" class="col s12">
          <br>
          <h4 class="center">TABEL PESANAN</h4>
          <table class="highlight striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>No MIRS</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>s</td>
                <td>s</td> 
                <td>s</td> 
                <td>
                  <span data-badge-caption="Ditolak" class="new badge red"></span>
                  <span data-badge-caption="Disetujui" class="new badge green"></span>
                  <span data-badge-caption="Menunggu" class="new badge"></span>

                </td> 
                <td>
                  <a href="#modal1" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                </td> 
              </tr>
            </tbody>
          </table>
        </div>
        <div id="test1" class="col s12">
          <br>
          <h4 class="center">PESAN DISINI</h4>
            <div class="clone1 clone">
              <div class="col s4">
                <div class="form-group select2div">
                  <label for=""><b class="number">1.</b> MATERIAL KODE</label>
                  <select style="width: 100%" class="form-control select2" style="display: block;">
                    <option value="">Pilih Material</option>
                    @foreach (App\mdlMaterial::all() as $material)
                      <option value="{{ $material->no_material }}" urut="1" deskripsi="{{ $material->material_description }}">{{ $material->no_material.' ('.$material->material_description.')' }}</option> 
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col s4">
                <label>Deskripsi</label><br>
                <h5>...</h5>
              </div>
              <div class="col s2">
                <label>Qty</label>
                <input type="number" class="form-control">
              </div>
              <div class="col s1">
                <label>&nbsp;</label>
                <button type="button" class="waves-effect waves-light btn center remove-material" urut='1'>
                  <i class="material-icons left">delete</i>
                </button>
              </div>
            </div>
            <div class="col s12">
              <button type="button" class="btn btn-primary w-100 add-material">TAMBAH</button>
            </div>
        </div>
      @endif
      <div id="test2" class="col s12">
        <br>
        @if ( in_array(Auth::user()->divisi->level_access, array(2, 3, 4)) )
          <h4 class="center">TABEL PERSETUJUAN</h4>
          <table class="highlight striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Pemesan</th>
                <th>No MIRS</th>
                <th>Tanggal Pemesanan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>s</td>
                <td>s</td> 
                <td>s</td> 
                <td>s</td> 
                <td>
                  <a href="#modal1" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                </td> 
              </tr>
            </tbody>
          </table>
        @endif
      </div>
      
      <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Modal Header</h4>
          <p>A bunch of text</p>
          <textarea class="input-field materialize-textarea" placeholder="masukan alasan/keterangan" style="background: #0000000a"></textarea>
        </div>
        <div class="modal-footer">
          <a href="" class="btn green">Approv</a>
          <a href="" class="btn red">Not Approved</a>
        </div>
      </div>
    </div>
</form>