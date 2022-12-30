@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Fee Amount</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('fee/category/store') }}" method="POST">
                        @csrf
                         <div class="row">

                                <div class="col-md-12">

                                  <div class="form-group">
                                    <h5> Fee Category <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="fee_category_id" id="fee_category_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Fee Category</option>
                                            
                                            @foreach ($fee_categories as $fee_category)
                                            <option value="{{ $fee_category->id }}">{{ $fee_category->name }}</option>
                                            @endforeach
                                        </select>
                                    <div class="help-block"></div></div>
                                </div>

                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <h5> Student Class <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="class_id[]" id="class_id" required="" class="form-control">
                                              <option value="" selected="" disabled>Select Student Class</option>
                                              
                                              @foreach ($classes as $class)
                                              <option value="{{ $class->id }}">{{ $class->name }}</option>
                                              @endforeach
                                          </select>
                                      <div class="help-block"></div></div>
                                  </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <h5>Amount <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                      <input type="text" name="amount[]" class="form-control"  >
                                      <span> @error('name')
                                          {{ $message }}
                                      @enderror </span>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-2 pt-25">
                                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
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