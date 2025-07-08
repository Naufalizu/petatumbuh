<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>

  @vite(['resources/css/styleProfile.css'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>
  <section id="login-form">
    <div class="back-container">
        <a href="{{ url()->previous() }}" class="back-button">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
    </div>

    <h1>Profil</h1>
    <form action="#" method="get">
      @csrf

      <div class="input-wrap in-1">
        <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ $user->nama }}" required>
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="input-wrap in-2">
        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-wrap in-3">
        <input type="tel" name="notelp" placeholder="Nomor Telepon"
               value="{{ $user->notelp }}"
               maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        <i class="fa-solid fa-phone"></i>
      </div>

      <div class="input-wrap in-4">
        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}" maxlength="10" required>
        <i class="fa-solid fa-user"></i>
      </div>

    </form>
  </section>
</body>
</html>
