<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size:0.75rem; color:#64748b; text-transform:uppercase; letter-spacing:0.1em; margin-bottom:2px;">
                    Transaksi
                </p>
                <h2 class="font-bold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                    Input Transaksi Baru
                </h2>
            </div>
            <a href="{{ route('transaksi.read') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400
                               hover:text-gray-800 dark:hover:text-gray-100 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <style>
        /* ── Light mode defaults ── */
        .tf-wrap { max-width: 42rem; margin: 2rem auto; padding: 0 1rem; }
        .tf-form { display: flex; flex-direction: column; gap: 1.25rem; }

        .tf-card {
            border-radius: 1rem; overflow: hidden;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 4px rgba(0,0,0,.06);
        }
        .tf-card-head {
            display: flex; align-items: center; gap: 0.625rem;
            padding: 0.75rem 1.25rem;
            background: #f9fafb;
            border-bottom: 1px solid #f3f4f6;
        }
        .tf-accent {
            display: block; width: 3px; height: 1rem;
            border-radius: 9999px; background: #3b82f6; flex-shrink: 0;
        }
        .tf-section-title {
            font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: #6b7280;
        }
        .tf-card-body { padding: 1.25rem; display: flex; flex-direction: column; gap: 1rem; }

        .tf-col2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .tf-col3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 0.5rem; }
        @media (max-width: 500px) {
            .tf-col2, .tf-col3 { grid-template-columns: 1fr; }
        }

        .tf-label { display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.375rem; }
        .tf-req   { color: #ef4444; margin-left: 2px; }
        .tf-opt   { font-size: 0.75rem; font-weight: 400; color: #94a3b8; margin-left: 4px; }

        .tf-control {
            display: block; width: 100%; box-sizing: border-box;
            font-size: 0.875rem; padding: 0.625rem 0.875rem;
            border-radius: 0.5rem; outline: none;
            border: 1px solid #d1d5db;
            background: #f9fafb; color: #111827;
            transition: border-color .15s, box-shadow .15s;
        }
        .tf-control::placeholder { color: #9ca3af; }
        .tf-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.2);
        }
        textarea.tf-control { resize: none; }

        .tf-group {
            display: flex; overflow: hidden; border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            transition: border-color .15s, box-shadow .15s;
        }
        .tf-group:focus-within {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.2);
        }
        .tf-prefix {
            display: inline-flex; align-items: center;
            padding: 0 1rem; flex-shrink: 0;
            font-size: 0.875rem; font-weight: 600;
            user-select: none;
            background: #f3f4f6; color: #6b7280;
            border-right: 1px solid #d1d5db;
        }
        .tf-group .tf-control { border: none; border-radius: 0; flex: 1; box-shadow: none !important; }

        .tf-radio { display: none; }
        .tf-pill {
            display: flex; align-items: center; justify-content: center;
            gap: 0.5rem; padding: 0.625rem 0.5rem;
            border-radius: 0.5rem; border: 1px solid #e5e7eb;
            font-size: 0.875rem; font-weight: 500;
            background: #fff; color: #6b7280;
            cursor: pointer; user-select: none;
            transition: border-color .15s, background .15s, color .15s;
        }
        .tf-dot { width: 8px; height: 8px; border-radius: 9999px; flex-shrink: 0; }

        .tf-radio:checked + .tf-pill[data-c="y"] { border-color: #f59e0b; background: #fffbeb; color: #92400e; }
        .tf-radio:checked + .tf-pill[data-c="g"] { border-color: #10b981; background: #ecfdf5; color: #065f46; }
        .tf-radio:checked + .tf-pill[data-c="r"] { border-color: #ef4444; background: #fff1f2; color: #991b1b; }

        .tf-actions { display: flex; justify-content: flex-end; align-items: center; gap: 0.75rem; padding-bottom: 1rem; }

        .tf-btn-cancel {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 0.625rem 1.25rem; border-radius: 0.5rem;
            font-size: 0.875rem; font-weight: 500; text-decoration: none; cursor: pointer;
            border: 1px solid #d1d5db; background: #fff; color: #374151;
            transition: background .15s;
        }
        .tf-btn-cancel:hover { background: #f9fafb; }

        .tf-btn-save {
            display: inline-flex; align-items: center; justify-content: center;
            gap: 0.5rem; padding: 0.625rem 1.5rem; border-radius: 0.5rem;
            font-size: 0.875rem; font-weight: 600; border: none; cursor: pointer;
            background: #2563eb; color: #fff;
            box-shadow: 0 1px 3px rgba(37,99,235,.35);
            transition: background .15s, box-shadow .15s;
        }
        .tf-btn-save:hover  { background: #1d4ed8; }
        .tf-btn-save:active { background: #1e40af; }

        /* ── Dark mode ── */
        /* Breeze sets class="dark" on <html>, so we target html.dark */
        html.dark .tf-card {
            background: #1f2937;
            border-color: #374151;
            box-shadow: 0 1px 6px rgba(0,0,0,.5);
        }
        html.dark .tf-card-head {
            background: #1a2535;
            border-bottom-color: #374151;
        }
        html.dark .tf-section-title { color: #64748b; }

        html.dark .tf-label { color: #cbd5e1; }
        html.dark .tf-opt   { color: #64748b; }

        html.dark .tf-control {
            background: #0f172a;
            border-color: #334155;
            color: #f1f5f9;
        }
        html.dark .tf-control::placeholder { color: #475569; }
        html.dark .tf-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.15);
        }

        html.dark .tf-group { border-color: #334155; }
        html.dark .tf-group:focus-within {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.15);
        }
        html.dark .tf-prefix {
            background: #1e293b;
            border-right-color: #334155;
            color: #64748b;
        }
        html.dark .tf-group .tf-control { background: #0f172a; }

        html.dark .tf-pill {
            background: #0f172a;
            border-color: #334155;
            color: #64748b;
        }
        html.dark .tf-radio:checked + .tf-pill[data-c="y"] {
            border-color: #d97706;
            background: rgba(217,119,6,.12);
            color: #fcd34d;
        }
        html.dark .tf-radio:checked + .tf-pill[data-c="g"] {
            border-color: #059669;
            background: rgba(5,150,105,.12);
            color: #6ee7b7;
        }
        html.dark .tf-radio:checked + .tf-pill[data-c="r"] {
            border-color: #dc2626;
            background: rgba(220,38,38,.12);
            color: #fca5a5;
        }

        html.dark .tf-btn-cancel {
            background: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }
        html.dark .tf-btn-cancel:hover { background: #263348; border-color: #475569; }
    </style>

    <div class="py-8">
        <div class="tf-wrap">
            @if ($errors->any())
                <div style="
                    background:#fee2e2;
                    color:#991b1b;
                    padding:12px;
                    border-radius:8px;
                    margin-bottom:16px;
                ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div style="
                    background:#dcfce7;
                    color:#166534;
                    padding:12px;
                    border-radius:8px;
                    margin-bottom:16px;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('transaksi.store') }}" method="POST" class="tf-form">
                @csrf

                {{-- Card 1: Informasi Nasabah --}}
                <div class="tf-card">
                    <div class="tf-card-head">
                        <span class="tf-accent"></span>
                        <span class="tf-section-title">Informasi Nasabah</span>
                    </div>
                    <div class="tf-card-body">

                        <div>
                            <label for="nama_nasabah" class="tf-label">
                                Nama Nasabah <span class="tf-req">*</span>
                            </label>
                            <input type="text" id="nama_nasabah" name="nama_nasabah" value="{{ old('nama_nasabah') }}" placeholder="Masukkan Nama Nasabah" class="tf-control">
                        </div>

                        <div class="tf-col3">

                            <div>
                                <label for="bank_id" class="tf-label">
                                    Bank <span class="tf-req">*</span>
                                </label>

                                <select id="bank_id"
                                        name="bank_id"
                                        class="tf-control"
                                        required>
                                    <option value="">-- Pilih Bank --</option>

                                    @foreach($banks as $bank)
                                        <option value="{{ $bank->id }}">
                                            {{ $bank->nama_bank }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="bank_branch_id" class="tf-label">
                                    Cabang Bank
                                </label>

                                <select id="bank_branch_id"
                                        name="bank_branch_id"
                                        class="tf-control">
                                    <option value="">
                                        -- Pilih Cabang Bank --
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label for="tanggal_transaksi" class="tf-label">
                                    Tanggal Transaksi <span class="tf-req">*</span>
                                </label>

                                <input type="date"
                                    id="tanggal_transaksi"
                                    name="tanggal_transaksi"
                                    value="{{ date('Y-m-d') }}"
                                    class="tf-control">
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Card 2: Detail Transaksi --}}
                <div class="tf-card">
                    <div class="tf-card-head">
                        <span class="tf-accent"></span>
                        <span class="tf-section-title">Detail Transaksi</span>
                    </div>

                    <div class="tf-card-body">
                        <div class="detail-container" id="detail-container">
                            <div class="detail-item" style="padding:15px;border:1px solid #e5e7eb;border-radius:18px;">
                                <div style="margin-bottom:12px;">
                                    <label class="tf-label">
                                        Nominal <span class="tf-req">*</span>
                                    </label>
                                    <div class="tf-group">
                                        <span class="tf-prefix">Rp</span>
                                        <input type="number" name="nominal[]" placeholder="Masukkan Nominal" class="tf-control" required>
                                    </div>
                                </div>

                                <div>
                                    <label class="tf-label">
                                        Keterangan <span class="tf-req">*</span>
                                    </label>
                                    <textarea name="keterangan[]" id="keterangan" rows="3" class="tf-control" placeholder="Masukkan keterangan transaksi"></textarea>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="btnTambahDetail" class="tf-btn-cancel">
                            + Tambah Detail
                        </button>

                        <div>
                            <label class="tf-label">
                                Nama Marketing
                            </label>

                            <select name="user_id" id="user_id" class="tf-control" required>
                                <option value="">-- Pilih Marketing --</option>

                                @foreach ($marketings as $marketing)
                                    <option value="{{ $marketing->id }}">
                                        {{ $marketing->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="tf-label">Status</label>
                            <div style="display:flex;gap:.5rem;justify-content:center;margin-top:.375rem;">
                                <label>
                                    <input type="radio" name="status" value="Lunas" class="tf-radio">
                                    <span class="tf-pill" data-c="g">
                                        <span class="tf-dot" style="background:#10b981;"></span>
                                        Lunas
                                    </span>
                                </label>

                                <label>
                                    <input type="radio" name="status" value="Belum" class="tf-radio">
                                    <span class="tf-pill" data-c="r">
                                        <span class="tf-dot" style="background:#ef4444;"></span>
                                        Belum
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div id="alasanBelumContainer" style="display:none">
                            <label class="tf-label">
                                Keterangan Belum <span class="tf-req">*</span>
                            </label>

                            <textarea name="keterangan_status" status" rows="3" class="tf-control" placeholder="Masukkan keterangan transaksi belum selesai"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="tf-actions">
                    <a href="{{ route('transaksi.read') }}" class="tf-btn-cancel">Batal</a>
                    <button type="submit" class="tf-btn-save">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Transaksi
                    </button>
                </div>

            </form>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const bankSelect = document.getElementById('bank_id');
    const branchSelect = document.getElementById('bank_branch_id');

    bankSelect.addEventListener('change', function () {

        const bankId = this.value;

        branchSelect.innerHTML =
            '<option value="">Memuat cabang...</option>';

        if (!bankId) {
            branchSelect.innerHTML =
                '<option value="">-- Pilih Cabang Bank --</option>';
            return;
        }

        fetch(`/bank/${bankId}/branches`)
            .then(response => response.json())
            .then(data => {

                branchSelect.innerHTML =
                    '<option value="">-- Pilih Cabang Bank --</option>';

                data.forEach(branch => {

                    branchSelect.innerHTML += `
                        <option value="${branch.id}">
                            ${branch.nama_cabang} - ${branch.kota}
                        </option>
                    `;
                });
            })
            .catch(error => {

                console.error(error);

                branchSelect.innerHTML =
                    '<option value="">Gagal memuat data</option>';
            });
    });

    // Status Belum

    const statusRadios = document.querySelectorAll('input[name="status"]');
    const alasanContainer = document.getElementById('alasanBelumContainer');
    const alasanInput = document.getElementById('keterangan_status');

    statusRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'Belum') {
                alasanContainer.style.display = 'block';
            } else {
                alasanContainer.style.display = 'none';

                if (alasanInput) {
                    alasanInput.value = '';
                }
            }
        });
    });

    // Detail Transaksi Dinamis

    const detailContainer = document.getElementById('detail-container');
    const btnTambahDetail = document.getElementById('btnTambahDetail');
    console.log(detailContainer);
    console.log(btnTambahDetail);

    if (btnTambahDetail && detailContainer) {
        btnTambahDetail.addEventListener('click', function () {
            const html = `
                <div class="detail-item"
                    style="padding:15px;border:1px solid #e5e7eb;border-radius:10px;margin-top:12px;">

                    <div style="display:flex;justify-content:flex-end;margin-bottom:10px;">
                        <button type="button" class="hapus-detail tf-btn-cancel">
                            Hapus
                        </button>
                    </div>

                    <div style="margin-bottom:12px;">
                        <label class="tf-label">
                            Nominal <span class="tf-req">*</span>
                        </label>

                        <div class="tf-group">
                            <span class="tf-prefix">Rp</span>
                            <input type="number" name="nominal[]" class="tf-control" min="0" required>
                        </div>
                    </div>

                    <div>
                        <label class="tf-label">
                            Keterangan
                        </label>

                        <textarea name="keterangan[]" rows="3" class="tf-control" placeholder="Masukkan keterangan transaksi"></textarea>
                    </div>
                </div>
            `;

            detailContainer.insertAdjacentHTML(
                'beforeend',
                html
            );
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('hapus-detail')) {
                const items = document.querySelectorAll('.detail-item');
                if (items.length > 1) {
                    e.target.closest('.detail-item').remove();
                }
            }
        });
    }
    

});
</script>

</x-app-layout>