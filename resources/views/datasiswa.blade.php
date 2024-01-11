<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAK</title>
  
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
        /* Aturan khusus untuk Toastr */
        .toast-success {
            background-color: green !important;
            opacity: 1 !important; /* Pastikan opasitas (transparansi) adalah 1 (tidak transparan) */
            color: white; /* Ubah warna teks menjadi putih */
        }
        .table > :not(:first-child) {
      border-top: 2px solid currentColor;
    }
    </style>
</head>

<body>
  <h1 class="text-center mb-4">Data Siswa</h1>
  <div class="container">
    <a href="/tambahsiswa" type="button" class="btn btn-success">Tambah +</a>
    

      <div class="g-3 align-items-center mt-2">
            <div class="col-auto">
            
        </form>
        </div>
        


        <div class="row g-3 align-items-center">
  <div class="col-auto">
  <form action="/siswa" method="GET">
            <input type="search" class="form-control" name="search">
</div>

        <div class="col-auto">
        <a href="/exportexcel" type="button" class="btn btn-success">Export Excel</a>
        </div>
        <div class="col-auto">        
        <a href="/exportpd" type="button" class="btn btn-warning">Export PDF</a>
        </div>
        <div class="col-auto">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Import Data
          </button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Excel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="/importexcel" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <input type="file" name="file" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <div class="row">
      <!-- @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{$message}}
        </div>
      @endif -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $row)
            <tr>
              <th scope="row">{{$index + $data->firstItem()}}</th>
              <td>{{ $row->nama}}</td>
              <td>
                <img src="{{ Storage::url('public/fotosiswa/' . $row->foto) }}" alt="" style="width: 50px; height:50px; ">
              </td>
              <td>{{ $row->jeniskelamin}}</td>
              <td>{{ $row->jurusan}}</td>
              <td>{{ $row->created_at->format('D M Y')}}</td>
              <td>
                <a href="/tampilkandata/{{$row->id}}" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
  <!-- Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <script>
    $('.delete').click(function() {
      var siswaId = $(this).data('id');
      var nama = $(this).data('nama');

      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Siswa dengan nama " + nama + " akan dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`/delete/${siswaId}`)
            .then(response => {
              if (response.status === 200) {
                Swal.fire(
                  'Deleted!',
                  'Data Siswa telah dihapus.',
                  'success'
                ).then(() => {
                  location.reload();
                });
              } else {
                Swal.fire(
                  'Oops...',
                  'Terjadi kesalahan saat menghapus data.',
                  'error'
                );
              }
            })
            .catch(error => {
              Swal.fire(
                'Oops...',
                'Terjadi kesalahan saat menghapus data.',
                'error'
              );
            });
        }
      });

    });

    var successMessage = "{{ Session::has('success') ? Session::get('success') : '' }}";

    $(document).ready(function() {
      if (successMessage) {
        toastr.success(successMessage);
      }
    });
  </script>
</body>
</html>
