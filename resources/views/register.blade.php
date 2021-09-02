@include('shared.header')

<body class="signup-page">

    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Bit</b> by <b>Bit</b></a>
            <small>E-Learning</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" action="{{ url('/User') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="msg">Register a new membership</div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Fname" placeholder="First Name"
                                        autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">person</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Lname" placeholder="LastName">
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
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Password">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">home</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="address" placeholder="address">
                                </div>
                            </div>

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
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">school</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="education" placeholder="Education">
                                </div>
                            </div>

                        </div>
                    </div>

                   
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">assignment_ind</i>
                                </span>
                                <div class="demo-radio-button ">
                                    
                                    <label class="form-label p-l-15 ">Register as :</label>
                                    @foreach ($data as $key => $value)
                                        @if ($value->ID == 1)
                                            @continue
                                        @endif
                                        <input name="roleID" value="{{ $value->ID }}" type="radio"
                                            class="with-gap radio-col-light-green" id="{{ 'radio_' . $key }}" />
                                        <label for="{{ 'radio_' . $key }}">{{ ucfirst($value->title) }}</label>
                                    @endforeach

                                </div>

                               
                            </div>
                        </div>
                    </div>



                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">add_a_photo</i>
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="image" placeholder="Add a photo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg btn-success waves-effect" type="submit">SIGN
                        UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ url('/') }}">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- show errors  -->
        <div class=" m-t-15">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->get('Message') !== null)
                <div class="alert alert-danger">
                    {{ session()->get('Message') }}
                </div>
            @endif

        </div>
    </div>

    @include('shared.footer')