@extends('layouts.home-layouts')


@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Paket</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      @if (session('success'))
          <div class="alert alert-success" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif

      @if (session('success-delete'))
          <div class="alert alert-danger" role="alert" id="success-alert">
            {{ session('success-delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      @endif

      @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul>
              @foreach ($errors->all() as $item)
                  <li>{{ $item }}</li>
                  <li>{{ $item }}</li>
                  <li>{{ $item }}</li>
                  <li>{{ $item }}</li>
              @endforeach
            </ul>
          </div>

      @endif
      <div class="card-header">
        <h3 class="card-title">Create</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalButton">
                Tambah Data
            </button>
            <a href="{{ route('export-paket') }}">
                <button class="btn btn-success fa fa-file-excel">
                    Export
                </button>
            </a>
            <a href="{{ route('import-paket') }}">
                <button class="btn btn-success fa fa-file-excel" data-bs-toggle="modal" data-bs-target="#importButton">
                    Import
                </button>
            </a>

          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table class="table  table-dark table-hover table-compact" id="tbl-data-produk">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Outlet</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama Paket</th>
                <th scope="col">Harga</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($pakets as $item)
                <tr>
                  <td>{{ $i = (isset($i)?++$i:$i = 1) }}</td>
                  {{-- <td>{{ $item->id }}</td> --}}
                  <td>{{ $item->id_outlet }}</td>
                  <td>{{ $item->jenis }}</td>
                  <td>{{ $item->nama_paket }}</td>
                  <td>{{ $item->harga }}</td>
                  <td >
                    <button type="button" class="btn btn-edit" data-bs-toggle="modal" data-bs-target="#ModalButton"
                    data-mode="edit"
                    data-id="{{ $item->id }}"
                    data-id_outlet="{{ $item->id_outlet }}"
                    data-jenis="{{ $item->jenis }}"
                    data-nama_paket="{{ $item->nama_paket }}"
                    data-harga="{{ $item->harga }}"
                    >
                      <i class="fa fa-edit" style="color: blue"></i>
                    </button>
                    <form action="{{ route('paket.destroy', $item->id) }}" style="display: inline" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-delete" title="delete"><i class="fa fa-trash" style="color: red"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach



            </tbody>
          </table>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
    <!-- /.content -->
@endsection
@include('paket.modal.form')
@push('scripts')
    <script>
      $('#tbl-data_paket').DataTable();

      $("#success-alert").fadeTo(2000,500).slideUp(500, function(){
        $("#success-alert").slideUp(500)
      })
      //trigger action delete
      $('.btn-delete').click(function(e){
        e.preventDefault()
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if(result.isConfirmed)
          $(e.target).closest('form').submit()
        else swal.close()
      })
      })
      //end delete

      //edit
      $('#ModalButton').on('show.bs.modal', function(e){
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode = btn.data('mode')
        const id = btn.data('id')
        const id_outlet = btn.data('id_outlet')
        const jenis = btn.data('jenis')
        const nama_paket = btn.data('nama_paket')
        const harga = btn.data('harga')
        const modal = $(this)
        if( mode === 'edit'){
          modal.find('.modal-title').text('Edit data produk')
          modal.find('#id').val(id)
          modal.find('#id_outlet').val(id_outlet)
          modal.find('#jenis').val(jenis)
          modal.find('#nama_paket').val(nama_paket)
          modal.find('#harga').val(harga)

          modal.find('.modal-body form').attr('action', '{{ url("paket") }}/'+id)
          modal.find('#method').html('@method("PATCH")')
        }else{
          modal.find('.modal-title').text('Input data barang')
          modal.find('#id').val('')
          modal.find('#id_outlet').val('')
          modal.find('#jenis').val('')
          modal.find('#nama_paket').val('')
          modal.find('#harga').val('')

          modal.find('.modal-body form').attr('action', '{{ url("paket") }}/')
        }
      })
    </script>
@endpush
