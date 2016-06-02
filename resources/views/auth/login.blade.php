{{--
Created by Sublime Text 3

@user     Agung Laksono
@email    agung@custombagus.com
@date     27/12/2015
@time     20:19
--}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="/img/cb-ico.png">
    <title>CustomBagus - Content Management</title>

    <link rel="stylesheet" type="text/css" href="{{ elixir('css/admin-css.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/js/admin/iCheck/square/blue.css" />
    <style type="text/css">
      .icheckbox_square-blue {
        top: -2px;
        margin-right: 5px;
      }
    </style>
  </head>
  <body class="login-page">
  <div class="login-box">
    @include('admin.partial.alert')
    <div class="login-logo">
      <a href="{{ route('admin.index') }}"><b>Custom</b>Bagus</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Sign In to enter the <strong>Manager Dashboard</strong></p>

      @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
      @endif

      <form method="POST" action="{{ route('admin.auth.store') }}">
        {!! csrf_field() !!}
        @if (Input::has('redirect_to'))
        <input type="hidden" name="redirect_to" value="{{ Input::get('redirect_to') }}" />
        @endif
        <div class="form-group has-feedback">
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email"/>
          <span class="form-control-feedback"><i class="fa fa-envelope"></i></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
          <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember"> Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>
      </div>
    </div>


    <script type="text/javascript" src="/js/admin/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/admin/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/admin/iCheck/icheck.min.js"></script>
    <script type="text/javascript">
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
