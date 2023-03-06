<?php

namespace App\Http\Livewire;

use App\Models\Semuabarang;
use Livewire\Component;

class Barang extends Component
{
    public $barcode, $namabarang, $stok, $harga;
    public $barangyangdiedit;
    public function simpanBarang()
    {
        if ($this->barangyangdiedit) {
            $simpan = $this->barangyangdiedit;
        } else {
            $simpan = new Semuabarang();
        }
        $simpan->barcode = $this->barcode;
        $simpan->namabarang = $this->namabarang;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();
        $this->reset();
    }
    public function editBarang($id)
    {
        $this->barangyangdiedit = Semuabarang::find($id);
        $this->barcode = $this->barangyangdiedit->barcode;
        $this->namabarang = $this->barangyangdiedit->namabarang;
        $this->harga = $this->barangyangdiedit->harga;
        $this->stok = $this->barangyangdiedit->stok;
    }
    public function hapusBarang($id)
    {
        Semuabarang::find($id)->delete();
    }
    public function render()
    {
        return view('livewire.barang')
            ->with([
                'semuabarang' => Semuabarang::all()
            ]);
    }
}
