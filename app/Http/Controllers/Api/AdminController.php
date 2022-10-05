<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Datas;
use App\Http\Requests\DataRequest\AdminRequest;

class AdminController extends Controller
{
    public function add(AdminRequest $request) {
        $Datas = new Datas;
        $result = array('state'=>'', 'msg' => '', 'data'=>array());
        try {
            $Datas->recipe = $request->recipe;
            $Datas->ingredients = $request->ingredients;
            $Datas->directions = $request->directions;
            $Datas->save();
            $result['data'] = Datas::where('recipe', $request->recipe)->first();
            $result['state'] = 'success';
            $result['msg'] = 'You have successfully saved.';
        } catch(err){
            $result['state'] = 'error';
            $result['msg'] = 'Server error.';
        }
        return $result;
    }

    public function getAll() {
        $result = array('state'=>'', 'msg' => '', 'data'=>array());
        try {
            $result['data'] = Datas::all();
            $result['state'] = 'success';
            $result['msg'] = 'You have successfully got.';
        } catch(err){
            $result['state'] = 'error';
            $result['msg'] = 'Server error.';
        }
        return $result;
    }

    public function delete($id) {
        $Datas = new Datas;
        $result = array('state'=>'', 'msg' => '');
        try {
            Datas::destroy($id);
            $result['state'] = 'success';
            $result['msg'] = 'You have successfully deleted.';
        } catch(err){
            $result['state'] = 'error';
            $result['msg'] = 'Server error.';
        }
        return $result;
    }

    public function update(AdminRequest $request, $id) {
        $Datas = new Datas;
        $result = array('state'=>'', 'msg' => '', 'data'=>array());
        try {
            $Datas = Datas::find($id);
            $Datas->recipe = $request->input('recipe');
            $Datas->ingredients = $request->input('ingredients');
            $Datas->directions = $request->input('directions');
            $Datas->update();
            $result['data'] = Datas::where('id', $id)->first();
            $result['state'] = 'success';
            $result['msg'] = 'You have successfully deleted.';
        } catch(err){
            $result['state'] = 'error';
            $result['msg'] = 'Server error.';
        }
        return $result;
    }
}
