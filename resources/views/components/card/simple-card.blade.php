<div class="card">
    <img src="{{$imageSrc}}" class="card-img-top" />
    <div class="card-body">
      <h5 class="card-title">{{$title}}</h5>
      <p class="card-text">{{$body}}</p>
      @isset($extensionButton)
          {{$extensionButton}}
      @endisset
    </div>
  </div>
