@include('shared.header')
@include('shared.nav')
@include('shared.sidNav')
<section class="content">
    <div class="container-fluid">

        @if (session()->get('Message') !== null)
            <div class="alert alert-info">
                {{ session()->get('Message') }}
            </div>
        @endif
        <!-- Inline Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="p-b-15">
                            {{$lesson[0]->title}}

                            @if (session()->get('user')->roleID == 2)
                                <a href='{{ url('/Exam/create') }}'
                                    class='btn btn-warning m-r-1em waves-effect pull-right'>
                                    <i class="material-icons">add_box</i>
                                    <span>Add Question</span>
                                </a>
                                <a href='{{ url('/Upload_video') }}'
                                    class='btn btn-info m-r-1em waves-effect pull-right'>
                                    <i class="material-icons">add_box</i>
                                    <span>Upload Video </span>
                                </a>
                                <a href='{{ url('/videos') }}' class='btn btn-brown m-r-1em waves-effect pull-right'>
                                    <i class="material-icons">add_box</i>
                                    <span>Record video</span>
                                </a>
                            @endif


                        </h2>

                    </div>
                </div>
                @if ($video !== null)
                    <div class="col-md-12 align-center" id="recorded">
                        <h3>Video</h3>
                        <video id="recording" width="600px" height="400px" controls>
                            <source src="{{ asset('storage/videos/' . $video->file_name) }}" type="video/webm">
                        </video>
                    </div>
                @endif
                <br>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div>
                    <h3>Exam</h3>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer 1</th>
                                        <th>Answer 2</th>
                                        <th>Answer 3</th>
                                        <th>Answer 4</th>
                                        <th>Right answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($questions_data as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->question }}</td>
                                            <td>{{ $value->answer1 }}</td>
                                            <td>{{ $value->answer2 }}</td>
                                            <td>{{ $value->answer3 }}</td>
                                            <td>{{ $value->answer4 }}</td>
                                            <td>{{ $value->right_answer }}</td>

                                            <td>
                                                <a href='' data-toggle="modal"
                                                    data-target="#modal_single_del{{ $key }}"
                                                    class='btn btn-danger m-r-1em'>Delete</a>
                                                <a href='{{ url('Exam/edit/' . $value->id) }}'
                                                    class='btn btn-primary m-r-1em'>Edit</a>
                                            </td>

                                        </tr>
                                        <div class="modal" id="modal_single_del{{ $key }}"
                                            tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">delete confirmation</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        Delete {{ $value->name }} !!!!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ url('/destroy') }}" method="post">

                                                            @method('delete') {{-- <input type="hidden" value="delete" name="_method"> --}}
                                                            @csrf {{-- <input type="hidden" value="{{ csrf_tokken() }}" name="_token"> --}}

                                                            <input type="hidden" value="{{ $value->id }}" name="id">

                                                            <div class="not-empty-record">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Delete</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
</section>



@include('shared.footer')
