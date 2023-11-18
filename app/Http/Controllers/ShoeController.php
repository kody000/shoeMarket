<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shoes.index', [
            'shoes' => Shoe::latest()->filter(
                        request(['search'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function apiIndex()
    {
        return [
            'shoes' => Shoe::latest()->filter(
                        request(['search'])
                    )->paginate(18)->withQueryString()
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->input('name');
        $thumbnail = $request->file('thumbnail')->getClientOriginalName();
        $color = $request->input('color');
        $size = $request->input('size');
        $price = $request->input('price');
        $data = array('user_id'=>request()->user()->id, 'name'=>$name,"thumbnail"=>$thumbnail,"color"=>$color,"size"=>$size, "price"=>$price,);
        Shoe::create($data);

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shoe $shoe)
    {
         $shoe->update(['user_id' => request()->user()->id]);

         return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function show(Shoe $shoe)
    {
        return view('shoes.show', [
            'shoe' => $shoe
        ]);
    }

    public function apiShow(Shoe $shoe)
    {
        return [
            'shoe' => $shoe
        ];
    }

    public function showPlacing()
    {
        return view('shoes.create');
    }

    public function showCart(Request $request)
    {
        return view('shoes.cart', [
            'shoes' => request()->user()->shoes,
        ]);
    }

    public function removeFromCart(Request $request, Shoe $shoe)
    {
        $shoe->update(['user_id' => null]);
        
        return view('shoes.cart', [
            'shoes' => request()->user()->shoes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoe $shoe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoe  $shoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shoe $shoe)
    {
        //
    }
}
