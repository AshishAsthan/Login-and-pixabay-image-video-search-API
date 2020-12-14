@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                <div class="card-body">
                <div class="card-header">Search Image ANd Video</div>
                <div class="col-md-4" style="padding:2%;">
                <div class="form-group row">
                    <input type="text" id="textName" placeholder="Enter Image and Video Name" class="form-control">
                </div>
                <div class="form-group row">
                    <input type="radio" id="image" name="image" class="image" value="Image"> image:
                    <input type="radio" id="video" name="image" class="image" value="Video"> video:
                </div>
                <div class="form-group row">
                    <a href="javascript:void(0);" class="btn btn-primary btn-xlg" onclick="sendString(document.getElementById('textName').value)">Submit</a>
                </div>
               </div>
               </div>
                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                </div> -->
        </div>
       </div>
    <div class="container">
  <div class="row" id="galleryalbum">
    
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   
    function sendString(textName)
    {
      var selValueByClass = $(".image:checked").val();
        console.log(selValueByClass);
      
      var li = '';
      var name= textName ;
	  if(name==null || name=="")
	  {
	  alert("Required! Search Value");
	  return;
	  }
      var RdoImage=selValueByClass;
      var Rdovideo=selValueByClass;
      //image 
     
if(name!='' && RdoImage=="Image")
{
  debugger;
  var API_KEY = '19365586-2070b52e753412e66f2c5296b';
  var URL = "https://pixabay.com/api/?key="+API_KEY+"&q="+encodeURIComponent(name);
$.getJSON(URL, function(data){

  console.log('print array',data);
    if(data==null || data=="")
	  {
	  alert("No search keyword mathed");
	  return;
	  }
  $.each(data.hits, function (i, hit) {

        li += '<div class="col-md-3"><img src="'+ hit.webformatURL +'" style="width: 250px;"></div>';
    });
    $('#galleryalbum').empty();
    $('#galleryalbum').append(li);

});
}
// image end 
// video

else if(name!='' && RdoImage=="Video")
{
  debugger;
  var API_KEY = '19365586-2070b52e753412e66f2c5296b';
  var URL = "https://pixabay.com/api/videos/?key="+API_KEY+"&q="+encodeURIComponent(name);
$.getJSON(URL, function(data){

  console.log('video',data);
 
  $.each(data.hits, function (i, hit) {
    $.each(hit.videos,function(i,video){
     
       li += '<div class="col-md-3"><video width="320" height="240" controls>'+
  '<source src="'+ video.url +'" type="video/mp4">'+
  '<source src="movie.ogg" type="video/ogg">'+
'</video> </div>';
    })

    });
   
    $('#galleryalbum').empty();
    $('#galleryalbum').append(li);
}	  
);
}
     
      
    }
    </script>
@endsection
