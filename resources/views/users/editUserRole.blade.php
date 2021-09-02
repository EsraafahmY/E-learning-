@include('shared.header')
@include('shared.nav')
@include('shared.sidNav')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">

        <section class="content">
    <div class="container-fluid">

        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            update role
                        </h2>

                    </div>
                    <div class="body">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form method="post" action="{{ url('/User/'. $data[0]->ID) }}" enctype="multipart/form-data">
                        @method('put')
                            @csrf
                            <div class="row clearfix">
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <div class="demo-radio-button pull-right">

                                            @foreach ($roles as $key => $value)
                                        @if ($value->ID == 1)
                                            @continue
                                        @endif
                                        <input name="roleID" value="{{ $value->ID }}" type="radio"
                                            class="with-gap radio-col-light-green" id="{{ 'radio_' . $key }}" />
                                        <label for="{{ 'radio_' . $key }}">{{ ucfirst($value->title) }}</label>
                                    @endforeach
                                               
                                            </div>

                                            <label class="form-label">Role</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <button type="submit" class="btn btn-primary btn-block btn-lg m-l-15 pull-right waves-effect">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

              
                </div>
            </div>
        </div>
        <!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>
        </div>
    </div>
</section>
@include('shared.footer')
