<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id', 'ASC')->get();
        return view('admincp.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentheloai' => 'required|unique:theloai|max:255|',
                'slugtheloai' => 'required|unique:theloai|max:255|',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại',
                'mota.required' => 'Vui lòng nhập mô tả',
                'tentheloai.unique' => 'Tên thể loại đã tồn tại, vui lòng nhập tên khác',
            ]
        );


        $danhmuctruyen = new Theloai();
        $danhmuctruyen->tentheloai = $data['tentheloai'];
        $danhmuctruyen->slugtheloai = $data['slugtheloai'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();

        return redirect()->back()->with('status', 'Thêm thể loại truyện thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = Theloai::find($id);
        return view('admincp.theloai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'tentheloai' => 'required|max:255|',
                'slugtheloai' => 'required|max:255|',
                'mota' => 'required|max:255',
                'kichhoat' => 'required',
            ],
            [
                'tentheloai.required' => 'Vui lòng nhập tên thể loại',
                'mota.required' => 'Vui lòng nhập mô tả',
            ]
        );


        $danhmuctruyen = Theloai::find($id);
        $danhmuctruyen->tentheloai = $data['tentheloai'];
        $danhmuctruyen->slugtheloai = $data['slugtheloai'];
        $danhmuctruyen->mota = $data['mota'];
        $danhmuctruyen->kichhoat = $data['kichhoat'];
        $danhmuctruyen->save();

        return redirect()->back()->with('status', 'Cập nhật thể loại truyện thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Theloai::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa thể loại truyện thành công !');
    }
}
