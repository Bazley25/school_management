@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit User</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('user/update',$edit_datas->id) }}" method="POST">
                        @csrf
                         <div class="row">
                           <div class="col-md-6">						
                            <div class="form-group">
                                <h5>Select Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="usertype" id="usertype" required="" class="form-control" >
                                        <option value="" selected="" disabled>Select Role</option>
                                        <option value="Admin"  {{ ($edit_datas->usertype == "Admin" ? "Selected": "") }}>Admin</option>
                                        <option value="User" {{ ($edit_datas->usertype == "User" ? "Selected": "") }}>User</option>
                                    </select>
                                <div class="help-block"></div></div>
                            </div>
                               
                            </div>
                            {{-- end col md 6 --}}
                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="user_name" class="form-control" required="" value="{{ $edit_datas->user_name }}">
                                    </div>
                                </div>
                                
                            
                           </div>
                           <div class="col-md-6">
                           <div class="form-group">
                            <h5>Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="name" class="form-control" required="" value="{{ $edit_datas->name }}">
                            </div>
                        </div>
                    </div>

                           {{-- end col md 6 --}}
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="email" name="email" class="form-control" required="" value="{{ $edit_datas->email }}">
                                </div>
                            </div>
                            </div>
                            {{-- end col md 6 --}}
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <h5>User Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="password" name="password" class="form-control" required="" > 
                                    </div>
                                </div>
                           </div>
                           end col md 6 --}}
                         </div>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info" value="Update">
                           </div>
                       </form>
                   </div>
                 </div>
               </div>
             </div>
           </section>
    </div>
</div>
@endsection