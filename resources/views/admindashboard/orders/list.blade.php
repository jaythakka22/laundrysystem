@extends('admindashboard.layout')
@section('content')
 <!-- Right side column. Contains the navbar and content of the page -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        @if (session()->has('status'))
          <div class="alert alert-success">{{ session()->get('status') }}</div>
        @endif  
          <h1>
            Orders
            <small>Users Orders</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Orders</a></li>
            <li class="active">OrdersList</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
              
                <div class="box-header">
                  <h3 class="box-title">Orders </h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
              
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">Customer Name</th>
                      <th class="text-center">Total Cost</th>
                      <th class="text-center">Date Added</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if ($orders && count($orders) > 0)
                      @foreach($orders as $order)
                      <tr>
        
                        <td class="text-center">{{ $order->user->name }} </td>
                        <td class="text-center"> {{ $order->total_cost}}</td>
                        <td class="text-center"> {{ $order->created_at->diffForHumans() }}</td>
                        <th class="text-center">{{ $order->status}}</th>
                        <td class="text-center">
                          <a href="{{ url('/vieworder', $order->id)}}" class="btn btn-primary">View</a>
                          <a class="btn btn-danger delete-testimonial-btn" data-toggle="modal" data-target="#deleteTestimonial" data-id="{{ $order->id }}">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <td  class="text-center"colspan="8">No Orders available.</td>
                    @endif
                  </tbody>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="modal fade" id="deleteTestimonial" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteFarmCategoryModalLabel">Confirm Deletion</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this testimonial?
            </div>
            <div class="modal-footer d-flex justify-content-between">
              @if ($orders && count($orders) > 0)
                <form action="" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" id="testimonialId" value="">
                  <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              @else
                <p>No Testimonial available, so the form is disabled.</p>
              @endif
            </div>

          </div>
        </div>
      </div>


    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

  
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
      $(document).ready(function() {
        $('.delete-testimonial-btn').click(function() {
            var testimonialId = $(this).data('id');
            $('#testimonialId').val(testimonialId);
        });
    });

    </script>

@endsection