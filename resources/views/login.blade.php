<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  @vite(['resources/css/styleLogin.css'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

</head>
<body>
  <section id="login-form">
    <div class="back-container">
      <a href="{{ url('/index') }}" class="back-button">
          <i class="fa-solid fa-chevron-left"></i>
      </a>
    </div>
    <h1>Login</h1>

    <form action="{{ url('/login') }}" method="POST">
    @csrf
      <div class="input-wrap in-1">
        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" spellcheck="false" required>
     
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="input-wrap in-2" style="position: relative;">
        <input type="password" id="password" name="password" placeholder="Password" spellcheck="false" required>
        <i class="fa-solid fa-eye" id="togglePassword" style="position: absolute; right: 0px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
      </div>

      <div class="rem">
        <a href="{{ url('/cariemail') }}">Lupa Password?</a>
      </div>

      <div class="button-container">
        <button>Login</button>
      </div>
    </form>
    
    <p class="reg">
      Tidak Punya Akun?
      <a href="{{ url('/registrasi') }}">Daftar Sekarang</a>
    </p>
  </section>

  <script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      
      // Ganti icon mata
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

  @if ($errors->any())
    <script>
      const notyf = new Notyf({
        duration: 2000, // ⏱️ Tertutup otomatis dalam 2 detik
        position: {
          x: 'right',
          y: 'top'
        }
      });

      notyf.error(`{!! implode('<br>', $errors->all()) !!}`);
    </script>
  @endif

</body>
</html>