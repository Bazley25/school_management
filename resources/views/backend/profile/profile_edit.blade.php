@extends('admin/master/admin_master')
@section('admin_main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
                       <form action="{{ route('profile/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">

                           <div class="col-md-6">						
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="name" class="form-control" required="" value="{{ $editdata->name }}">
                                </div>
                                </div>
                               
                            </div>
                            {{-- end col md 6 --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>User Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="user_name" class="form-control" required="" value="{{ $editdata->user_name }}">
                                    </div>
                                </div>
                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="email" class="form-control" required="" value="{{ $editdata->email }}">
                                </div>
                                </div>
                            </div>

                           {{-- end col md 6 --}}
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Mobile <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="mobile" class="form-control" required="" value="{{ $editdata->mobile }}">
                                </div>
                            </div>
                            </div>
                            
                           {{-- end col md 6 --}}
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="address" class="form-control" required="" value="{{ $editdata->address }}">
                                </div>
                            </div>
                            </div>
                            {{-- end col md 6 --}}
                           {{-- end col md 6 --}}
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Select Gender <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="gender" required="" class="form-control" >
                                        <option value="" selected="" disabled>Select One</option>
                                        <option value="Male"  {{ ($editdata->gender == "Male" ? "Selected": "") }}>Male</option>
                                        <option value="Female" {{ ($editdata->gender == "Female" ? "Selected": "") }}>Female</option>
                                    </select>
                                <div class="help-block"></div></div>
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
                           </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>User Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file" name="image" class="form-control" required="" id="image"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                    <div class="controls">
                                     <img id="Showimage" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" style="width: 100px; height:100px;border:1px solid rgb(225, 17, 17);" alt="profile Image">
                                    </div>
                                </div>
                           </div>
                            {{-- end col md 6 --}}
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
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
           $('#Showimage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection