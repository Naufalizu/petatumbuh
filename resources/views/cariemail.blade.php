<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  @vite(['resources/css/styleFEmail.css'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

</head>
<body>
  <section id="login-form">
    <div class="back-container">
      <a href="{{ route('login') }}" class="back-button">
          <i class="fa-solid fa-chevron-left"></i>
      </a>
    </div>
    <h1>Cari Email</h1>

    <form action="{{ route('lupa-password.cari') }}" method="POST">
    @csrf
      <div class="input-wrap in-1">
        <input type="text" name="email" placeholder="Email" spellcheck="false" required>
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="button-container">
        <button type="submit">Cari Email</button>
      </div>
    </form>
  </section>

  @if (session('error'))
  <script>
    const notyf = new Notyf({
      duration: 1500,
      position: {
        x: 'right',
        y: 'top',
      }
    });

    notyf.error("{{ session('error') }}");
  </script>
  @endif

  @if (session('success'))
  <script>
    const notyf = new Notyf({
      duration: 2000,
      position: {
        x: 'right',
        y: 'top',
      }
    });

    notyf.success("{{ session('success') }}");
  </script>
  @endif

</body>
</html>