<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;

class IndexController extends Controller
{
    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();

        if ($data['keywords']) {
            $truyen = Truyen::where('kichhoat', 0)->where('tentruyen', 'LIKE', '%' . $data['keywords'] . '%')->get();

            $output = '<ul class="dropdown-menu-2" style="display: block;">';

            foreach ($truyen as $key => $tr) {
                $output .= '<li class="li_search_ajax"><a href="#">' . $tr->tentruyen . '</a></li>';
            }
            $output .= '</u>';
            echo $output;
        }
    }

    public function home()
    {
        $slide_truyen = Truyen::orderBy('id', 'DESC')->take(8)->get();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai', 'slide_truyen'));
    }

    public function doctruyen($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhmucTruyen::where('slugdanhmuc', $slug)->first();

        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 0)
            ->where('danhmuc_id', $danhmuc_id->id)
            ->get();

        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'theloai', 'danhmuc_id'));
    }

    public function xemtheloai($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $theloai_id = Theloai::where('slugtheloai', $slug)->where('kichhoat', 0)->first();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::with('theloai')->where('theloai_id', $theloai_id->id)->get();

        return view('pages.theloai')->with(compact('theloai', 'danhmuc', 'theloai_id', 'tentheloai', 'truyen'));
    }

    public function xemtruyen($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen')
            ->where('slugtruyen', $slug)
            ->where('kichhoat', 0)
            ->first();

        $chapter_moinhat = Chapter::with('truyen')
            ->where('truyen_id', $truyen->id)
            ->orderBy('id', 'DESC')
            ->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')
            ->where('danhmuc_id', $truyen->danhmuctruyen->id)
            ->whereNotIn('id', [$truyen->id])
            ->where('kichhoat', 0)
            ->get();

        $truyenmoi = Truyen::orderBy('id', 'DESC')
        ->where('truyen_noibat', 0)
        ->whereNotIn('id', [$truyen->id])
        ->take(5)
        ->get();

        $truyen_theloai = Truyen::with('theloai')
        ->where('theloai_id', $truyen->theloai->id)
        ->whereNotIn('id', [$truyen->id])
        ->where('kichhoat', 0)
        ->get();


        $chapter_first = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();

        $chapter = Chapter::with('truyen')->where('truyen_id', $truyen->id)->get();

        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'cungdanhmuc', 'chapter_first', 'theloai', 'chapter_moinhat', 'truyen_theloai', 'truyenmoi'));
    }

    public function xemchapter($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $truyen_id = Chapter::where('slugchapter', $slug)
            ->where('kichhoat', 0)
            ->first();

        $chapter = Chapter::with('truyen')
            ->where('slugchapter', $slug)
            ->where('truyen_id', $truyen_id->truyen_id)
            ->where('kichhoat', 0)
            ->first();

        $all_chapter = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen_id->truyen_id)
            ->get();

        $danhmuc_new = Truyen::with('danhmuctruyen', 'theloai')
            ->where('id', $truyen_id->truyen_id)
            ->first();

        $previous_chapter = Chapter::with('truyen')
            ->where('truyen_id', $truyen_id->truyen_id)
            ->where('id', '<', $truyen_id->id)
            ->max('slugchapter');

        $next_chapter = Chapter::with('truyen')
            ->where('truyen_id', $truyen_id->truyen_id)
            ->where('id', '>', $truyen_id->id)
            ->min('slugchapter');

        $min_id = Chapter::where('truyen_id', $truyen_id->truyen_id)
            ->orderBy('id', 'ASC')
            ->first();

        $max_id = Chapter::where('truyen_id', $truyen_id->truyen_id)
            ->orderBy('id', 'DESC')
            ->first();


        return view('pages.chapter')->with(compact('danhmuc', 'danhmuc_new', 'chapter', 'all_chapter', 'previous_chapter', 'next_chapter', 'min_id', 'max_id', 'theloai'));
    }

    public function timkiem(Request $request)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $chapter = Chapter::orderBy('id', 'DESC')->get();
        $data = $request->all();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')
            ->where('tentruyen', 'like', '%' . $tukhoa . '%')
            ->orWhere('tacgia', 'like', '%' . $tukhoa . '%')
            ->get();

        return view('pages.timkiem')->with(compact('theloai', 'danhmuc', 'chapter', 'truyen', 'tukhoa'));
    }
}
