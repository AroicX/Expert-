@extends('admin\layout.app')

@section('title')
	<title>Home</title>
@endsection

@section('this')
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
@endsection

 
@section('content')
    <div class="row">
          <div class="col-md-3">
                <div class="card bg-primary p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-user f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">
                              @if(count(\App\User::all()) > 0)
                                {{count(\App\User::where('adminlevel', 0)->get())}}
                              @endif
                            </h2>
                            <p class="m-b-0">Students</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-pink p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-book f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">
                              @if(count(\App\Book::all()) > 0)
                                {{count(\App\Book::all())}}
                              @endif
                            </h2>
                            <p class="m-b-0">Books</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success p-20">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-table f-s-40"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2 class="color-white">
                              @if(count(\App\Category::all()) > 0)
                                {{count(\App\Category::all())}}
                              @endif
                            </h2>
                            <p class="m-b-0">Categories </p>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-md-3">
              <div class="card bg-danger p-20">
                  <div class="media widget-ten">
                      <div class="media-left meida media-middle">
                          <span><i class="ti-location-pin f-s-40"></i></span>
                      </div>
                      <div class="media-body media-text-right">
                          <h2 class="color-white">0</h2>
                          <p class="m-b-0">Total CGPA</p>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="year-calendar"></div>
                    </div>
                  </div>
                </div>

                            <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Recent Activities</h4>
                                                <div class="card-content">
                                                    <div class="todo-list">
                                                        <div class="tdl-holder">
                                                            <div class="tdl-content">
                                                                <ul>
                                                                    <li>
                                                                        <label>
                                              <input type="checkbox"><i class="bg-primary"></i><span>No Recent Activities</span>
                                              <a href='#' class="ti-close"></a>
                                            </label>
                                                                    </li>
                                                 
                                                                </ul>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

      </div>
    </div>   
@endsection




@section('scripts')
<script src="/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="/js/lib/calendar-2/pignose.init.js"></script>
@endsection