@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jika menggunakan bootstrap4 gunakan css ini  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <style>
        .select2-results__option:hover{
            background: #e0e0e0
        }
        .flexbox {
          display: flex;
          flew-wrap: wrap;
          justify-content: center;
          align-items: center;
        }
        .dataTables_filter > label > input{
            height: auto !important
        }
        body{
            background: #e3e3e3 !important
        }
        .clone .detail {
            margin-bottom: 70px;
            margin-top: 10px;
            background: #e8e8e8;
            padding: 10px;
        }
        .clone p {
            margin-top: -15px !important
        }
        .select2div2, .select2div, .select2div3{
            background: #f0f0f0;
            padding: 10px;
            border-radius: 3px;
        }
        .clone{
            /*display: flex;*/
        }
        .hide{
            display: none !important;
        }
        .b{
            font-weight: bold !important
        }
        .detail b{
            color: #0d47a1;
        }
        .mt-25{
            margin-top: 25px;
        }
    </style>
@endsection
@section('js')
{{--     
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script> --}}
    <!-- js untuk bootstrap4  -->
    
    <!-- js untuk select2  -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>
        var lengthRowGlobal = 0;
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
        $(document).ready(function () {
            $('.striped').DataTable();
            var lengthRowGlobal = $('.clone').length;
            selectdua();
            $('.add-material').on('click', function(){
                var lengthRow = $('.clone').length + 1;
                var templateClone = $(".clone:last").clone();
                templateClone.attr('class','clone clone'+lengthRow);
                templateClone.insertAfter(".clone:last");

                 
                $('.clone:last > div > button').attr('urut',lengthRow);
                $('.clone:last h6').text('...');
                $('.clone:last .pdes').text('...');
                $('.clone:last input').val('');
                $('.clone:last .qty').attr('urut',lengthRow);
                $('.clone:last > div > .select2div').html(`
                  <label for=""><b>`+lengthRow+`.</b> MATERIAL KODE</label>
                    <select name="material_code[]" style="width: 100%" class="form-control select2 select-material" style="display: block;">
                        <option value="">Pilih Material</option>
                        @foreach (App\mdlMaterial::all() as $material)
                            <option value="{{ $material->id }}" urut=`+lengthRow+` price="{{ $material->price }}" begin="{{ $material->begin }}" end="{{ $material->end }}" uom="{{ $material->uom }}" deskripsi="{{ $material->deskripsi }}" code="{{ $material->material_code }}">{{ $material->material_code.' ('.$material->deskripsi.')' }}</option> 
                        @endforeach
                    </select>
                    
                    `);
                $('.clone:last > div > .select2div2').html(`
                      <label>Account</label>
                    <select name="account[]" style="width: 100%" class="form-control select2 select-gl" style="display: block;">
                        <option value="">Pilih Account</option>
                        @foreach (App\mdlGl::all() as $gl)
                          <option value="{{ $gl->id }}" urut=`+lengthRow+` account="{{ $gl->kode }}" deskripsi="{{ $gl->deskripsi }}">{{ $gl->kode.' ('.$gl->deskripsi.')' }}</option>  
                        @endforeach
                    </select>
                    
                    `);
                $('.clone:last > div > .select2div3').html(`
                      <label for="">CHARGE TO</label>
                      <select name="chargeto[]" style="width: 100%" class="form-control select2 select-block" style="display: block;">
                        <option value="">Pilih ..</option>
                        @foreach (App\mdlBlock::all() as $block)
                          <option value="{{ $block->id }}" urut=`+lengthRow+` block="{{ $block->block }}" ha="{{ $block->ha }}">{{ $block->block.' - '.$block->ha }}</option>  
                        @endforeach
                      </select>
                     
                    `);
                lengthRowGlobal = lengthRow;
                selectdua();
                
            });
            // $('.delete-material').on('click', function(){
            //     var templateClone = $(".clone:last").clone();
            //     templateClone.appendTo(".clone:last");                  
            // });
            $(document).on("change", ".select-material", function(){
                var deskripsi = ($('option:selected',this).attr('deskripsi'));
                var uom = ($('option:selected',this).attr('uom'));
                var begin = ($('option:selected',this).attr('begin'));
                var end = ($('option:selected',this).attr('end'));
                var price = ($('option:selected',this).attr('price'));
                var code = ($('option:selected',this).attr('code'));
                var urut = ($('option:selected',this).attr('urut'));

                // $('.clone'+urut+' h6').text(deskripsi);
                $('.clone'+urut+' .deskripsi').html(deskripsi);
                $('.clone'+urut+' .uom').html(uom);
                $('.clone'+urut+' .begin').html(begin);
                $('.clone'+urut+' .end').html(end);
                $('.clone'+urut+' .price').html(price);
                $('.clone'+urut+' .code').html(code);

                refreshAritmatika(urut);
            });
            $(document).on("keyup", ".qty", function(){
                var urut = $(this).attr('urut');
                refreshAritmatika(urut);
                
            });
            $(document).on("change", ".select-gl", function(){
                var deskripsi = ($('option:selected',this).attr('deskripsi'));
                var account = ($('option:selected',this).attr('account'));
                var urut = ($('option:selected',this).attr('urut'));
                $('.clone'+urut+' .remarks').html(deskripsi);
                $('.clone'+urut+' .account').html(account);
                refreshAritmatika(urut);
            });
            $(document).on("change", ".select-block", function(){
                var ha = ($('option:selected',this).attr('ha'));
                var block = ($('option:selected',this).attr('block'));
                var urut = ($('option:selected',this).attr('urut'));
                $('.clone'+urut+' .luasha').html(ha);
                $('.clone'+urut+' .chargeto').html(block);
                refreshAritmatika(urut);
            });
            $(document).on("click", ".remove-material", function(){
                
                if(lengthRowGlobal >1){
                    console.log('.clone'+$(this).attr('urut'));
                    $('.clone'+$(this).attr('urut')).remove();
                }
                // console.log(lengthRowGlobal);
            });
        });
        function selectdua(){
            $(".select2").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
                allowClear: true,
                tags: true,
            });
        }
        function refreshAritmatika(idclone){
            var qty = $('.clone'+idclone+' .qty').val();
            var luasha = $('.clone'+idclone+' .luasha').text();
            var price = $('.clone'+idclone+' .price').text();

            $('.clone'+idclone+' .dosage').text(qty/luasha);
            $('.clone'+idclone+' .ttlamount').text(qty*price);
            console.log(qty+' x '+luasha);

            // $('.clone'+idclone+' .dosage').html(account);
        }
         
    </script>

@endsection
@section('content')
    <div class="row">
        <div class="section s9">
            <div class="card">
                <div class="card-content center-align">
                    <h3 class="card-title">E-MIRS PT. SARANA TITIAN PERMATA 2 </h3>
                </div>
                <div class="card-content">
                    {!! App\Http\Controllers\ctrlRole::dashboardByRole() !!}
                </div>
                     
            </div>
        </div>
    </div>
@endsection