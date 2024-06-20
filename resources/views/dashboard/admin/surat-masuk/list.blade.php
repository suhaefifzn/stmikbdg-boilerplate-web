@extends('template.index')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Surat Masuk</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active" aria-current="page">Data Surat Masuk</li>
    </ol>
</div>

<!-- Row -->
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk</h6>
            <a class="btn btn-sm btn-primary" href="" data-toggle="modal" data-target="#myModal"><i class="fas fa-fw fa-plus"></i> Tambah Data</a>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr class="text-center">
                <th>No.</th>
                <th>Tgl. Surat</th>
                <th>No.Agenda</th>
                <th>No. Surat Masuk</th>
                <th>Tgl. Surat Masuk</th>
                <th>Kategori Surat</th>
                <th>Pengirim</th>
                <th>Lampiran</th>
                <th>Status Surat</th>
                <th>Berkas</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['list_surat'] as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $item['tgl_sm'] }}</td>
                        <td>{{ $item['nmr_agenda'] }}</td>
                        <td>{{ $item['nmr_sm'] }}</td>
                        <td>{{ $item['tgl_surat'] }}</td>
                        <td>{{ $item['kategori']['nama'] }}</td>
                        <td>{{ $item['pengirim'] }}</td>
                        <td>{{ $item['lampiran'] }}</td>
                        <td>
                            @if ($item['status_id'] == 1)
                            <span class="badge badge-primary"><i class="fas fa-spinner"></i> Proses</span>
                            @elseif ($item['status_id'] == 2)
                            <span class="badge badge-warning"><i class="fas fa-paper-plane"></i> Diajukan</span>
                            @elseif ($item['status_id'] == 3)
                            <span class="badge badge-success"><i class="fas fa-check"></i> Selesai Disposisi</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="" data-toggle="modal" data-target="#fileModal"> Lihat File Pdf</a>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="" data-toggle="modal" data-target="#myModaledit"><i class="fas fa-fw fa-edit"></i></a><br><br>
                            <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#detailSuratModal"><i class="fas fa-eye"></i></a><br><br>
                            <button class="btn btn-sm btn-danger deleteBtn" data-id=""><i class="fas fa-fw fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<!--Row-->
@endsection

@section('scripts')
<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

<script>
    $(document).ready(function () {
        $(".deleteBtn").click(function () {
            var id = $(this).data("id");
            var confirmDelete = confirm("Yakin ingin menghapus nomor surat ini?");

            if (confirmDelete) {
                // Lakukan permintaan AJAX ke script PHP penghapusan
                $.ajax({
                    url: "hapus_surat.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        // Handle hasil penghapusan jika diperlukan
                        location.reload(); // Refresh halaman setelah penghapusan
                    }
                });
            }
        });
    });
</script>
@endsection
