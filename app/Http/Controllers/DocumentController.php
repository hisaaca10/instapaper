<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Response;
use Illuminate\Http\Request;
use \PDF;
use Intervention\Image\ImageManagerStatic as Image;
class DocumentController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request){

    }




    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function imagesUploadPost(Request $req)

    {
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png'
        ]);

        if($req->hasfile('imageFile')) {

            $arrayImages = array();


                foreach($req->file('imageFile') as $file)
                {
                    $img_name = $file->getClientOriginalName();
                    $imagen = Image::make($file);
                    $filepath  = 'imagenes/new-'. $img_name;
                    $imagen->widen(796, function ($constraint) {
                        $constraint->upsize();
                    });
                    $imagen->heighten(1123, function ($constraint) {
                        $constraint->upsize();
                    });
                    $imagen->orientate();
                    if($imagen->save( public_path($filepath, 90))){
                        $subarray = array();
                        $subarray['path'] = $filepath;
                        $subarray['name'] = $img_name;
                        $subarray['width'] = $imagen->width();
                        $subarray['height'] = $imagen->height();
                        $arrayImages[] = $subarray;
                    }
                }

                $page_size = $req->sizepage;

                $view_hmtl = view('layouts.result_image',compact('arrayImages'))->render();

                return response()->json(['res' => 'Images have been resizing to '.$page_size.' paper-size successfully','view_html' => $view_hmtl]);




        }else{
            return response()->json(['err' => 'At least one image file is required.']);
        }

    }

}
