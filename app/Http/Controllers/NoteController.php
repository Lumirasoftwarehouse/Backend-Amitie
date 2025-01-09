<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Pelanggan;
use App\Models\BiayaLain;

class NoteController extends Controller
{
    public function exportPdf($id)
    {
        // Ambil data pelanggan beserta nota-nya
        $pelanggans = Pelanggan::with('notes')->find($id);
    
        // Cek jika pelanggan ditemukan
        if (!$pelanggans) {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }
    
        // Render view ke dalam PDF dengan orientasi landscape dan ukuran kertas A4
        $pdf = \PDF::loadView('pdf.pelanggan', compact('pelanggans'));
    
        // Kembalikan file PDF sebagai download
        return $pdf->download('pelanggan_'.$pelanggans->id.'.pdf');
    }

    public function detailNota($id)
    {
        // Ambil data pelanggan beserta nota-nya
        $pelanggans = Pelanggan::with('notes.biayaLain')->find($id);
    
        return response()->json(['message' => 'berhasil', 'data' => $pelanggans], 200);
    }

    // Menampilkan semua catatan
    public function listNote()
    {
        $pelanggans = Pelanggan::with(['notes.biayaLain'])->get();
    
        return response()->json([
            'message' => 'success',
            'data' => $pelanggans
        ]);
    }
    

    // Fungsi untuk menambah catatan (Insert)
    public function createNote(Request $request)
    {
        // Validasi untuk menerima array input
        $validateData = $request->validate([
            'header' => 'required',
            'notes' => 'required|array',
            'notes.*.proses' => 'required',
            'notes.*.atas_nama' => 'required',
            'notes.*.kendaraan' => 'required',
            'notes.*.no_polisi' => 'required',
            'notes.*.keterangan' => 'required',
            'notes.*.stnk_resmi' => 'required',
            'notes.*.jasa' => 'required',
            // 'notes.*.lain_1' => 'required',
            // 'notes.*.lain_2' => 'required',
            // 'notes.*.lain_3' => 'required',
            // 'notes.*.lain_4' => 'required'
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->alamat = $validateData['header']['alamat'];
        $pelanggan->tanggal = $validateData['header']['tanggal'];
        $pelanggan->nama_pelanggan = $validateData['header']['pelanggan'];
        $pelanggan->save();
        // Iterasi melalui array notes untuk menyimpan beberapa Note
        foreach ($validateData['notes'] as $noteData) {
            Note::create([
                'proses' => $noteData['proses'],
                'atas_nama' => $noteData['atas_nama'],
                'kendaraan' => $noteData['kendaraan'],
                'no_polisi' => $noteData['no_polisi'],
                'keterangan' => $noteData['keterangan'],
                'stnk_resmi' => $noteData['stnk_resmi'],
                'jasa' => $noteData['jasa'],
                // 'lain_1' => $noteData['lain_1'],
                // 'lain_2' => $noteData['lain_2'],
                // 'lain_3' => $noteData['lain_3'],
                // 'lain_4' => $noteData['lain_4'],
                'total' => $noteData['total'], // Perhitungan total
                'pelanggan_id' => $pelanggan->id
            ]);
        }
    
        return response()->json(['message' => 'Notes created successfully']);
    }

    public function createNewNote(Request $request)
    {
        // Validasi untuk menerima array input
        $validateData = $request->validate([
            'header' => 'required|array',
            // 'header.alamat' => 'required|string',
            'header.tanggal' => 'required|date',
            'header.pelanggan' => 'required|string',
            'notes' => 'required|array',
            'notes.*.proses' => 'required|string',
            'notes.*.atas_nama' => 'required|string',
            'notes.*.kendaraan' => 'required|string',
            'notes.*.no_polisi' => 'required|string',
            'notes.*.keterangan' => 'required|string',
            'notes.*.stnk_resmi' => 'required',
            'notes.*.jasa' => 'required',
            'notes.*.total' => 'required|numeric',
            'notes.*.biaya_lain' => 'required|array',
            // 'notes.*.biaya_lain.*.label' => 'required|string',
            // 'notes.*.biaya_lain.*.nominal' => 'required|numeric'
        ]);
    
        // Buat pelanggan baru
        $pelanggan = Pelanggan::create([
            // 'alamat' => $validateData['header']['alamat'],
            'tanggal' => $validateData['header']['tanggal'],
            'nama_pelanggan' => $validateData['header']['pelanggan']
        ]);
    
        // Iterasi melalui array notes untuk menyimpan beberapa Note dan BiayaLain
        foreach ($validateData['notes'] as $noteData) {
            $note = Note::create([
                'proses' => $noteData['proses'],
                'atas_nama' => $noteData['atas_nama'],
                'kendaraan' => $noteData['kendaraan'],
                'no_polisi' => $noteData['no_polisi'],
                'keterangan' => $noteData['keterangan'],
                'stnk_resmi' => $noteData['stnk_resmi'],
                'jasa' => $noteData['jasa'],
                'total' => $noteData['total'], // Perhitungan total
                'pelanggan_id' => $pelanggan->id
            ]);
    
            // Simpan biaya lain-lain untuk Note ini
            foreach ($noteData['biaya_lain'] as $biayaLainData) {
                if ($biayaLainData['nominal'] != 0) {
                    # code...
                    BiayaLain::create([
                        'label' => $biayaLainData['label'],
                        'nominal' => $biayaLainData['nominal'],
                        'id_note' => $note->id // Menggunakan ID Note yang baru dibuat
                    ]);
                }
            }
        }
    
        return response()->json(['message' => 'Notes created successfully']);
    }
    

    

    // Fungsi untuk mengupdate catatan (Update)
    public function updateNote(Request $request, $id)
    {
        // Validasi input
        $validateData = $request->validate([
            // 'alamat' => 'required',
            'tanggal' => 'required',
            'pelanggan' => 'required',
            'proses' => 'required',
            'atas_nama' => 'required',
            'kendaraan' => 'required',
            'no_polisi' => 'required',
            'keterangan' => 'required',
            'stnk_resmi' => 'required',
            'jasa' => 'required',
            'lain_lain' => 'required'
        ]);

        // Cari catatan berdasarkan id
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        // Update data catatan
        $note->update([
            // 'alamat' => $validateData['alamat'],
            'tanggal' => $validateData['tanggal'],
            'pelanggan' => $validateData['pelanggan'],
            'proses' => $validateData['proses'],
            'atas_nama' => $validateData['atas_nama'],
            'kendaraan' => $validateData['kendaraan'],
            'no_polisi' => $validateData['no_polisi'],
            'keterangan' => $validateData['keterangan'],
            'stnk_resmi' => $validateData['stnk_resmi'],
            'jasa' => $validateData['jasa'],
            'lain_lain' => $validateData['lain_lain']
        ]);

        return response()->json(['message' => 'Note updated successfully']);
    }

    // Fungsi untuk menghapus catatan (Delete)
    public function deleteNote($id)
    {
        // Cari catatan berdasarkan id
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        // Hapus catatan
        $note->delete();

        return response()->json(['message' => 'Note deleted successfully']);
    }

    public function deletePelanggan($id)
    {
        // Cari pelanggan berdasarkan id
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json(['message' => 'Pelanggan not found'], 404);
        }

        // Hapus catatan
        $pelanggan->delete();

        return response()->json(['message' => 'Pelanggan deleted successfully']);   
    }
}

