<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminAdvertisementController extends Controller
{
    public function indexInactive(){
        $inactiveAdv = Advertisement::with(['category', 'user' ,'advimages'])->whereStatus('inactive')->orderBy('created_at', 'desc')->paginate(6);
        return view('admin_advertisement.inactive')-> with(compact('inactiveAdv'));
    }

    public function indexActive(){
        $activeAdv = Advertisement::with(['category', 'user' ,'advimages'])->whereStatus('active')->orderBy('created_at', 'desc')->paginate(6);
        return view('admin_advertisement.active')-> with(compact('activeAdv'));
    }

    public function makeActive($id){
        $adv = Advertisement::find($id);
        if(isset($adv)){
            $adv->status = 'active';
            $adv->save();
            return Redirect::to('/admin_advertisement/inactive');
        }
    }

    public function  destroyAdv($id){
        $adv= Advertisement::find($id);
        if(isset($adv)){
            $images = $adv->advimages;
            foreach ($images as $image){
                Storage::delete($image->image);
                $image->delete();
            }
            $adv->delete();
            return Redirect::back();
        }
    }
}
