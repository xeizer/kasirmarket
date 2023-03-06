<div>
    <div class="mb-3">
        <label>Barcode</label>
        <input type="text" class="form-control" wire:model="barcode">
    </div>
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" class="form-control" wire:model="namabarang">
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="text" class="form-control" wire:model="harga">
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" class="form-control" wire:model="stok">
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" wire:click='simpanBarang'>SIMPAN</button>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>BARCODE</th>
            <th>NAMA</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th>AKSI</th>
        </thead>
        <tbody>
            @foreach ($semuabarang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barcode }}</td>
                    <td>{{ $item->namabarang }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <button class="btn btn-warning" wire:click="editBarang({{ $item->id }})">EDIT</button>
                        <button class="btn btn-danger" wire:click="hapusBarang({{ $item->id }})">HAPUS</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
