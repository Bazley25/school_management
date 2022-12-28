@extends('admin/master/admin_master')
@section('admin_main_content')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Update Password</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('password/update') }}" method="POST" >
                        @csrf
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input id="current_password" type="password" name="oldpassword" class="form-control"  autocomplete="current-password">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="password" name="password" class="form-control"  autocomplete="password"> 
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  autocomplete="password_confirmation"> 
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                           </div> 
                           <div class="col-md-12">
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info" value="Update">
                           </div>
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