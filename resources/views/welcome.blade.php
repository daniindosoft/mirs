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

                 
                $('.clone:last > div > button').attr('urut',+lengthRow);
                $('.clone:last h5').text('...');
                $('.clone:last input').val('');
                $('.clone:last > div > .select2div').html(`
                  <label for=""><b>`+lengthRow+`.</b> MATERIAL KODE</label>
                    <select style="width: 100%" class="form-control select2" style="display: block;">
                        <option value="">Pilih Material</option>
                        @foreach (App\mdlMaterial::all() as $material)
                            <option value="{{ $material->no_material }}" deskripsi="{{ $material->material_description }}" urut=`+lengthRow+`>{{ $material->no_material.' ('.$material->material_description.')' }}</option> 
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
            $(document).on("change", ".select2", function(){
                var deskripsi = ($('option:selected',this).attr('deskripsi'));
                var urut = ($('option:selected',this).attr('urut'));
                $('.clone'+urut+' h5').text(deskripsi);
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
         
    </script>

@endsection
@section('content')
    <div class="row">
        <div class="section s9">
            <div class="card">
                <div class="card-content center-align">
                    <h3 class="card-title">E-MIRS - PT SDLKFJSDLFKSDJF LK</h3>
                </div>
                <div class="card-content">
                    {!! App\Http\Controllers\ctrlRole::dashboardByRole() !!}
                </div>
                     
            </div>
        </div>
    </div>
@endsection