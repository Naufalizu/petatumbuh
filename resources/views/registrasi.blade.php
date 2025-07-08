<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>

  @vite(['resources/css/styleReg.css'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

</head>
<body>
  <section id="login-form">
    <div class="back-container">
      <a href="{{ url('/cariemail') }}"  class="back-button">
          <i class="fa-solid fa-chevron-left"></i>
      </a>
    </div>
    <h1>Registrasi</h1>

    <form action="{{ url('/registrasi') }}" method="post">
    @csrf
      <div class="input-wrap in-1">
        <input type="text" name="nama" placeholder="Nama Lengkap"  value="{{ old('nama') }}" spellcheck="false" required>
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="input-wrap in-2">
        <input type="email" name="email" placeholder="Email"  value="{{ old('email') }}" spellcheck="false" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-wrap in-3">
        <input type="tel" name="notelp" placeholder="Nomor Telepon"  value="{{ old('notelp') }}" spellcheck="false" 
              maxlength="16" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
        <i class="fa-solid fa-phone"></i>
      </div>

      <div class="input-wrap in-4">
        <input type="text" name="username" placeholder="Username"  value="{{ old('username') }}" spellcheck="false" maxlength="10" required>
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="input-wrap in-5" style="position: relative;">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" data-target="password" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
      </div>

      <div class="input-wrap in-6" style="position: relative;">
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
        <i class="fa-solid fa-eye toggle-password" data-target="password_confirmation" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
      </div>

      <button type="submit">Daftar</button>

    </form>
  </section>

  <script>
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
      toggle.addEventListener('click', function () {
        const inputId = this.getAttribute('data-target');
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        // Toggle icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    });
  </script>

  @if ($errors->any())
    <script>
      const notyf = new Notyf({
        duration: 2000,
        position: {
          x: 'right',
          y: 'top',
        }
      });

      @foreach ($errors->all() as $error)
        notyf.error("{{ $error }}");
      @endforeach
    </script>
  @endif

</body>
</html>
