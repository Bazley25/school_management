@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Exam Type List</h3>
                <a href="{{ route('exam/type/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Exam Type</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Exam Type</th>
                              <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($all_exam as $key => $exam_type)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $exam_type->name }}</td>
                            <td>
                                <a href="{{ route('exam/type/edit',$exam_type->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('exam/type/delete',$exam_type->id) }}" class="btn btn-danger" id="userdelete">Delete</a>
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