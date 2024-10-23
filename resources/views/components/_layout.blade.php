<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="base-url" content="{{ config('app.url') }}">

  <title>MeetSpace - {{ $title }}</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet" />
  {{-- <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet" /> --}}
  <link href="{{ asset('assets/libs/swal/sweetalert2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('custom/css/spinner.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="{{ asset('assets/favicon_packages/favicon.ico') }}">
  <!-- Font Awesome 5 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css" />

  <!-- FullCalendar CSS -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />

  {{-- CK Editor 5 --}}
  <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css" />
  


  <style>
    .notify {
      z-index: 99999;
    }

    .select2-container--default .select2-selection--multiple {
      margin: 10px;
    }

    .select2-container .select2-search--inline .select2-search__field {
      height: 26px;
    }

    .custom-login {
      height: 38px;
      font-size: .85rem;
    }
    .card-body ol {
  list-style-type: decimal; /* Untuk penomoran */
  margin-left: 20px; /* Mengatur margin */
}

.card-body ul {
  list-style-type: disc; /* Untuk bullet points */
  margin-left: 20px; /* Mengatur margin */
}

  </style>
  @notifyCss
  @notifyJs
</head>

<body id="page-top">
  @include('notify::components.notify')
  <!-- Page Wrapper -->
  <div class="overlay "></div>
  <div class="spanner ">
    <div class="loader"></div>
  </div>
  <div id="wrapper">
    <x-_sidenav></x-_sidenav>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <x-_topnav></x-_topnav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <x-_header>{{ $title }}</x-_header>

          <main>
            {{ $slot }}
          </main>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <x-_footer></x-_footer>
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          {{-- <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript -->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages -->
  <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> --}}

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/js/demo/table-room.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script> --}}

  <!-- LIBS -->
  <script src="{{ asset('assets/libs/hashId/hashids.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatable/dataTables.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/libs/datatable/dataTables.bootstrap5.js') }}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/libs/swal/swal.js') }}"></script>

  <!-- FullCalendar JS -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js'></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    let csrfToken = $('meta[name="csrf-token"]').attr("content")
    let baseUrl = $('meta[name="base-url"]').attr('content');
  </script>

  @stack('customJs')

  <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
        }
    }
  </script>
  <script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#description' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
  </script>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        // plugins: [ resourceTimelinePlugin ],
        initialView: 'dayGridMonth', // Tampilan default bulanan
        locale: 'id', // Menggunakan bahasa Indonesia (atau sesuai lokal)
        selectable: true,
        contentHeight: 'auto', // Tinggi otomatis berdasarkan konten
        editable: true,
        events: '/api/get-reservations', // Ganti dengan API untuk memuat event dari backend
        dateClick: function(info) {
          alert('Tanggal yang dipilih: ' + info.dateStr);
        },
        eventClick: function(info) {
          alert('Reservasi pada: ' + info.event.title);
        }
      });
  
      calendar.render();
    });
  </script>

</body>

</html>
