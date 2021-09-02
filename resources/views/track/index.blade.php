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
                        <h2>
                            All tracks
                        </h2>

                    </div>
                </div>
                @if (!isset($data))

                    <p>there are no tracks available</p>

                @else
                    @foreach ($data as $key => $value)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card">
                                <div class="header bg-green">
                                    <h2>
                                        {{ $value->title }}
                                    </h2>
                                </div>
                                <div class="body align-right">
                                    <a href='{{ url('/Lesson/' . $value->ID) }}'
                                        class=' btn btn-warning m-r-1em '>Show</a>
                                    <a href=' {{ url('/Track/' . $value->ID . '/edit') }}'
                                        class='btn btn-primary m-r-1em'>Edit</a>

                                    <a href='' data-toggle="modal" data-target="#modal_single_del{{ $key }}"
                                        class='btn btn-danger m-r-1em'>Delete</a>


                                </div>
                            </div>
                        </div>

                        <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1"
                            role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">delete confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Delete {{ $value->name }} !!!!
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ url('/Track/' . $value->ID) }}" method="post">

                                            @method('delete') {{-- <input type="hidden" value="delete" name="_method"> --}}
                                            @csrf {{-- <input type="hidden" value="{{ csrf_tokken() }}" name="_token"> --}}

                                            <input type="hidden" value="{{ $value->ID }}" name="id">

                                            <div class="not-empty-record">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $data->links('pagination.default') }}

                @endif

            </div>
        </div>




    </div>
    <!-- #END# Inline Layout | With Floating Label -->

    </div>
</section>



@include('shared.footer')
