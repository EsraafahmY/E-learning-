@include('shared.header');
@include('shared.nav');
@include('shared.sidNav');
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
        <body class="signup-page">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ session()->get('Message') }}

    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Bit</b> by <b>Bit</b></a>
            <small>E-Learning</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ url('/User') }}"  enctype="multipart/form-data">
                @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="firstName" placeholder="First Name" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="lastName" placeholder="LastName">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email" placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock</i>
                                </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">home</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="address" placeholder="address">
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">call</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone" placeholder="phone">
                                </div>
                            </div>

                            <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">work</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="job" placeholder="job">
                                </div>
                            </div>

                            <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">school</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="education" placeholder="Education" >
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment_ind</i>
                                </span>
                                <select name="role_id" class="form-control bootstrap-select show-tick">
                                    <option value="">-- Register as --</option>
                                    <?php

                                    while ($rows = mysqli_fetch_assoc($op)) {
                                        if ($rows['ID'] == 0)
                                            continue;
                                     ?>

                                        <option value="<?php echo $rows['ID']; ?>"> <?php echo ucfirst($rows['title']); ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="input-group"> 
                        <span class="input-group-addon">
                            <i class="material-icons">add_a_photo</i>
                        </span>
                        <div class="form-line">
                            <input type="file" class="form-control" name="image"  placeholder="Add a photo" >
                        </div>
                    </div> 
                    
                    <button class="btn btn-block btn-lg btn-success waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="index.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>
</section>
@include('shared.footer');
