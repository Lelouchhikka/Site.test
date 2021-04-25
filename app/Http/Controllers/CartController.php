<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
<<<<<<< Updated upstream
use App\Models\Product;
=======
use App\Models\News;
use App\Models\Opinion;
use App\Models\Product;
use App\Models\User;
use App\Models\Vacancy;
use Carbon\Carbon;
>>>>>>> Stashed changes
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    public function changeToRu(){
        session()->put('locale', 'ru');
        return back();
    }
    public function changeToEn(){
        session()->put('locale', 'en');
        return back();
    }
    public function shop()
    {
        $products = Product::all();
<<<<<<< Updated upstream
        return view('shop')->with(['products' => $products]);
=======
        $users=User::all();
        $opinions=Opinion::orderBy("date")->get()->reverse();
        $month=Carbon::today()->month;
        $BDUsers= array();
        $banners=Banner::all();
        $vacancies=Vacancy::all()->take(3);
        $news=News::all()->take(5);

        foreach ($users as $user){
            if(Carbon::parse($user->BirthDay)->month == $month){
                array_push($BDUsers,$user);
            }

    }
        foreach ($BDUsers as $user){
            $dt=Carbon::create($user->BirthDay);
            $user->BirthDay=$dt->format("d F");
        }
        return view('shop')->with([
            'products' => $products,
            'BDUsers'=>$BDUsers,
            'opinions'=>$opinions,
            'banners'=>$banners,
            'news'=>$news,
            'vacancies'=>$vacancies
        ]);
>>>>>>> Stashed changes

    }
    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart')->with(['cartCollection' => $cartCollection]);
    }
    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index');
    }
    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index');
    }
    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            ));
        return redirect()->route('cart.index');
    }
    public function clear(){
        \Cart::clear();
        return redirect()->route('home');
    }
}
