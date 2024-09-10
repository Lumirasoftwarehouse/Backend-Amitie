<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // Menampilkan semua catatan
    public function listNote()
    {
        $dataNotes = Note::get();

        return response()->json(['message' => 'success', 'data' => $dataNotes]);
    }

    // Fungsi untuk menambah catatan (Insert)
    public function createNote(Request $request)
    {
        // Validasi untuk menerima array input
        $validateData = $request->validate([
            'notes' => 'required|array',
            'notes.*.alamat' => 'required',
            'notes.*.tanggal' => 'required',
            'notes.*.pelanggan' => 'required',
            'notes.*.proses' => 'required',
            'notes.*.atas_nama' => 'required',
            'notes.*.kendaraan' => 'required',
            'notes.*.no_polisi' => 'required',
            'notes.*.keterangan' => 'required',
            'notes.*.stnk_resmi' => 'required',
            'notes.*.jasa' => 'required',
            'notes.*.lain_lain' => 'required'
        ]);
    
        // Iterasi melalui array notes untuk menyimpan beberapa Note
        foreach ($validateData['notes'] as $noteData) {
            Note::create([
                'alamat' => $noteData['alamat'],
                'tanggal' => $noteData['tanggal'],
                'pelanggan' => $noteData['pelanggan'],
                'proses' => $noteData['proses'],
                'atas_nama' => $noteData['atas_nama'],
                'kendaraan' => $noteData['kendaraan'],
                'no_polisi' => $noteData['no_polisi'],
                'keterangan' => $noteData['keterangan'],
                'stnk_resmi' => $noteData['stnk_resmi'],
                'jasa' => $noteData['jasa'],
                'lain_lain' => $noteData['lain_lain'],
                'total' => $noteData['jasa'] + $noteData['lain_lain'], // Perhitungan total
            ]);
        }
    
        return response()->json(['message' => 'Notes created successfully']);
    }
    

    // Fungsi untuk mengupdate catatan (Update)
    public function updateNote(Request $request, $id)
    {
        // Validasi input
        $validateData = $request->validate([
            'alamat' => 'required',
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
            'alamat' => $validateData['alamat'],
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
}

