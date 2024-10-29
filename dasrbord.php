<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
      // Source mixin
      @mixin make-container($padding-x: $container-padding-x) {
        width: 100%;
        padding-right: $padding-x;
        padding-left: $padding-x;
        margin-right: auto;
        margin-left: auto;
      }

      // Usage example
      .custom-container {
        @include make-container();
      }
    </style>
  </head>
  <body>

    <div class="container mt-5">
      <h1 class="text-center">Halaman Admin</h1>
      <br><br><br>

      <form>
      <p class="fs-3">selamat datang admin! anda telah Login</p>
      <p class="fs-4">Master</p>

        <button type="submit" class="btn btn-primary">data dosen</button>
        <button type="submit" class="btn btn-primary">data mahasiswa</button>
        <button type="submit" class="btn btn-primary">data matakuliah</button>
        
      </form>
    </div>

  </body>
</html>
