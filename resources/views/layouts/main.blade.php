<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- head content -->
    <title>Employee CRUD</title>
    {{-- import for enabling bootstrap modal --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    {{-- import for bootstrap css theme --}}
    <link rel="stylesheet" href="https://bootswatch.com/5/zephyr/bootstrap.min.css">
    
    {{-- import for datatables css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"/>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
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

                {{-- <div class="col-2 border-red">
                    @include('components.sidebar')
                </div> --}}

                <div class="col border-red">
                    @yield('content')
                </div>

                @include('employees.addEmployeeModal')
                @include('employees.editEmployeeModal')

            </div>
        </div>
    </div>
</body>