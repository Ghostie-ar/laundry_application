@extends('layouts.home-layouts')
<!-- Modal -->
<div class="modal fade" id="ModalButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Data Paket</h5></h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button> --}}
          <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="paket" method="POST">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input  type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="text">Text</label>
                    <input  type="text" class="form-control" id="text" name="text">
                  </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                  <select class="form-control" id="jenis">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="L" id="L">Laki-Laki</option>
                    <option value="P" id="P">Perempuan</option>
                    <option value="lain" id="lain">Lainnya</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="tlp">Telpon</label>
                  <input type="" class="form-control" id="tlp" name="tlp">
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>

  {{-- import modal --}}
<div class="modal fade" id="importButton" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Data Paket</h5></h5>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button> --}}
          <button type="button" class="close" aria-label="Close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url(request()->segment(1).'/paket/import') }}" enctype="multipart/form-data" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlFile1">File Import</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                <button type="submit" class="btn btn-primary">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
              </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
