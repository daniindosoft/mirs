
  <div class="row">
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          @if ( in_array(Auth::user()->divisi->level_access, array(2, 1)) )
            {{-- FORM PEMESANAN --}}
            <li class="tab col s3"><a href="#test1" class="active"><i class="fa fa-shopping-cart"></i> Pemesanan</a></li> 
            {{-- TABEL DARI FORM PEMESANAN --}}
            <li class="tab col s3"><a href="#test3"><i class="fa fa-edit"></i> Pesanan</a></li> 
          @endif
          @if ( in_array(Auth::user()->divisi->level_access, array(5)) )
            {{-- EM/KELUARKAN STOK --}}
            <li class="tab col s3"><a href="#test4"><i class="fa fa-check-square"></i> Keluarkan</a></li> 
          @endif
          @if ( in_array(Auth::user()->divisi->level_access, array(2, 3, 4)) )
            {{--  --}}
            <li class="tab col s3"><a href="#test2"><i class="fa fa-mouse-pointer"></i> Persetujuan</a></li> 
          @endif

        </ul>
      </div>
      @if ( in_array(Auth::user()->divisi->level_access, array(5)) )
        <div id="test4" class="col s12">
          <br>
          <h4 class="center">KELUARKAN STOK</h4>
          <table class="highlight striped">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Pemesan</th>
                <th>No MIRS</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            @php
              $no=1;
            @endphp
            @foreach(\App\Http\Controllers\ctrlRole::persetujuan() as $mirs)

                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mirs->user->nama_lengkap }}</td> 
                  <td>{{ $mirs->no_mirs }}</td> 
                  <td>{{ $mirs->date }}</td> 
                  <td>{!! \App\Http\Controllers\ctrlRole::getStatusMirs($mirs->idnya) !!}</td> 
                  <td>
                    <a href="#modal1" onclick="return loadMirsToPopUp({{$mirs->idnya}})" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                  </td> 
                </tr>
              @endforeach
          </table>
        </div>
      @endif
      @if ( in_array(Auth::user()->divisi->level_access, array(1, 2)) )
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
              @foreach(App\mdlMirs::where('request_by', Auth::user()->id)->get() as $key => $mirs)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $mirs->no_mirs }}</td> 
                  <td>{{ $mirs->date }}</td> 
                  <td>
                    <span data-badge-caption="Ditolak" class="new badge red"></span>
                    <span data-badge-caption="Disetujui" class="new badge green"></span>
                    <span data-badge-caption="Menunggu" class="new badge"></span>

                  </td> 
                  <td>
                    <a href="#modal1" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                  </td> 
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div id="test1" class="col s12">
          <br>
          <h4 class="center">PESAN DISINI</h4>
          <br>
          <br>
          <form action="{{ url('/mirs/ajukan') }}" method="post" onsubmit="return confirm('Yakin data sudah benar dan siap untuk di ajukan ?');">
            {{ csrf_field() }}
            <div class="clone1 clone">
              <div class="col s3">
                <div class="form-group select2div">
                  <label for=""><b class="number">1.</b> MATERIAL KODE</label>
                  <select name="material_code[]" style="width: 100%" class="form-control select2 select-material" style="display: block;">
                    <option value="">Pilih Material</option>
                    @foreach (App\mdlMaterial::all() as $material)
                      <option value="{{ $material->id }}" urut="1" price="{{ $material->price }}" begin="{{ $material->begin }}" end="{{ $material->end }}" uom="{{ $material->uom }}" deskripsi="{{ $material->deskripsi }}" code="{{ $material->material_code }}">{{ $material->material_code.' ('.$material->deskripsi.')' }}</option> 
                    @endforeach
                  </select>
                  <br>
                  <p class="pdes"></p>
                </div>
              </div>
              <div class="col s3">
                <div class="form-group select2div3">
                  <label for="">CHARGE TO</label>
                  <select name="chargeto[]" style="width: 100%" class="form-control select2 select-block" style="display: block;">
                    <option value="">Pilih ..</option>
                    @foreach (App\mdlBlock::all() as $block)
                      <option value="{{ $block->id }}" urut="1" block="{{ $block->block }}" ha="{{ $block->ha }}">{{ $block->block.' - '.$block->ha }}</option> 
                    @endforeach
                  </select>
                   
                </div>
              </div>
              <div class="col s1">
                <label>Qty</label>
                <input type="number" name="qty[]" class="form-control qty" urut=1>
              </div>
              <div class="col s3">
                <div class="form-group select2div2">
                  <label>Account</label>
                  <select name="account[]" style="width: 100%" class="form-control select2 select-gl" style="display: block;">
                    <option value="">Pilih Account</option>
                    @foreach (App\mdlGl::all() as $gl)
                      <option value="{{ $gl->id }}" urut="1" account="{{ $gl->kode }}" deskripsi="{{ $gl->deskripsi }}">{{ $gl->kode.' ('.$gl->deskripsi.')' }}</option> 
                    @endforeach
                  </select>
                 
                  
                </div>
              </div>
              <div class="col s1">
                <label>&nbsp;</label>
                <button type="button" class="waves-effect waves-light btn center remove-material" urut='1'>
                  <i class="material-icons left">delete</i>
                </button>
              </div>
              <input type="hidden" name="ttlamount[]" class="ttlamountinput">
              <div class="col s12">
                <div class="col s12 detail">
                  <div class="col s3">
                    <label>Material Code</label><br>
                    <h6 class="code">..</h6>
                  </div>
                  <div class="col s3">
                    <label>Deskripsi</label><br>
                    <h6 class="deskripsi">..</h6>
                  </div>
                  <div class="col s12 mt-25">
                    <b class="b">REQUESTION</b>
                  </div>
                  <div class="col s3">
                    <label>Charge To</label><br>
                    <h6 class="chargeto">..</h6>
                  </div>
                
                  <div class="col s3">
                    <label>UOM</label><br>
                    <h6 class="uom">..</h6>
                  </div>
                  <div class="col s12 mt-25">
                    <b class="b">ISSUE QTY</b>
                  </div>
                  <div class="col s3">
                    <label>Luas Ha</label><br>
                    <h6 class="luasha">..</h6>
                  </div>
                  <div class="col s3">
                    <label>Dosage</label><br>
                    <h6 class="dosage">..</h6>
                  </div>
                  <div class="col s12 mt-25">
                    <b class="b">STOCK</b>
                  </div>
                  <div class="col s3">
                    <label>BEGIN</label><br>
                    <h6 class="begin">..</h6>
                  </div>
                  <div class="col s3">
                    <label>END</label><br>
                    <h6 class="end">..</h6>
                  </div>
                  <div class="col s12 mt-25">
                    <b class="b">FOR ACCOUNT DEPT</b>
                  </div>
                  <div class="col s3">
                    <label>Price</label><br>
                    <h6 class="price">..</h6>
                  </div>
                  <div class="col s3">
                    <label>TTL AMOUNT</label><br>
                    <h6 class="ttlamount">..</h6>
                  </div>
                  <div class="col s3">
                    <label>ACCOUNT</label><br>
                    <h6 class="account">..</h6>
                  </div>
                  <div class="col s3">
                    <label>REMARKS</label><br>
                    <h6 class="remarks">..</h6>
                  </div>
                </div>
              </div>
               
            </div>
            <div class="col s4">
              <button type="button" class="btn green w-100 add-material">
                <i class="fa fa-plus-square"></i> Tambah Material</button>
            </div>
            <div class="col s8">
              <button type="submit" class="btn btn-primary w-100">
                <i class="fa fa-file"></i> Ajukan
              </button>
            </div>
          </form>
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
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            @php
              $no=1;
            @endphp
            @foreach(\App\Http\Controllers\ctrlRole::persetujuan() as $mirs)

                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $mirs->user->nama_lengkap }}</td> 
                  <td>{{ $mirs->no_mirs }}</td> 
                  <td>{{ $mirs->date }}</td> 
                  <td>{!! \App\Http\Controllers\ctrlRole::getStatusMirs($mirs->idnya) !!}</td> 
                  <td>
                    <a href="#modal1" onclick="return loadMirsToPopUp({{$mirs->idnya}})" class="waves-effect waves-light green btn modal-trigger">Lihat <i class="fa fa-list"></i> </a>
                  </td> 
                </tr>
              @endforeach
          </table>
        @endif
      </div>
      
      <div id="modal1" class="modal modal-lg">
        <form action="{{ url('/mirs/approved') }}" method="post">
          {{ csrf_field() }}
          <div class="modal-content">
            <h4>Detail Mirs</h4>
            <div id="dataModal">
              <p><i class="fa fa-spinner fa-spin"></i> Loading</p>
            </div>
            
          </div>
          <div class="modal-footer approved-mirs">
            <button class="btn green">Proses</button>
          </div>
        </form>
      </div>
    </div>

