@extends('admin/master/admin_master')
@section('admin_main_content')


<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Update Student Class</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('student/class/update',$class_edit->id) }}" method="POST">
                        @csrf
                         <div class="row">
                           

                            <div class="col-md-6">
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="name" class="form-control" required="" value="{{ $class_edit->name }}">
                                <span> @error('name')
                                    {{ $message }}
                                @enderror </span>
                                </div>
                            </div>
                            </div>

                          
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