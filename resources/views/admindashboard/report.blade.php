
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laundry Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ asset('reports/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('reports/assets/css/bootstrap-theme.min.css') }}">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="{{ asset('reports/assets/css/font-awesome.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('reports/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('reports/dist/css/skins/_all-skins.min.css') }}">

  <link href="{{ asset('reports/assets/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="home.php" class="logo">
                <span class="logo-mini"><b>L</b>F</span>
                <span class="logo-lg"><b>LF</b>LAUNDRY</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                @include('admindashboard.navigation')
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <small>Welcome Administrator!</small>
                </h1>
            </section>

            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        Daily Sales:
                        <input id="dailySale" type="date" class="btn btn-default btn-sm" value="<?= date('Y-m-d'); ?>">

                        <div id="printBut" class="pull-right">
                            <button id="print-button" type="button" class="btn btn-success btn-sm" onclick="printPage()">
                                PRINT
                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                        </div>

                        <div id="table-sales">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Total Cost</th>
                                        <th class="text-center">Date Added</th>
                                        <th class="text-center">Status</th>
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
                                        </tr>
                                        @endforeach
                                    @else
                                        <td class="text-center" colspan="8">No Orders available.</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer">
                        <!-- Footer -->
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ asset('reports/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('reports/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('reports/dist/js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('reports/assets/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('reports/assets/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('reports/assets/js/admin.js') }}"></script>

    <script>
        function printPage() {
            var printContents = document.getElementById('table-sales').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = '<h1 class="text-center mb-3">LFLaundry</h1>' + printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>