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

        <div class="card-header">
            <h3 class="card-title">Create</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form id="formKaryawan">
                <div class="form-group row">
                    <label for="nama-produk" class="col-sm-4 col-form-label">ID</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id" placeholder="ID" name="id" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama-produk" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="L">
                            <label class="form-check-label" for="jk">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="P">
                            <label class="form-check-label" for="jk">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama-produk" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-2">
                        <button type="submit" class="form-control btn btn-primary" id="btn-insert">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-2 mb-2">
        <div class="form-group row mt-2">
            <div class="col-sm-2">
                <button type="button" class="btn btn-success" id="sorting">Urutkan</button>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="search" name="search">
            </div>
            <div class="col-sm-2">
                <button type="button" id="btnSearch" class="btn btn-secondary">Cari</button>
            </div>
        </div>
        <table class="table table-compact table-bordered table-hover" id="tblKaryawan">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>JK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="align:center">Belum ada data</td>
                </tr>
            </tbody>
        </table>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
@push('scripts')
<script>
    function insert() {
            const data = $('#formKaryawan').serializeArray()
            let newData = {}
            data.forEach(function(item, index) {
                let name = item['name']
                let value = (name === 'id'? Number(item['value']):item['value'] )
                newData[name] = value
            })
            return newData
            }

            $(function() {
                let dataKaryawan = []

                $('#formKaryawan').on('submit', function(e){
                    e.preventDefault()
                    dataKaryawan.push(insert())
                    // console.log(dataKaryawan)
                    $('#tblKaryawan tbody').html(showData(dataKaryawan))
                    console.log(dataKaryawan);
                })

                $('#sorting').on('click', function(){
                    dataKaryawan = insertionSort(dataKaryawan, 'id')
                    $('#tblKaryawan tbody').html(showData(dataKaryawan))
                    console.log(dataKaryawan);
                })

                $('#btnSearch').on('click', function(e){
                    let teksSearch = $('#search').val()
                    let id = searching(dataKaryawan, 'id', teksSearch)
                    let data = []
                    if(id >= 0)
                    data.push(dataKaryawan[id])
                    console.log(id);
                    console.log(data);
                    $('#tblKaryawan tbody').html(showData(data))
                })
            })

            function showData(arr){
                let row = ''
                if(arr.length == null){
                    return row = `<tr><td colspan="3">Belum ada data</td></tr>`
                }
                arr.forEach(function(item, index){
                    row += `<tr>`
                    row += `<td>${item['id']}</td>`
                    row += `<td>${item['nama']}</td>`
                    row += `<td>${item['jk']}</td>`
                    row += `</tr>`
                })
                return row
            }

            function insertionSort(arr, key){
                let i, j, id, value;
                for (i = 1; i < arr.length; i++)
                {
                    value = arr[i];
                    id = arr[i][key]
                    j = i - 1;
                    while (j >= 0 && arr[j][key] > id)
                    {
                        arr[j + 1] = arr[j];
                        j = j - 1;
                    }
                    arr[j + 1] = value;
                }
                return arr
            }

            function searching(arr, key, teks){
                for(let i = 0; i < arr.length; i++){
                    if(arr[i][key] == teks)
                    return i
                }
                return -1
            }





    </script>
{{-- <script>
    function insert() {
        const data = $('#formkaryawan').serializeArray()
        let newData = {}
        data.forEach(function (item, index){
            let name = item['name']
            let value = (name == 'id' ? Number(item['value']) : item['value'])
            newData[name] = value
        })
        return newData
        }
        $(function () {
            //property
            let datakaryawan = []
            //events
            $('#formkaryawan').on('submit', function (e) {
                e.preventDefault()
                datakaryawan.push(insert())
                $('#tblKaryawan tbody').html(showData(datakaryawan))
                console.log(datakaryawan);
            })
            //end of events

            $('#btn-sorting').on('click', function () {
                sorting()
            })

            $('#btn-search').on('click', function () {
                searching()
            })
        function showData(arr) {
            let row = ''
            if (arr.lenght == null) {
                return row = '<tr><td colspan="3">Belum ada data </td></tr>
            }
            arr.forEach(function (item,index) {
                row += '<tr>'
                row += '<td>${item['id']}</td>'
                row += '<td>${item['nama']}</td>'
                row += '<td>${item['jk']}</td>'
                row += '</tr>'
            })
            return row
        }
        function insertData() {
            console.log('insert')
        }
        function searcing() {
            console.log('cari')
        }
        function sorting() {
            console.log('sorting')
        }
        })




</script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>
@endpush
