@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Exam Type</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('exam/type/store') }}" method="POST">
                        @csrf
                         <div class="row">

                                <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Add Exam Type <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="name" class="form-control"  >
                                    <span> @error('name')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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