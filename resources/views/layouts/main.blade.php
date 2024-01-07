<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- head content -->
    <title>Employee CRUD</title>
<!-- 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://bootswatch.com/5/zephyr/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
    
    <style>
        .border-red {
            /* border: 1px solid red; */
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container-fluid p-3 border-red">
            <div class="row flex-nowrap">

                <div class="col-2 border-red">
                    @include('components.sidebar')
                </div>

                <div class="col border-red">
                    @yield('content')
                </div>

                <!-- <div class="col">
                    @include('employees.addEmployeeModal')
                </div> -->

            </div>
        </div>
    </div>
</body>