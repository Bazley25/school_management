@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">

          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Search</strong></h4>
              </div>
    
              <div class="box-body">
              
                <form action="{{ route('student/year/class/data') }}" method="get">
                  {{--  Row Start --}}
                  <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <h5> Year <span class="text-danger"></span></h5>
                          <div class="controls">
                              <select name="year_id" id="class_id" required="" class="form-control">
                                  <option value="" selected="" disabled>Select Year</option>
                                  @foreach ($years as $year)
                                  <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "Selected" :"" }}>{{ $year->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <h5> Class <span class="text-danger"></span></h5>
                          <div class="controls">
                              <select name="class_id" id="class_id" required="" class="form-control">
                                  <option value="" selected="" disabled>Select Year</option>
                                  @foreach ($classes as $class)
                                  <option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "Selected" :"" }}>{{ $class->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                      <div class="col-md-4" style="padding-top: 25px;">
                        
                        <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                      </div>
              {{--  Row end --}}
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-12">
           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Student List</h3>
                <a href="{{ route('regi/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">

                    @if (!@$search)
                        
                   
                        
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if(Auth::user()->role == "Admin")
                              <th>Code</th> 
                              @endif
                              <th width="27%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllData as $key => $data)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data['student_info']['name'] }}</td>
                            <td>{{ $data['student_info']['id_no'] }}</td>
                            <td>{{ $data->roll }} </td>
                            <td>{{ $data['student_year_info']['name'] }}</td>
                            <td>{{ $data['student_class_info']['name'] }}</td>
                            <td>
                              <img  src="{{ (!empty($data['student_info']['image']))? url('upload/student_images/'.$data['student_info']['image']):url('upload/no_image.jpg') }}" style="width: 60px; height:60px; ttext-align:center" alt="profile Image"></td>
                            <td>{{ $data['student_info']['code'] }}</td>
                            <td>
                                <a href="{{ route('regi/edit',$data->student_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('student/promotion',$data->student_id) }}" class="btn btn-primary">Promotion</a>
                                {{-- <a href="" class="btn btn-danger" >Delete</a> --}}
                                <a href="{{ route('student/details',$data->student_id) }}" class="btn btn-info" target="_blank" >Details</a>
                            </td>
                        </tr> student_id
                          @endforeach
                        </tbody>
                    </table>
  
                    @else
                        
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Roll</th>
                              <th>Year</th>
                              <th>Class</th>
                              <th>Image</th>
                              @if(Auth::user()->role == "Admin")
                              <th>Code</th> 
                              @endif
                              <th width="27%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($AllData as $key => $data)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data['student_info']['name'] }}</td>
                            <td>{{ $data['student_info']['id_no'] }}</td>
                            <td> {{ $data->roll }}</td>
                            <td>{{ $data['student_year_info']['name'] }}</td>
                            <td>{{ $data['student_class_info']['name'] }}</td>
                            <td>
                              <img  src="{{ (!empty($data['student_info']['image']))? url('upload/student_images/'.$data['student_info']['image']):url('upload/no_image.jpg') }}" style="width: 60px; height:60px; ttext-align:center" alt="profile Image"></td>
                            <td>{{ $data['student_info']['code'] }}</td>
                            <td>
                                <a href="{{ route('regi/edit',$data->student_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('student/promotion',$data->student_id) }}" class="btn btn-primary">Promotion</a>
                                {{-- <a href="" class="btn btn-danger" >Delete</a> --}}
                                <a href="" class="btn btn-info" target="_blank" >Details</a>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                    
                    @endif

                  </div>
              </div>
            </div> 
          </div>
        </div>
      </section>
    </div>
</div>
@endsection