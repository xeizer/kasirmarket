<?php

namespace App\Http\Livewire;

use App\Models\Semuabarang;
use App\Models\Semuatransaksi;
use Livewire\Component;

class Transaksi extends Component
{
    public $barcode, $jumlah, $barang, $kodetransaksi, $bayar, $kembalian;
    public function transaksiBaru()
    {
        $this->reset();
        $this->kodetransaksi = rand();
        $this->bayar = 0;
        $this->kembalian = 0;
    }
    public function pencarianBarang()
    {
        $this->barang = Semuabarang::where('barcode', $this->barcode)->first();
    }
    public function tambahBarangTransaksi()
    {
        $tambahkan = new Semuatransaksi();
        $tambahkan->kodetransaksi = $this->kodetransaksi;
        $tambahkan->id_barang = $this->barang->id;
        $tambahkan->jumlah = $this->jumlah;
        $tambahkan->total = $this->jumlah * $this->barang->harga;
        $tambahkan->save();
        $this->barang->stok = $this->barang->stok - $this->jumlah;
        $this->barang->save();
    }
    public function hapus($id)
    {
        $hapus = Semuatransaksi::find($id);
        $kembalikanstok = SemuaBarang::find($hapus->id_barang);
        $kembalikanstok->stok = $kembalikanstok->stok + $hapus->jumlah;
        $kembalikanstok->save();
        $hapus->delete();
        $this->reset(['barcode', 'barang']);
    }
    public function updatedBayar()
    {
        if ($this->bayar > 1) {
            $this->kembalian = $this->bayar - Semuatransaksi::where('kodetransaksi', $this->kodetransaksi)->sum('total');
        }
    }
    public function batal()
    {
        $barangbatal = Semuatransaksi::where('kodetransaksi', $this->kodetransaksi)->get();
        foreach ($barangbatal as $item) {
            $this->hapus($item->id);
        }
    }
    public function selesai()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.transaksi')
            ->with([
                'transaksi' => Semuatransaksi::where('kodetransaksi', $this->kodetransaksi)->get(),
                'total' => Semuatransaksi::where('kodetransaksi', $this->kodetransaksi)->sum('total')
            ]);
    }
}
