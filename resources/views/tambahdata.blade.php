<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SIMAK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <h1 class="text-center mb-4">Tambah Data Siswa</h1>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          <div class="card-body">

            <form action="/insertdata" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="perempuan">Perempuan</option>
                  </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan" aria-label="Default select example">
                  <option selected>Pilih Jurusan</option>
                  <option value="RPL">RPL</option>
                  <option value="TKJ">TKJ</option>
                  <option value="MMD">MMD</option>
                  <option value="TBG">TBG</option>
                  <option value="HTL">HTL</option>
                  </select>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukan Foto</label>
                <input type="file" name="foto" class="form-control"/>
              </div>

              <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>