<div class="row py-2 m-0 justify-content-center d-flex">
    <div class="col-md-6 d-flex justify-content-center">
        <a onclick="location.reload()" class="btn btn-info">Convert Again</a>
    </div>
</div>

<div class="container padding_section">
    @if(count($arrayImages))
        @foreach($arrayImages as $image)
            <div class="card mb-15 card-custom">
                <div class="card-header">
                    <div class="card-title">
						<span class="card-icon"><i class="flaticon2-menu-4 text-primary"></i></span>
                        <h3 class="card-label">{{$image['name']}} - {{$image['width'].'x'.$image['height']}} pixels</h3>
                    </div>
                    <div class="card-toolbar">
                        <a download="{{$image['name']}}" data-toggle="tooltip" href="{{$image['path']}}"  class="btn btn-primary font-weight-bolder mr-2"><i style="color: white" class="la la-file-download"></i>Download</a>
                        <a type="button" onclick="printImage('{{$image['path']}}')" class="btn btn-primary font-weight-bolder"><i class="la la-print"></i>Print</a>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <img src="{{asset($image['path'])}}" class="img-fluid">
                </div>
            </div>
        @endforeach
    @endif
</div>
