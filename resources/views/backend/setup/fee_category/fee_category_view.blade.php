@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Fee Category List</h3>
                <a href="{{ route('fee/category/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Category</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Fee Category Name</th>
                              <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($category_data as $key => $data)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <a href="{{ route('fee/category/edit',$data->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('fee/category/delete',$data->id) }}" class="btn btn-danger" id="userdelete">Delete</a>
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