@extends('admin/master/admin_master')
@section('admin_main_content')

<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
        <div class="row">
           
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Details Fee Amount </h3>
                <a href="{{ route('fee/amount/add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4> <strong>Fee Category : </strong>{{ $detailsamount['0']['fee_category']['name'] }} </h4>
                  <div class="table-responsive">
                    <table  class="table table-bordered table-striped">
                      <thead class="thead-light">
                          <tr>
                              <th width="5%">SL</th>
                              <th>Class Name</th>
                              <th width="20%">Amount</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($detailsamount as $key => $details)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $details['amount_deatils']['name'] }}</td>
                            <td> {{ $details->amount }}</td>
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