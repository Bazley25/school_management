@extends('admin/master/admin_master')
@section('admin_main_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit Assign Subject</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('assign/subject/update',$edit_assign_subject['0']->class_id) }}" method="POST">
                        @csrf
                         <div class="row">

                                <div class="col-md-12">
                                  <div class="add_item">

                                  <div class="form-group">
                                    <h5> Class name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="class_id" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Class</option>
                                            
                                            @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" {{ ($edit_assign_subject['0']->class_id == $class->id)? "selected": "" }}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    <div class="help-block"></div></div>
                                </div>

                                @foreach ($edit_assign_subject as $assign_subject)
                                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <h5> Student's Subject <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                          <select name="subject_id[]" id="subject_id" required="" class="form-control">
                                              <option value="" selected="" disabled>Select  Subject</option>
                                              
                                              @foreach ($add_subject as $subject)
                                              <option value="{{ $subject->id }}" {{ ($assign_subject->subject_id == $subject->id)? "selected": "" }}>{{ $subject->name }}</option>
                                              @endforeach
                                          </select>
                                      <div class="help-block"></div></div>
                                  </div>
                                  </div>

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <h5>Full Mark <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                      <input type="text" name="full_mark[]" class="form-control" value="{{ $assign_subject->full_mark }}" >
                                      <span> @error('full_mark')
                                          {{ $message }}
                                      @enderror </span>
                                      </div>
                                  </div>
                                  </div>

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <h5>Pass Mark <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                      <input type="text" name="pass_mark[]" class="form-control"  value="{{ $assign_subject->pass_mark }}">
                                      <span> @error('pass_mark')
                                          {{ $message }}
                                      @enderror </span>
                                      </div>
                                  </div>
                                  </div>

                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <h5>Subjective Mark <span class="text-danger">*</span></h5>
                                      <div class="controls">
                                      <input type="text" name="subjective_mark[]" class="form-control" value="{{ $assign_subject->subjective_mark }}" >
                                      <span> @error('subjective_mark')
                                          {{ $message }}
                                      @enderror </span>
                                      </div>
                                  </div>
                                  </div>
                                  <div class="col-md-2 pt-25">
                                    <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
                                    <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
                                  </div>
                                </div>
                            
                            </div>
                            @endforeach
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

<div style="visibility: hidden">
<div class="whole_extra_item_add" id="whole_extra_item_add">
  <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
    <div class="form-row">
    
      <div class="col-md-4">
        <div class="form-group">
          <h5> Student's Subject <span class="text-danger">*</span></h5>
          <div class="controls">
              <select name="subject_id[]" id="subject_id" required="" class="form-control">
                  <option value="" selected="" disabled>Select  Subject</option>
                  
                  @foreach ($add_subject as $subject)
                  <option value="{{ $subject->id }}" {{ ($assign_subject->subject_id == $subject->id)? "selected": "" }}>{{ $subject->name }}</option>
                  @endforeach
              </select>
          <div class="help-block"></div></div>
      </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <h5>Full Mark <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="full_mark[]" class="form-control" value="{{ $assign_subject->full_mark }}" >
          <span> @error('full_mark')
              {{ $message }}
          @enderror </span>
          </div>
      </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <h5>Pass Mark <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="pass_mark[]" class="form-control"  value="{{ $assign_subject->pass_mark }}">
          <span> @error('pass_mark')
              {{ $message }}
          @enderror </span>
          </div>
      </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <h5>Subjective Mark <span class="text-danger">*</span></h5>
          <div class="controls">
          <input type="text" name="subjective_mark[]" class="form-control" value="{{ $assign_subject->subjective_mark }}" >
          <span> @error('subjective_mark')
              {{ $message }}
          @enderror </span>
          </div>
      </div>
      </div>
      <div class="col-md-2 pt-25">
        <span class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> </span>
        <span class="btn btn-danger removeeventmore"> <i class="fa fa-minus-circle"></i> </span>
      </div>
    
    </div>
    </div>
</div>
</div>

<script type="text/javascript">
$(document). ready(function(){
  var counter = 0;
  $(document). on("click", ".addeventmore", function(){
    var whole_extra_item_add = $('#whole_extra_item_add').html();
    $(this).closest(".add_item").append(whole_extra_item_add);
    counter++;
  });
  $(document).on("click",'.removeeventmore', function(){
    $(this).closest(".delete_whole_extra_item_add").remove();
    counter -= 1;
  });
});
</script>
@endsection