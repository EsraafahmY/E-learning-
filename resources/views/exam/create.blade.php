@include('shared.header')
@include('shared.nav')
@include('shared.sidNav')

<section class="content">
    <div class="container-fluid">

        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add new question
                        </h2>

                    </div>
                    <div class="body">
                        <form method="{{ url('/Exam') }}" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="question">
                                            <label class="form-label">Question</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="answer1">
                                            <label class="form-label">Answer 1</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="answer2">
                                            <label class="form-label">Answer 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="answer3">
                                            <label class="form-label">Answer 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="answer4">
                                            <label class="form-label">Answer 4</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <div class="demo-radio-button pull-right">

                                                <input name="right_answer" value="1" type="radio" class="with-gap radio-col-light-green" id="radio_1" checked/>
                                                <label for="radio_1">Answer 1</label>
                                                <input name="right_answer" value="2" type="radio" id="radio_2" class="with-gap radio-col-light-green" />
                                                <label for="radio_2">Answer 2</label>
                                                <input name="right_answer" value="3" type="radio" class="with-gap radio-col-light-green" id="radio_3" />
                                                <label for="radio_3">Answer 3</label>
                                                <input name="right_answer" value="4" type="radio" id="radio_4" class="with-gap radio-col-light-green" />
                                                <label for="radio_4">Answer 4</label>

                                            </div>

                                            <label class="form-label">Right Answer</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ session()->get('current_lesson') }}" name="lessonID">
                             
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <button type="submit" class="btn btn-primary btn-block btn-lg m-l-15 pull-right waves-effect">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- # Dispaly error messages .... --}}

                    @if (session()->get('Message') !== null)
                        <div class="alert alert-info">
                            {{ session()->get('Message') }}
                        </div>

                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>



@include('shared.footer')