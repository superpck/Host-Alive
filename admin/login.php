  <!--body class="hold-transition login-page"-->
    <div class="login-box">
      <div class="login-logo">
        <a href="?r="><?=$TitleBand;?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login เข้าสู่ระบบ</p>
        <form action="?r=login" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User ID">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>

            <hr><small><?=$TitlePage;?></small>

          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
