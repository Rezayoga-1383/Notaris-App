<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="font-bold text-xl text-gray-800 dark:text-gray-500">
                    Transaksi
                </p>

                <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100">
                    Data Transaksi Nasabah
                </h2>
            </div>

            <a href="{{ route('transaksi') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                + Tambah Transaksi
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
            .btn-edit,
            .btn-delete{
                width:100%;
                text-align:center;
            }

            table.dataTable td,
            table.dataTable th{
                white-space:normal;
            }
        }

        .btn-insentif{
            background:#10b981;
            color:white;
            padding:6px 12px;
            border-radius:8px;
            border:none;
            cursor:pointer;
        }
        .btn-insentif:hover{
            background:#059669;
        }

        .btn-delete{
            background:#ef4444;
            color:white;
            padding:6px 12px;
            border-radius:8px;
            border:none;
            cursor:pointer;
        }
        .btn-delete:hover{
            background:#dc2626;
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
                    <h3>Daftar Transaksi Nasabah</h3>
                </div>

                    <div class="table-wrapper">

                        <table id="tableTransaksi"
                            class="display nowrap"
                            style="width:100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Nasabah</th>
                                <th>Tanggal</th>
                                <th>Bank</th>
                                <th>Marketing</th>
                                <th>Total Nominal</th>
                                <th>Status</th>
                                <th width="140">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($transaksi as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="font-semibold">
                                        {{ $item->nama_nasabah }}
                                    </div>
                                </td>

                                <td>
                                    {{ $item->tanggal_transaksi->format('d-m-Y') }}
                                </td>

                                <td>
                                    {{ $item->bank->nama_bank ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->user?->name}}
                                </td>

                                <td style="font-weight:600;color:#16a34a;">
                                    Rp {{ number_format($item->details->sum('nominal'),0,',','.') }}
                                </td>

                                <td>

                                    @if($item->status == 'Lunas')
                                        <span class="status-lunas">
                                            Lunas
                                        </span>
                                    @else
                                        <span class="status-belum">
                                            Belum
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    <div class="aksi-mobile">

                                    <button
                                        type="button"
                                        class="btn-detail"
                                        data-nasabah="{{ $item->nama_nasabah }}"
                                        data-bank="{{ $item->bank->nama_bank ?? '-' }}"
                                        data-marketing="{{ $item->user?->name ?? '-' }}"
                                        data-tanggal="{{ $item->tanggal_transaksi->format('d-m-Y') }}"
                                        data-status="{{ $item->status }}"
                                        data-keterangan-status="{{ $item->keterangan_status }}"
                                        data-detail='@json($item->details)'>
                                        Detail
                                    </button>

                                        @if($item->status == 'Lunas')
                                            <button 
                                                type="button"
                                                class="btn-insentif"
                                                data-id="{{ $item->id }}"
                                                data-nasabah="{{ $item->nama_nasabah }}"

                                                data-ao="{{ $item->insentif_ao }}"
                                                data-sp="{{ $item->insentif_sp }}"
                                                data-adk="{{ $item->insentif_adk }}"
                                                data-pinca="{{ $item->insentif_pinca }}"
                                                data-mpspb="{{ $item->insentif_mp_spb }}">

                                                {{ $item->sudah_insentif ? 'Edit Insentif' : 'Input Insentif' }}
                                            </button>
                                        @endif

                                        <a href="#"
                                            class="btn-edit">
                                            Edit
                                        </a>

                                        <a href="#" class="btn-delete">
                                            Hapus
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

        // Read data in Datatable
        $(document).ready(function () {

            $('#tableTransaksi').DataTable({

                responsive: true,

                autoWidth: false,

                pageLength: 10,

                columnDefs: [
                    {
                        responsivePriority: 1,
                        targets: [1,7]
                    },
                    {
                        responsivePriority: 2,
                        targets: [5]
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

        // Detail Transaksi
        document.addEventListener('click', function(e){
            if(!e.target.classList.contains('btn-detail')) {
                return;
            }

            const details = JSON.parse(
                e.target.dataset.detail
            );

            let detailHtml = `
                <table style="width:100%;border-collapse:collapse">
                    <thead>
                        <tr>
                            <th style="text-align:left;padding:8px">Keterangan</th>
                            <th style="text-align:right;padding:8px">Nominal</th>
                        </tr>    
                    </thead>
                    <tbody>
            `;

            let total = 0;

            details.forEach(item => {
                total += parseInt(item.nominal);

                detailHtml += `
                    <tr>
                        <td style="padding:8px;border-top:1px solid #eee">
                            ${item.keterangan}
                        </td>

                        <td style="padding:8px;border-top:1px solid #eee;text-align:right">
                            Rp ${new Intl.NumberFormat('id-ID').format(item.nominal)}
                        </td>
                    </tr>
                `;
            });

            detailHtml += `
                    </tbody>
                </table>

                <hr>

                <div style="text-align:right;font-weight:bold;font-size:16px">
                    Total :
                    Rp ${new Intl.NumberFormat('id-ID').format(total)}
                </div>
            `;

            Swal.fire({
                title: e.target.dataset.nasabah,
                width: 800,
                html: `
                    <div style="text-align:left;margin-bottom:15px">
                        <b>Bank:</b> ${e.target.dataset.bank}<br>
                        <b>Marketing:</b> ${e.target.dataset.marketing}<br>
                        <b>Tanggal:</b> ${e.target.dataset.tanggal}<br>
                        <b>Status:</b> ${e.target.dataset.status}
                    </div>

                    ${e.target.dataset.keteranganStatus
                        ? `<div style="background:#fee2e2;padding:10px;border-radius:8px;margin-bottom:15px">
                            <b>Keterangan Status:</b><br>
                            ${e.target.dataset.keteranganStatus}
                        </div>`
                        : ''
                    }

                    ${detailHtml}
                `,
                confirmButtonText: 'Tutup'
            });
        });

        document.addEventListener('click', function(e){
            if(!e.target.classList.contains('btn-insentif')){
                return;
            }

            const transaksiId = e.target.dataset.id;

            const ao = e.target.dataset.ao ?? '';
            const sp = e.target.dataset.sp ?? '';
            const adk = e.target.dataset.adk ?? '';
            const pinca = e.target.dataset.pinca ?? '';
            const mpspb = e.target.dataset.mpspb ?? '';

            Swal.fire({
                title: 'Input / Edit Insentif',
                width: 700,

                html: `
                    <div style="text-align:left">
                        <label style="font-weight:600">Insentif AO</label>
                        <div style="display:flex;margin-bottom:10px">
                            <span style="padding:10px;background:#f3f4f6;border:1px solid #d1d5db;border-right:none;border-radius:6px 0 0 6px">
                                Rp
                            </span>
                            <input id="ao"
                                class="swal2-input rupiah"
                                value="${ao}"
                                style="margin:0;border-radius:0 6px 6px 0;">
                        </div>

                        <label style="font-weight:600">Insentif SP</label>
                        <div style="display:flex;margin-bottom:10px">
                            <span style="padding:10px;background:#f3f4f6;border:1px solid #d1d5db;border-right:none;border-radius:6px 0 0 6px">
                                Rp
                            </span>
                            <input id="sp"
                                class="swal2-input rupiah"
                                value="${sp}"
                                style="margin:0;border-radius:0 6px 6px 0;">
                        </div>

                        <label style="font-weight:600">Insentif ADK</label>
                        <div style="display:flex;margin-bottom:10px">
                            <span style="padding:10px;background:#f3f4f6;border:1px solid #d1d5db;border-right:none;border-radius:6px 0 0 6px">
                                Rp
                            </span>
                            <input id="adk"
                                class="swal2-input rupiah"
                                value="${adk}"
                                style="margin:0;border-radius:0 6px 6px 0;">
                        </div>

                        <label style="font-weight:600">Insentif PINCA</label>
                        <div style="display:flex;margin-bottom:10px">
                            <span style="padding:10px;background:#f3f4f6;border:1px solid #d1d5db;border-right:none;border-radius:6px 0 0 6px">
                                Rp
                            </span>
                            <input id="pinca"
                                class="swal2-input rupiah"
                                value="${pinca}"
                                style="margin:0;border-radius:0 6px 6px 0;">
                        </div>

                        <label style="font-weight:600">Insentif MP/SPB</label>
                        <div style="display:flex;margin-bottom:10px">
                            <span style="padding:10px;background:#f3f4f6;border:1px solid #d1d5db;border-right:none;border-radius:6px 0 0 6px">
                                Rp
                            </span>
                            <input id="mpspb"
                                class="swal2-input rupiah"
                                value="${mpspb}"
                                style="margin:0;border-radius:0 6px 6px 0;">
                        </div>
                    </div>
                `,
                didOpen: () => {
                    document.querySelectorAll('.rupiah').forEach(input => {
                        input.value = formatRupiah(input.value);
                        input.addEventListener('input', function() {
                            this.value = formatRupiah(this.value);
                        });
                    });
                },
                showCancelButton: true,
                confirmButtonText: 'Simpan',

                preConfirm: () => {
                    return {
                        ao: cleanNumber(document.getElementById('ao').value),
                        sp: cleanNumber(document.getElementById('sp').value),
                        adk: cleanNumber(document.getElementById('adk').value),
                        pinca: cleanNumber(document.getElementById('pinca').value),
                        mpspb: cleanNumber(document.getElementById('mpspb').value),
                    };
                }
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url: '/transaksi/' + transaksiId + '/insentif',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            insentif_ao: result.value.ao,
                            insentif_sp: result.value.sp,
                            insentif_adk: result.value.adk,
                            insentif_pinca: result.value.pinca,
                            insentif_mp_spb: result.value.mpspb,
                        },
                        success: function(response){
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr){
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Data insentif gagal disimpan'
                            });
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });

        function formatRupiah(value)
        {
            value  = value.toString().replace(/\D/g, '');
            return value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function cleanNumber(value)
        {
            return value.replace(/\./g, '');
        }

        </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</x-app-layout>