<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryLikeBan;
use App\Models\HistoryLikeSuspensi;
use App\Models\HistoryLikeVelg;

class HistoryLikeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil id_user dari session (pastikan sebelumnya sudah diset saat login)
        $id_user = session('id_user');

        // Ambil data like dari masing-masing model yang sesuai dengan user yang sedang login
        $historyBan = HistoryLikeBan::where('id_user', $id_user)->get();
        $historyVelg = HistoryLikeVelg::where('id_user', $id_user)->get();
        $historySuspensi = HistoryLikeSuspensi::where('id_user', $id_user)->get();

        return view('UserPage.historyLike', compact('historyBan', 'historyVelg', 'historySuspensi'));
    }

    public function deleteBan($id)
    {
        HistoryLikeBan::where('id_history_like_ban', $id)->delete();
        return back()->with('success', 'Data Ban berhasil dihapus.');
    }

    public function deleteVelg($id)
    {
        HistoryLikeVelg::where('id_history_like_velg', $id)->delete();
        return back()->with('success', 'Data Velg berhasil dihapus.');
    }

    public function deleteSuspensi($id)
    {
        HistoryLikeSuspensi::where('id_history_like_suspensi', $id)->delete();
        return back()->with('success', 'Data Suspensi berhasil dihapus.');
    }
}
