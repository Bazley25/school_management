@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Details Assign Subject </h3>
                <a href="{{ route('assign/subject/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4> <strong>Assign Subject : </strong>{{ $detailsuject['0']['classtosubject']['name'] }} </h4>
                  <div class="table-responsive">
                    <table  class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                              <th width="20%">Subject Name</th>
                              <th width="20%">Full Mark</th>
                              <th width="20%">Pass Mark</th>
                              <th width="20%">Sujective Mark</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($detailsuject as $key => $details)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $details['subject_to_assignsubject']['name'] }}</td>
                            <td> {{ $details->full_mark }}</td>
                            <td> {{ $details->pass_mark }}</td>
                            <td> {{ $details->subjective_mark }}</td>
                            
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