<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#unread" role="tab" aria-controls="One" aria-selected="true"> {{Auth::user()->unreadNotifications->count() ?? 0}} New <i class="fa fa-comment  text-red-700"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#read" role="tab" aria-controls="Two" aria-selected="false">Read</a>
            </li>

          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="unread" role="tabpanel" aria-labelledby="one-tab">
@if(Auth::user()->unreadNotifications->count()>0)
  @foreach(Auth::user()->unreadNotifications as $n)
  <div class="alert alert-success my-2">
            <h5 class="card-title">{{$n->data['title']}}</h5>
            <p class="card-text">{{$n->data['msg']}}</p>
          </div>
       
    @endforeach
    @else
    <div class="alert alert-info">They are no new notifications</div>
    @endif
          </div>
          <div class="tab-pane fade p-3" id="read" role="tabpanel" aria-labelledby="two-tab">
            @if(Auth::user()->readNotifications->count()>0)
              @foreach(Auth::user()->readNotifications as $n)
            <h5 class="card-title">Tab Card Two</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            @endforeach
            @else
            <div class="alert alert-info">There are no read notifications</div>
            @endif
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
