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

        //se valida que los archivos sean tipo imagen
        $req->validate([
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png'
        ]);

        //se valida que haya por lo menos una imagen
        if($req->hasfile('imageFile')) {

            $arrayImages = array();

            //en caso de haber varias imagenes se recorre cada archivo (imagen)

                foreach($req->file('imageFile') as $file)
                {

                    $img_name = $file->getClientOriginalName();
                    $imagen = Image::make($file);
                    $filepath  = 'imagenes/new-'. $img_name;

                    //se le ajusta su nuevo ancho y alto x pixeles

                    $imagen->widen(796, function ($constraint) {
                        $constraint->upsize();
                    });
                    $imagen->heighten(1123, function ($constraint) {
                        $constraint->upsize();
                    });

                    //se le agrega orientación automaticamente según la imagen

                    $imagen->orientate();

                    //se guarda la imagen en la carpeta public para efectos de mantener archivos temp

                    if($imagen->save( public_path($filepath, 90))){
                        $subarray = array();

                        //se guarda los datos de la imagen en un array de archivos
                        $subarray['path'] = $filepath;
                        $subarray['name'] = $img_name;
                        $subarray['width'] = $imagen->width();
                        $subarray['height'] = $imagen->height();
                        $arrayImages[] = $subarray;
                    }
                }


                $page_size = $req->sizepage;

                //se renderiza las imagenes en una vista blade html para posteriormente ser mostrada en la página

                $view_hmtl = view('layouts.result_image',compact('arrayImages'))->render();

                return response()->json(['res' => 'Images have been resizing to '.$page_size.' paper-size successfully','view_html' => $view_hmtl]);




        }else{
            return response()->json(['err' => 'At least one image file is required.']);
        }

    }

}
