@extends('admin/master/admin_master')
@section('admin_main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Add Student Info</h4>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{ route('regi/update',$dataEdit->student_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $dataEdit->id }}">
                         {{-- main Row start --}}
                        <div class="row">
                        <div class="col-md-12">

                        {{-- 1st Row start --}}
                          <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5> Student Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="name" class="form-control" required="" value="{{ $dataEdit['student_info']['name'] }}">
                                    <span> @error('name')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Father's Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="fname" class="form-control" required="" value="{{ $dataEdit['student_info']['fname'] }}">
                                    <span> @error('fname')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Mother's Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="mname" class="form-control" required="" value="{{ $dataEdit['student_info']['mname'] }}">
                                    <span> @error('mname')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 1st  Row end --}}

                        {{-- Second Row Start --}}
                          <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5> Mobile <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="mobile" class="form-control" required="" value="{{ $dataEdit['student_info']['mobile'] }}">
                                    <span> @error('name')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="address" class="form-control" required="" value="{{ $dataEdit['student_info']['address'] }}">
                                    <span> @error('fname')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Gender <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="gender" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Gender</option>
                                            <option value="Male" {{ ($dataEdit['student_info']['gender'] == 'Male')? 'Selected': ''  }}>Male</option>
                                            <option value="Female" {{ ($dataEdit['student_info']['gender'] == 'Female')? 'Selected': ''  }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Second Row end --}}

                        {{-- 3rd Row Start --}}
                          <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5> Date Of Birth <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="dob" class="form-control" required="" value="{{ $dataEdit['student_info']['dob'] }}">
                                    <span> @error('dob')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Discount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="discount" class="form-control" required="" value="{{ $dataEdit['student_discount']['discount'] }}">
                                    <span> @error('fname')
                                        {{ $message }}
                                    @enderror </span>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Religion <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="religion" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Religion</option>
                                            <option value="Hindu" {{ ($dataEdit['student_info']['religion'] == 'Hindu')? 'Selected': ''  }}>Hindu</option>
                                            <option value="Christan" {{ ($dataEdit['student_info']['religion'] == 'Christan')? 'Selected': ''  }}>Christan</option>
                                            <option value="Muslim" {{ ($dataEdit['student_info']['religion'] == 'Muslim')? 'Selected': ''  }}>Muslim</option>
                                            <option value="Buddhist" {{ ($dataEdit['student_info']['religion'] == 'Buddhist')? 'Selected': ''  }}>Buddhist</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 3rd Row end --}}
                        {{-- 4th Row Start --}}
                          <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Year <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="year_id" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Year</option>
                                            @foreach ($years as $year)
                                            <option value="{{ $year->id }}" {{ ($dataEdit->year_id == $year->id)? 'Selected': ''  }} >{{ $year->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Class <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="class_id" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Class</option>
                                            @foreach ($classes as $class)
                                            <option value="{{ $class->id }}" {{ ($dataEdit->class_id == $class->id)? 'Selected': ''  }} >{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Group <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="group_id" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Group</option>
                                            @foreach ($groups as $group)
                                            <option value="{{ $group->id }}" {{ ($dataEdit->group_id == $group->id)? 'Selected': ''  }} >{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- 4th Row end --}}
                        {{-- 5th Row Start --}}
                          <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Shift <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="shift_id" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Shift</option>
                                            @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}" {{ ($dataEdit->shift_id == $shift->id)? 'Selected': ''  }} >{{ $shift->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <h5>Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file" name="image" class="form-control-file" required="" id="image"> 
                                    </div>
                                </div>
                                </div>
                                {{-- image view --}}
                                <div class="col-md-4">
                                <div class="form-group">
                                  <div class="controls">
                                   <img id="Showimage" src="{{ (!empty($dataEdit['student_info']['image']))? url('upload/student_images/'.$dataEdit['student_info']['image']):url('upload/no_image.jpg') }}" style="width: 100px; height:100px;border:1px solid rgb(225, 17, 17);" alt="profile Image">
                                  </div>
                              </div>
                            </div>
                                {{-- <div class="col-md-4">
                                  <div class="form-group">
                                    <h5> Group <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="religion" id="class_id" required="" class="form-control">
                                            <option value="" selected="" disabled>Select Year</option>
                                            @foreach ($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- 5th Row end --}}
                        </div>
                        </div>
                        {{-- main Row end --}}
                       
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