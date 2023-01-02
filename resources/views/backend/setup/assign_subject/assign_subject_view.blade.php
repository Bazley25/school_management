@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Subject List</h3>
                <a href="{{ route('assign/subject/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Class Name</th>
                              <th width="25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($assign_data as $key => $assign_all)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $assign_all['classtosubject']['name'] }}</td>
                            <td>
                              <a href="{{ route('assign/subject/details',$assign_all->class_id) }}" class="btn btn-primary" >Details</a>
                                <a href="{{ route('assign/subject/edit',$assign_all->class_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('assign/subject/delete',$assign_all->class_id) }}" class="btn btn-danger" id="userdelete">Delete</a>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>
            </div> 
          </div>
        </div>
      </section>
    </div>
</div>
@endsection