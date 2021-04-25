<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::query()
            ->latest()
            ->paginate(5);

        return view('banner.banners',[
            'banners'=>$banners
        ]);
    }
    public function show(Banner $banner)
    {
        return view('banner.show', [
            'banner'=>$banner
        ]);
    }
    public function create()
    {
        return view('banner.create');
    }

    public function store(BannerRequest $request)
    {
        Banner::create($request->validatedWithImage());
        return redirect()->route('banner.index');
    }
    public function destroy(Banner $banner)
    {
        $banner->deleteImage();
        $banner->delete();
        return redirect()->route('banner.index');
    }
}
