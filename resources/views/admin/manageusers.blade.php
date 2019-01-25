@extends('admin\layout.app')



@section('title')
        <title>Manage Students</title>
@endsection


@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Manage Students</li>
@endsection

@section('content')


    <div class="row">
    <div class="col-12">
        @if(session('info'))
                    <div class='alert alert-success'>
                      <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success! </strong> {{session('info')}}
                    </div>
                      
                    @endif

                    <style>
                      .alert{
                      color: #fff !important;
                      padding: 10px !important;
                    }
                    
                    </style>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Fullname</th>
                                <th>UserName</th>
                                <th>Email</th>
                             
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                          @foreach(\App\User::where('adminlevel', '=', 0)->get()  as $key => $users)
                            <tr>
                                <td>{{$users->id}}</td>
                                <td>{{$users->firstname}} {{$users->lastname}}</td>
                                <td>{{$users->username}}</td>
                                <td>{{$users->email}}</td>            
                                <td> 
                                       <form action="{{ route('deleteUser', array($users->id))}}" method="post">
                                      {{ csrf_field() }}
                                     
                                      <button class="btn btn-danger" type="submit" onclick="prompt('Are you sure you want to delete  {{$users->username}}');">&times;</button></td>
                                  </form>
                                </td>
                           
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('scripts')
 <script src="/js/lib/datatables/datatables.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="/js/lib/datatables/datatables-init.js"></script>
@endsection
