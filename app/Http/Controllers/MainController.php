<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qaqpalar;
use App\Http\Requests\QaqpalarRequest;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller{

    public function submit(Request $req) {
        $qaqpa = new Qaqpalar();
        $qaqpa->name = $req->input('name');
        $qaqpa->price = $req->input('price');
        $qaqpa->height = $req->input('height');
        $qaqpa->width = $req->input('width');
        $qaqpa->widthType = $req->input('widthType');
        $qaqpa->timepreparty = $req->input('timepreparty');
		$path = Storage::disk('cst_public')->putFile('uploads',$req->file('image'));
        $qaqpa->imageUrl = $path;
        if($req->get('delivery')=="on"){$qaqpa->delivery = 1;}
        else{$qaqpa->delivery = 0;}
        if($req->get('install')=="on"){$qaqpa->install = 1;}
        else{$qaqpa->install = 0;}

        $qaqpa->save();

        return redirect()->route('adminPanel');
}
    public function redact($id, Request $req) {
        $qaqpa = Qaqpalar::find($id);

        $qaqpa->name = $req->input('name');
        $qaqpa->price = $req->input('price');
        $qaqpa->height = $req->input('height');
        $qaqpa->width = $req->input('width');
        $qaqpa->widthType = $req->input('widthType');
        $qaqpa->timepreparty = $req->input('timepreparty');

        if($req->file('image')!=''){
            Storage::disk('cst_public')->delete($qaqpa->imageUrl);
            $path = Storage::disk('cst_public')->putFile('uploads',$req->file('image'));
            $qaqpa->imageUrl = $path;
        }

        if($req->get('delivery')=="on"){$qaqpa->delivery = 1;}
        else{$qaqpa->delivery = 0;}
        if($req->get('install')=="on"){$qaqpa->install = 1;}
        else{$qaqpa->install = 0;}

        $qaqpa->save();

        return redirect()->route('layout');
}
    public function deleteItem($id) {
        $qaqpa = Qaqpalar::find($id);
        Storage::disk('cst_public')->delete($qaqpa->imageUrl);
        $qaqpa->delete();
        return redirect()->route('layout');
    }

    public function allData() {
        $pageId = 1;
        $qaqpa = new Qaqpalar;
        return view('layout',['data' => $qaqpa -> skip(0) -> take(12) -> get(), 'page' => $pageId, 'dataItems' => $qaqpa -> count()]);
    }

    public function filter($from, $to) {
       $pageId = 1;
        $qaqpa = Qaqpalar::whereBetween('price',[$from,$to])->orderBy('price');
        return view('layout',['data' => $qaqpa -> skip(0) -> take(12) -> get(), 'page' => $pageId, 'dataItems' => $qaqpa -> count()]);
    }

    public function setPage($pagenum) {
        $qaqpa = new Qaqpalar;
        return view('layout',['data' => $qaqpa -> skip(($pagenum-1)*12) -> take(($pagenum-1)*12+12) -> get(),'page' => $pagenum, 'dataItems' => $qaqpa -> count()]);
    }
    public function setItem($itemId) {
        $qaqpa = new Qaqpalar;
        return view('adminLayout.adminPanelRedact',['item' => $qaqpa->find($itemId)]);
    }

}
