@extends('admin/master/admin_master')
@section('admin_main_content')
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">User List</h3>
                <a href="" style="float: right;" class="btn btn-rounded btn-success mb-5">Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allUser as $key => $user)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="btn btn-info">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
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