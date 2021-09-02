@include('shared.header')
@include('shared.nav')
@include('shared.sidNav')
<section class="content">
    <div class="container-fluid">

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                <h3>All Users</h3>
            </div>
            <div class="card-body">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ session()->get('name') }}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           
                            @foreach ( $data as $key => $value ) 

                                <tr>
                                    <td>{{ ++$key }} </td>
                                    <td>{{ $value->Fname }} {{ $value->Lname }}</td>
                                    <td>{{ $value->email}}</td>
                                    <td>{{ $value->title }}</td>

                                    <td>
                                        <a href='' data-toggle="modal" data-target="#modal_single_del{{ $key }}"  class='btn btn-danger m-r-1em'>Delete</a>
                 <a href='{{ url('/edit/'.$value->ID) }}' class='btn btn-primary m-r-1em'>Change Role</a>           
                                    </td>

                                </tr>

                                <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">delete confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
                   </button>
                    </div>
        
                    <div class="modal-body">
                            Delete  {{ $value->Fname }} {{ $value->Lname }} !!!!
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('User/'.$value->ID) }}" method="post">
                         
                            @method('delete') {{-- <input type="hidden" value="delete" name="_method"> --}}               
                            @csrf    {{-- <input type="hidden" value="{{ csrf_tokken() }}" name="_token"> --}}  
                          
                            <input type="hidden" value="{{ $value->ID }}" name="id">

                            <div class="not-empty-record">
                                <button type="submit" class="btn btn-primary">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
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
