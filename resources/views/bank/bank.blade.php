<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="font-bold text-xl text-gray-800 dark:text-gray-500">
                    Bank
                </p>

                <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100">
                    Data Daftar Bank
                </h2>
            </div>

            <a href="{{ route('bank') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Tambah Bank
            </a>
        </div>
    </x-slot>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- DataTables --}}
    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    
    <link rel="stylesheet"
        href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <style>

        .page-bg{
            background:#f1f5f9;
            min-height:100vh;
        }

        .card-table{
            background:#ffffff;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .table-header{
            padding:20px 24px;
            border-bottom:1px solid #e5e7eb;
        }

        .table-header h3{
            font-size:18px;
            font-weight:700;
            color:#111827;
        }

        table.dataTable{
            width:100% !important;
        }

        table.dataTable thead th{
            background:#f8fafc !important;
            color:#334155 !important;
            font-weight:600 !important;
            border-bottom:1px solid #e5e7eb !important;
        }

        table.dataTable tbody td{
            padding:14px !important;
            border-bottom:1px solid #f1f5f9;
        }

        table.dataTable tbody tr:hover{
            background:#f8fafc;
        }

        .dataTables_wrapper{
            padding:20px;
        }

        .dataTables_length select{
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            padding:6px 12px !important;
            background:#fff !important;
        }

        .dataTables_filter input{
            border:1px solid #d1d5db !important;
            border-radius:8px !important;
            padding:8px 12px !important;
            margin-left:8px !important;
            background:#fff !important;
        }

        .status-lunas{
            background:#dcfce7;
            color:#166534;
            padding:4px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
        }

        .status-belum{
            background:#fee2e2;
            color:#991b1b;
            padding:4px 12px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
        }

        .btn-detail{
            background:#0ea5e9;
            color:white;
            padding:6px 12px;
            border-radius:8px;
            text-decoration:none;
        }

        .btn-detail:hover{
            background:#0284c7;
        }

        .btn-edit{
            background:#f59e0b;
            color:white;
            padding:6px 12px;
            border-radius:8px;
            text-decoration:none;
        }

        .btn-edit:hover{
            background:#d97706;
        }

        .table-wrapper{
            width:100%;
            overflow-x:auto;
        }

        table.dataTable{
            width:100% !important;
        }

        table.dataTable td,
        table.dataTable th{
            white-space:nowrap;
        }

        .aksi-mobile{
            display:flex;
            gap:6px;
        }

        @media (max-width:768px){

            .page-bg{
                padding:10px;
            }

            .card-table{
                border-radius:12px;
            }

            .table-header{
                padding:15px;
            }

            .table-header h3{
                font-size:16px;
            }

            .dataTables_wrapper{
                padding:10px;
            }

            .dataTables_filter{
                width:100%;
                margin-top:10px;
            }

            .dataTables_filter input{
                width:100% !important;
                margin-left:0 !important;
                margin-top:5px;
            }

            .dataTables_length{
                width:100%;
                margin-bottom:10px;
            }

            .dataTables_length select{
                width:100%;
            }

            .aksi-mobile{
                flex-direction:column;
            }

            .btn-detail,
            .btn-edit{
                width:100%;
                text-align:center;
            }

            table.dataTable td,
            table.dataTable th{
                white-space:normal;
            }
        }

    </style>

    <div class="page-bg py-8">

        <div class="max-w-7xl mx-auto px-6">

            @if(session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700 border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-table">

                <div class="table-header">
                    <h3>Daftar Data Bank</h3>
                </div>

                    <div class="table-wrapper">

                        <table id="tableBank"
                            class="display nowrap"
                            style="width:100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bank</th>
                                <th width="140">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($banks as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="font-semibold">
                                        {{ $item->nama_bank }}
                                    </div>
                                </td>

                                <td>

                                    <div class="aksi-mobile">

                                        <a href="#"
                                            class="btn-detail">
                                            Detail
                                        </a>

                                        <a href="#"
                                            class="btn-edit">
                                            Edit
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <script>

        $(document).ready(function () {

            $('#tableBank').DataTable({

                responsive: true,

                autoWidth: false,

                pageLength: 10,

                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: [1,2]
                    },
                    {
                        orderable: false,
                        targets: [0, 2]
                    }
                ],

                language: {
                    search: "Cari Data:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "›",
                        previous: "‹"
                    }
                }

            });

        });

    </script>

</x-app-layout>