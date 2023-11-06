<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<section id="services" class="services content">
    <div class="container bg-white shadow-lg p-5 mt-5" style="border-radius: 30px">
        <div class="section-title">

            <h2>Öğrenciler</h2>
            <p class="mb-4">Bu sayfada Öğrencileri Görüntüleyebilirsiniz<br>
        </div>

        <div class="section">

            <table id="students" class="table table-responsive table-striped data-table data nowrap center w-100">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Öğrenci Ad</th>
                    <th>Vize1</th>
                    <th>Vize2</th>
                    <th>Final</th>
                    <th>Detay</th>

                </tr>
                </thead>
                <br>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Öğrenci Ad</th>
                    <th>Vize1</th>
                    <th>Vize2</th>
                    <th>Final</th>
                    <th>Detay</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<script type="text/javascript">

    function kaydet(id, type) {
        var not = document.getElementById(type + '_' + id).value;

        $.ajax({
            url: '/teacher/not/kaydet', // Notları kaydetmek için Laravel route'unuzu veya URL'nizi belirtin
            method: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                id: id,
                type: type,
                not: not
            },
            success: function(response) {
                alert('Not başarıyla kaydedildi.');
            },
            error: function() {
                alert('Not kaydederken hata oluştu.');
            }
        });
    }


    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            }
        });
    });

    var dataTable = null;

    dataTable = $('#students').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Turkish.json'

        },

        ajax: {
            url: '{!! route('teacher_fetch') !!}',
        },
        order: [
            [0, 'ASC']
        ],
        processing: true,
        serverSide: true,



        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'vize1'},
            {data: 'vize2'},
            {data: 'final'},
            {data: 'detail'},

        ],
        /*columnDefs:[
            {"width": "100px", "targets": [1,2]}
        ]*/

    });/*
    function ddd(id){
        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': " "},
            url: ,
            data: {
                id: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                Swal.fire({
                    icon: "success",
                    title: "Başarılı",
                    html: response.success,
                    showConfirmButton: true,
                    confirmButtonText: "Tamam"
                });
                dataTable.ajax.reload();
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Hata!",
                    html: "Silme Başarısız",
                    showConfirmButton: true,
                    confirmButtonText: "Tamam"
                });
            }
        });
    }*/





</script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

</body>
</html>
