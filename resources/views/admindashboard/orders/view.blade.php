@extends('admindashboard.layout')
@section('content')
      <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      @if (session()->has('status'))
      <div class="alert alert-success">{{ session()->get('status') }}</div>
      @endif  
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Orders
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Orders</a></li>
            <li class="active">Update Order</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <form role="form text-left" method="post" action="{{ route('orders.update', ['id' => $order->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Order Details </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Customer Name</label>
                      <input type="text" name="name" class="form-control" id="title" value="{{ $order->user->name }}" placeholder="Service Name" required disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Total Cost</label>
                      <input type="number" name="cost" class="form-control" id="title" value="{{ $order->total_cost}}" placeholder="Cost Ksh" required disabled>
                    </div>
                
                   
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Order Status</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="Pending">Pending</option>
                            <option value="Received">Received</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                        </select>
                      </div>              
                    </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>

        <!-- Container for additional sections -->
        <div id="additionalSections"></div>
          <div class="box-footer">
          <button type="button" class="btn btn-success addSubsection">Add Order</button>
            <button type="submit" class="btn btn-primary pull-right">Update Order</button>
          </div>
        </form>       
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    

     



@endsection