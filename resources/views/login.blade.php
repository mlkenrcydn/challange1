<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="width: 99% !important;">
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
               {{-- @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
--}}
                {{--  @if (Session::has('success'))  {{-- session:oturum has kullanarak oturumun varlığını sorgularız sonrasında get ile alırız. has kullanmadan get kullanamayız --}}
                {{-- <div class="alert alert-success" role="alert"> --}}
                {{--    {{ Session::get('success') }}   </div> --}}
                {{--  @endif --}}

                <h1 class="card-title">Giriş Yap</h1>
            </div>
            <div class="card-body">
                <form action="{{route('login_form')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email adresi</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Şifre</label>
                        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary">Giriş Yap</button>
                        </div>

                        <div class="d-grid mt-3">
                            <a href="" class="btn btn-warning">Kayıt Ol</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
