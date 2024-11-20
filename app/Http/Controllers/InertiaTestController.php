<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;


class InertiaTestController extends Controller
{
    //
    public function index(){

        return Inertia::render('Inertia/Index',[
            // モデルを通じて全データ取得
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create(){

        return Inertia::render('Inertia/Create');
    }

    public function show($id){

        // dd($id);
        // js/PagesのInertia/Show.vueを指定している。
        return inertia::render('Inertia/Show',
        [
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request){

        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            // フラッシュメッセージ流れ１
            // セッションの設定
            'message' => '登録しました。'
        ]);
    }

    public function delete($id){

        $book = InertiaTest::findOrFail($id);
        $book -> delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました。'
        ]);
    }







}
