<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chaptertruyen = Chapter::with('truyen')->orderBy('id', 'ASC')->get();
        return view('admincp.chapter.index')->with(compact('chaptertruyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admincp.chapter.create')->with(compact('truyen'));
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
                'tenchapter' => 'required',
                'slugchapter' => 'required|unique:chapter',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ],
            [
                'tenchapter.required' => 'Vui lòng nhập tên chapter',
                'slugchapter.required' => 'Vui lòng nhập slug chapter',
                'tomtat.required' => 'Vui lòng nhập tóm tắt',
                'noidung.required' => 'Vui lòng nhập nội dung chapter',
            ]
        );


        $tenchapter = new Chapter();
        $tenchapter->tenchapter = $data['tenchapter'];
        $tenchapter->slugchapter = $data['slugchapter'];
        $tenchapter->truyen_id = $data['truyen_id'];
        $tenchapter->tomtat = $data['tomtat'];
        $tenchapter->noidung = $data['noidung'];
        $tenchapter->kichhoat = $data['kichhoat'];
        $tenchapter->save();

        return redirect()->back()->with('status', 'Thêm chapter thành công !');
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id', 'ASC')->get();
        return view('admincp.chapter.edit')->with(compact('truyen', 'chapter'));
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
                'tenchapter' => 'required',
                'slugchapter' => 'required',
                'tomtat' => 'required',
                'noidung' => 'required',
                'kichhoat' => 'required',
                'truyen_id' => 'required',
            ],
            [
                'tenchapter.required' => 'Vui lòng nhập tên chapter',
                'tenchapter.unique' => 'Tên chapter đã tồn tại, vui nhập tên khác',
                'slugchapter.required' => 'Vui lòng nhập slug chapter',
                'tomtat.required' => 'Vui lòng nhập tóm tắt',
                'noidung.required' => 'Vui lòng nhập nội dung chapter',
            ]
        );


        $tenchapter = Chapter::find($id);
        $tenchapter->tenchapter = $data['tenchapter'];
        $tenchapter->slugchapter = $data['slugchapter'];
        $tenchapter->truyen_id = $data['truyen_id'];
        $tenchapter->tomtat = $data['tomtat'];
        $tenchapter->noidung = $data['noidung'];
        $tenchapter->kichhoat = $data['kichhoat'];
        $tenchapter->save();

        return redirect()->back()->with('status', 'Cập nhật chapter thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa chapter thành công !');
    }
}
