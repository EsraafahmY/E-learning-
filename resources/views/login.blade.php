@include('shared.header')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">

            <body class="login-page">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="login-box">
                    <div class="logo">
                        <a href="javascript:void(0);"><b>Bit</b> by <b>Bit</b></a>
                        <small>E-Learning</small>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="sign_in" method="POST" action="{{ url('/doLogin') }}"
                                enctype="multipart/form-data">
                                <div class="msg">Sign in to start your session</div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" placeholder="email"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8 p-t-5">
                                        <input type="checkbox" name="rememberMe" id="rememberMe"
                                            class="filled-in chk-col-pink">
                                        <label for="rememberme">Remember Me</label>
                                    </div>

                                    <div class="col-xs-4">
                                        <button class="btn btn-success  waves-effect" type="submit">SIGN IN</button>
                                    </div>
                                </div>
                                <div class="row m-t-15 m-b--20">
                                    <div class="col-xs-6">
                                        <a href="User/create">Register Now!</a>
                                    </div>
                                    <!-- <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                                </div>
                            </form>

                            <!-- show errors  -->
                            <div class=" m-t-15">
                                <?php
                                if (count($errors) > 0) {
                                    foreach ($errors as $key => $value) {
                                        # code...
                                
                                        echo '
                                                            <div class="alert alert-danger">
                                                            <strong>' .
                                            $key .
                                            ': </strong> ' .
                                            $value .
                                            ' </div>' .
                                            '<br>';
                                    }
                                }
                                ?>
                            </div>


                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>
@include('shared.footer')
