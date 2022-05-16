<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5, shrink-to-fit=no">
    <title>Brekete Family Taxi</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/gif" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<style>
    body{
  background: #e5e5e5 !important;
    }
    /* table */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #858796;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #e3e6f0;
    }

    .table tbody+tbody {
        border-top: 2px solid #e3e6f0;
    }

    .table-sm th,
    .table-sm td {
        padding: 0.3rem;
    }

    .table-bordered {
        border: 1px solid #e3e6f0;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #e3e6f0;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody+tbody {
        border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        color: #858796;
        background-color: rgba(0, 0, 0, 0.075);
    }
    input, select, textarea{
        background: rgba(128, 128, 128, 0.11) !important;
        /* border: none !important; */
    }
    input:focus{
        box-shadow: none !important;
    }
    select:focus{
        box-shadow: none !important;
    }
</style>
<script>
    (function() {
        window.Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    })();
</script>

<body id="page-top">
    <div id="app">
        <main-component></main-component>
    </div>
</body>

</html>

<!--   Core JS Files   -->
{{-- <script src="../assets/js/core/popper.min.js"></script> --}}
{{-- <script src="../assets/js/core/bootstrap.min.js"></script> --}}

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Custom scripts for all pages-->
{{-- <script src="{{asset('vendor/js/sb-admin-2.min.js')}}"></script> --}}

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('vendor/datatables-demo.js') }}"></script>

<script src="{{ mix('js/app.js') }}"></script>
