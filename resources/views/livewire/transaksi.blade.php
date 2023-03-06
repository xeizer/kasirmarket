<div>
    <div class="row">
        <div class="col-3">
            <div class="mb-1">
                <button class="btn btn-outline-primary" wire:click='transaksiBaru'>Transaksi Baru
                </button>
            </div>
            @if ($kodetransaksi)
                <div>
                    <span class="badge bg-info">{{ $kodetransaksi }}</span>
                </div>
                <label>BARCODE</label>
                <input type="text" class="form-control" wire:model='barcode' />
                <button class="btn btn-primary w-100" wire:click='pencarianBarang'>Cari</button>
                @if ($barang)
                    <div class="mt-1">
                        <table class="table table-bordered">
                            <tr>
                                <td>Barcode</td>
                                <td>{{ $barang->barcode }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $barang->namabarang }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>{{ $barang->harga }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ $barang->stok }}</td>
                            </tr>

                        </table>
                        <input type="number" min="1" max="{{ $barang->stok }}" wire:model='jumlah'>
                        <button wire:click='tambahBarangTransaksi'>TAMBAH</button>
                    </div>
                @else
                    Tidak Ditemukan
                @endif

            @endif
        </div>
        @if ($kodetransaksi)
            <div class="col-9">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>BARANG</th>
                            <th>HARGA SATUAN</th>
                            <th>JUMLAH</th>
                            <th>SUB TOTAL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $item->barang->namabarang }}</td>
                                <td>{{ $item->barang->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                    <button class="btn btn-danger"
                                        wire:click='hapus({{ $item->id }})'>HAPUS</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td>TOTAL</td>
                            <td>{{ $total ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Bayar</td>
                            <td>
                                <input type="number" class="form-control" wire:model='bayar'>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>Kembalian</td>
                            <td>{{ $kembalian ?? '0' }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><button class="btn btn-info" wire:click='selesai'>SELESAI</button>
                                <button class="btn btn-info" wire:click='batal'>batal</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
