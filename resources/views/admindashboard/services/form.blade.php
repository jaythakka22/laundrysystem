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
           Services
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Services</a></li>
            <li class="active">Add Service</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <form role="form text-left" method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Services Details </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="title" placeholder="Service Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cost</label>
                      <input type="number" name="cost" class="form-control" id="title" placeholder="Cost Ksh" required>
                    </div>
                    <div class="form-group">
                      <label for="icon">Image</label>
                      <input name="image" type="file" id="exampleInputFile"  accept="image/jpeg, image/png, image/jpg" required>

                      <p class="help-block">Please select a png image for the display.</p>
                    </div>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Additional Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            <option value="Pesticides">Bags</option>
                            <option value="Fertilizers">Jackets</option>
                            <option value="Machinery">Shoes</option>
                            <option value="Livesctock Feed">Shirts</option>
                            <option value="Energy Sources">Tshirts</option>
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
          <button type="button" class="btn btn-success addSubsection">Add Service</button>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </form>       
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    

     



@endsection