@extends('partials.layout')

@section('content')
      <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Form Tambah Data</h5>
                      <button type="button" onclick="closeModal()" class="close" data-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Usaha</h4>
                                <div class="basic-form">
                                    
                                    <form data-action="{{ route('usaha.store') }}" data-id="" data-type="post" method="POST" id="modal-tambah-data" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pemilik</label>
                                            <div class="col-sm-10">

                                                <select id="id_pemilik" name="id_pemilik" class="form-control" >
                                                    <option value="" selected  disabled>Pilih Pemilik</option>
                                                    @foreach ($pemilik as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_pemilik }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_pemilik-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pasar</label>
                                            <div class="col-sm-10">

                                                <select id="id_pasar" name="id_pasar" class="form-control" >
                                                    <option value="" selected disabled>Pilih Pasar</option>
                                                    @foreach ($pasar as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_pasar-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Blok</label>
                                            <div class="col-sm-10">

                                                <select id="id_blok" name="id_blok" class="form-control" >
                                                    <option value="" selected disabled>Pilih Blok</option>
                                                    @foreach ($blok as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                                <div style="display: none" id="val-id_blok-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Usaha</label>
                                            <div class="col-sm-10">
                                                <input id="nama_usaha" type="text" name="nama_usaha" class="form-control" placeholder="NamaUsaha...">
                                                <div style="display: none" id="val-nama_usaha-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Tagihan</label>
                                            <div class="col-sm-10">
                                                <input id="jlh_tagihan" type="number" name="jlh_tagihan" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-jlh_tagihan-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Tagihan</label>
                                            <div class="col-sm-10">
                                                <input id="tgl_tagihan" type="date" name="tgl_tagihan" class="form-control" placeholder="...">
                                                <div style="display: none" id="val-tgl_tagihan-error" class="invalid-feedback animated fadeInDown" style="display: block;"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Usaha</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <input onchange="loadFile(event)" id="foto_usaha" accept="image/*" type="file" name="foto_usaha" class="form-control-file">
                                                    
                                                <img id="showFoto" src="" alt="" style="
                                                    width: 100%;
                                                    height: 300px;
                                                    object-fit: contain;
                                                    object-position: bottom;

                                                ">
                                                </div>
                                            </div>
                                            {{-- <div col-sm-4 >
                                            </div> --}}
                                        </div>
                                       
                                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                    <div class="modal-footer">
                        <button type="button" onclick="closeModal()" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                        <button id="button-simpan" type="submit" class="btn btn-success button" onclick="this.classList.toggle('button--loading')">
                            <span class="button__text">Simpan</span>
                        </button>
                    </div>    
                  </form>
              </div>
          </div>
      </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex;justify-items: center;justify-content: space-between;align-items: center;">
                          <h4 class="card-title">Data Usaha</h4>
                          <button class="btn btn-success font-weight-bold" style="color:white" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                            TAMBAH DATA <i class="fa fa-plus-circle" aria-hidden="true"></i>
                          </button>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemilik</th>
                                        <th>Nama Pasar</th>
                                        <th>Nama Blok</th>
                                        <th>Nama Usaha</th>
                                        <th>Tanggal Tagihan</th>
                                        <th>Jumlah Tagihan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pemilik }}</td>
                                        <td>{{ $item->nama_pasar }}</td>
                                        <td>{{ $item->nama_blok }}</td>
                                        <td>{{ $item->nama_usaha }}</td>
                                        <td>{{ $item->tgl_tagihan }}</td>
                                        <td>{{ $item->jlh_tagihan }}</td>
                                        <td>
                                          
                                            <button type="button" id="btnEdit" 
                                                onclick="edit('{{ $item->id }}')"
                                                  
                                             style="color: white" class="btn btn-warning">
                                              <i class="fa fa-pencil"></i>

                                            </button>
                                            <button class="btn btn-danger deleteRecord" data-id="{{ $item->id }}" type="submit">
                                              <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                  @endforeach
                                    
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemilik</th>
                                        <th>Nama Pasar</th>
                                        <th>Nama Blok</th>
                                        <th>Nama Usaha</th>
                                        <th>Tanggal Tagihan</th>
                                        <th>Jumlah Tagihan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('addScript')
    {{-- POST DATA --}}
    <script >
        // $('#modal').modal({backdrop: 'static', keyboard: false})
        $(document).ready(function(){
        // $('#modal').modal('hide')
        // const form = document.getElementById('modal-tambah-data');
        var form = '#modal-tambah-data';

            $(form).on('submit', function(event){
                event.preventDefault();
                // spinner.style.display = 'block';
                
                var url = $(this).attr('data-action');
                let type = $(this).attr('data-type');
                let id = $(this).attr('data-id');
                let form = new FormData(this)
                console.log('GETATTRIBUTE', $(this).attr('data-id'), ...form);

                if (type == 'post') {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: form,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(response)
                        {
                            console.log('RESPONSE ', response.message);
                            $(form).trigger("reset");
                            $('#modal').modal('hide');
                            // alert(response.success)
                            toastr.success(`${response.message}`, "Success", {
                                timeOut: 3e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1,
                            });
                            setTimeout(() => {
                                
                                location.reload()
                            }, 3000);
                        },
                        error: function(response) {
                            $('#button-simpan').removeClass('button--loading')
                            console.log('RESPONSE ERROR', response.responseJSON);
                            const errorMessage = response.responseJSON;
                            if(errorMessage.error){
                                for (const erMsg in errorMessage.errors) {
                                    console.log('OBJ', errorMessage.errors[erMsg][0])
                                    const element = document.getElementById(`val-${erMsg}-error`);
                                    element.style.display = "block";
                                    element.innerText = `${errorMessage.errors[erMsg][0]}`
                                    element.classList.add("mystyle");
                                    
                                }
                            }
                        }
                    });
                }else{
                    // console.log('GETATTRIBUTE', $(this).attr('data-id'););
                    // form.setAttribute('data-type', 'edit');
                    // var token = $("meta[name='csrf-token']").attr("content");
                    form.set("_method", "PUT");
                    // form.set("_token", token)
                    // $(this).attr('method', 'PUT')
                    $.ajax({
                        url: `/usaha/${id}`,
                        method: 'POST',
                        data: form,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(response)
                        {
                            console.log('RESPONSE ', response.message);
                            $(form).trigger("reset");
                            $('#modal').modal('hide');
                            // alert(response.success)
                            toastr.success(`${response.message}`, "Success", {
                                timeOut: 3e3,
                                closeButton: !0,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: !0,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: !1,
                            });
                            setTimeout(() => {
                                
                                location.reload()
                            }, 3000);
                        },
                        error: function(response) {
                            $('#button-simpan').removeClass('button--loading')
                            console.log('RESPONSE ERROR', response.responseJSON);
                            const errorMessage = response.responseJSON;
                            if(errorMessage.error){
                                for (const erMsg in errorMessage.errors) {
                                    console.log('OBJ', errorMessage.errors[erMsg][0])
                                    const element = document.getElementById(`val-${erMsg}-error`);
                                    element.style.display = "block";
                                    element.innerText = `${errorMessage.errors[erMsg][0]}`
                                    element.classList.add("mystyle");
                                    
                                }
                            }
                        }
                    });
                }
                
                
            });
        });
    </script>
    {{-- EDIT DATA --}}
    <script>
        const form = document.getElementById('modal-tambah-data');
        const btnEdit = document.getElementById('btnEdit');
        
        let fileFoto = document.getElementById('foto_pemilik');
        var output = document.getElementById('showFoto');
        // fungsi update foto
        function loadFile(event) {
            console.log('EVENT', event.target);
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        
        
        function closeModal(){
            form.setAttribute('data-type', 'post');
            $('#id_pemilik').val('');
            $('#id_pasar').val('');
            $('#id_blok').val('');
            $('#nama_usaha').val('');
            $('#foto_usaha').val('');
            $('#tgl_tagihan').val('');
            $('#jlh_tagihan').val('');
            output.src = ''
            console.log('FORMCLOSE', form.getAttribute('data-type'), output.src);
        }
        
        function edit(id){
            $('#modal').modal({backdrop: 'static', keyboard: false})
            const url =`/usaha/${id}/edit`;
            form.setAttribute('data-type', 'edit');
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#modal').modal('show');
                $('#id_pasar').val(data.id_pasar);
                $('#id_blok').val(data.id_blok);
                $('#nama_usaha').val(data.nama_usaha);
                $('#id_pemilik').val(data.id_pemilik);
                $('#tgl_tagihan').val(data.tgl_tagihan);
                $('#jlh_tagihan').val(data.jlh_tagihan);
                output.src = `{{ asset('foto_usaha')}}/${data.foto_usaha}`
                form.setAttribute('data-id', data.id);

            })
        }


    </script>
    {{-- HAPUS DATA --}}
    <script>
        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
        
            $.ajax(
            {
                url: "pemilik/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (response){
                    console.log("it Works");
                        toastr.success(`${response.message}`, "Success", {
                            timeOut: 2e3,
                            closeButton: !0,
                            debug: !1,
                            newestOnTop: !0,
                            progressBar: !0,
                            positionClass: "toast-top-right",
                            preventDuplicates: !0,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                            tapToDismiss: !1,
                        });
                        setTimeout(() => {
                            location.reload()
                        }, 3000);
                }
            });
        
        });
    </script>

@endpush