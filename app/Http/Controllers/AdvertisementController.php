<?php
namespace App\Http\Controllers;
use App\Http\Requests\AdvertisementRequest;
use App\Advertisement;
use App\AdvImage;
use App\Http\Requests\AdvimageRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class AdvertisementController extends Controller
{
    public function indexActive()
    {
        $user = Auth::user()->id;
        $activeAdv = Advertisement::with(['category', 'user' ,'advimages'])->whereStatus('active')->whereUserId($user)->orderBy('created_at', 'desc')->paginate(6);
        return view('/advertisements/activeUserAdv')-> with(compact('activeAdv'));
    }
    public function indexInactive()
    {
        $user = Auth::user()->id;
        $activeAdv = Advertisement::with(['category', 'user' ,'advimages'])->whereStatus('inactive')->whereUserId($user)->orderBy('created_at', 'desc')->paginate(6);
        return view('/advertisements/activeUserAdv')-> with(compact('activeAdv'));
    }
    public function create()
    {
        return view('advertisements.create');
    }
    public function store(AdvertisementRequest $request)
    {
        $advertisement = new Advertisement();
        $advertisement->user_id = Auth::user()->id;
        $advertisement->title = $request->title;
        $advertisement->description = $request->description;
        $advertisement->status = 'inactive';
        if (($request->child) != '') {
            $advertisement->category_id = $request->child;
        } elseif (($request->child) == '' && ($request->par) != '') {
            $advertisement->category_id = $request->par;
        }
        $advertisement->save();
        if (($request->images) != []) {
            foreach ($request->images as $image) {
                $filename = $image->store('/public/images');
                AdvImage::create([
                    'advertisement_id' => $advertisement->id,
                    'image' => $filename
                ]);
            }
        }
        return Redirect::to('/advertisements/' . $advertisement->id . '/edit');
    }
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        if (!isset($advertisement)) {
            abort(402);
        } else {
            if ($advertisement->user_id == Auth::user()->id) {
                $images = AdvImage::whereAdvertisement_id($advertisement->id)->get();
                $images = $images->sortBy('id');
                return View::make('advertisements.edit', [
                    'advertisement' => $advertisement,
                    'images' => $images,
                ]);
            } else {
                abort(401);
            }
        }
    }
    public function update(AdvertisementRequest $request, $id)
    {
        if((Auth::user()->id) == (Advertisement::find($id)->user_id)){
            $advertisement = Advertisement::find($id);
            if(!isset($advertisement)){
                abort(402);
            }
            else{
                $advertisement->status='inactive';
                $advertisement->title = $request->title;
                $advertisement->description=$request->description;
                $advertisement->save();
                return Redirect::to('/showForUser/' . $id);
            }
        }
        else{
            abort(401);
     }
    }

    public function updateOnImg(AdvimageRequest $request, $id)
    {
        $filename = $request->file('image')->store('/public/images');
        AdvImage::create([
            'advertisement_id' => $id,
            'image' => $filename
        ]);
        $advertisement = Advertisement::find($id);
        $advertisement->status = 'inactive';
        return Redirect::to('/advertisements/'. $id. '/edit');
    }

    public function showForAll($id)
    {
        $showedAdv = Advertisement::find($id);
        $images = AdvImage::whereAdvertisement_id($id)->get();
        $creator = User::whereId($showedAdv->user_id)->first();
        $url = Storage::url($creator->avatar);
        if(!isset($showedAdv)){
            abort(402);
        }
        else{
                return View::make('advertisements.showForAll', [
                    'adv' => $showedAdv,
                    'images' => $images,
                    'creator' => $creator,
                    'creator_url' =>$url,
                ]);
        }
    }

    public function showForUser($id)
    {
        $showedAdv = Advertisement::find($id);
        $images = AdvImage::whereAdvertisement_id($id)->get();
        if(!isset($showedAdv)){
            abort(402);
        }
        else{
            return View::make('advertisements.show', [
                'adv' => $showedAdv,
                'images' => $images
            ]);
        }
    }
    public function destroyImage($id){
        $advimage = AdvImage::find($id);
        if(!isset($advimage)){
            abort(402);
        }
        else{
            $page = $advimage -> advertisement_id;
            Storage::delete($advimage->image);
            $advimage->delete();
            return Redirect::to('/advertisements/' . $page . '/edit');
        }
    }

    public function destroyAdv($id){
            $adv= Advertisement::find($id);
            if(isset($adv) && $adv->user_id == Auth::user()->id){
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
