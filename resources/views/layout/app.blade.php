<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>


        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>

    <body id="page-top">

        <div id="wrapper">
            @include('layout.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('layout.navbar')
                    <div class="container-fluid">             
                        <div class="row">
                            @yield('content')                       
                        </div>
                    </div>             
                </div>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    @include('sweetalert::alert')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script>
        function DeleteItem(id) {
            fetch('hapus/'+id, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                    },
                    body: JSON.stringify({
                        id_barang: id,
                    })
                })
                .then(response => response.json())
                .then(data => {
                    location.reload();
                    console.log('Booking status updated successfully:', data.message);
                })
                .catch(error => {
                    console.error('Failed to update booking status:', error);
                });
            };
    
    
            function popupSwal(id){
            Swal.fire({
              title: "Apakah anda yakin?",
              text: "Data akan di hapus permanent",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Ya"
            }).then((result) => {
              if (result.isConfirmed) {
                
                DeleteItem(id);
                location.reload();
              }
            });
        }
    </script>
    </body>
</html>