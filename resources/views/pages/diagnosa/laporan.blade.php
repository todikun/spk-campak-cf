<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Laporan Diagnosa Penyakit Campak</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container-fluid p-0">
        <h3 class="h3 my-3 text-center">Laporan Diagnosa Penyakit Campak</h3>


        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <td colspan="1%">#</td>
                                    <td>Penyakit</td>
                                    <td>Kepercayaan</td>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                @foreach ($data as $item)
                                @if ($item['kepercayaan'] != 0)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item['nama']}}</td>
                                    <td>{{$item['kepercayaan']}}%</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>