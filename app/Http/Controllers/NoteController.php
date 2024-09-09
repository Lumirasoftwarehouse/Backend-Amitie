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
        $validateData = $request->validate([
            'proses' => 'required',
            'atas_nama' => 'required',
            'kendaraan' => 'required',
            'no_polisi' => 'required',
            'keterangan' => 'required',
            'stnk_resmi' => 'required',
            'jasa' => 'required',
            'lain_lain' => 'required'
        ]);

        Note::create([
            'proses' => $validateData['proses'],
            'atas_nama' => $validateData['atas_nama'],
            'kendaraan' => $validateData['kendaraan'],
            'no_polisi' => $validateData['no_polisi'],
            'keterangan' => $validateData['keterangan'],
            'stnk_resmi' => $validateData['stnk_resmi'],
            'jasa' => $validateData['jasa'],
            'lain_lain' => $validateData['lain_lain'],
            'total' => $validateData['lain_lain'],
        ]);

        return response()->json(['message' => 'Note created successfully']);
    }

    // Fungsi untuk mengupdate catatan (Update)
    public function updateNote(Request $request, $id)
    {
        // Validasi input
        $validateData = $request->validate([
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
