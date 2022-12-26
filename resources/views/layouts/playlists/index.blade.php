<x-app-layout>
  <div class="page-inner">
    <div class="row">
      <div class="col">
        <h1 class="page-title">Playlists</h1>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col">
        <button class="btn btn-dark col-sm-12 col-md-3 col-lg-3 col-xl-2 my-2 mr-1" data-toggle="modal" data-target="#exampleModal">Create Playlist</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Playlist Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('playlists.store') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="title" id="" class="form-control" placeholder="Enter playlist title here">
                  </div>
                  <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Create">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      @foreach($playlists as $playlist)
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title float-left"><a href="{{ route('playlists.edit', ['playlist' => $playlist->id]) }}">{{$playlist->title}}</a></h4>
            <div class="dropdown">
              <i class="fas fa-ellipsis-v float-right" type="button" data-toggle="dropdown" aria-expanded="false"></i>
              <div class="dropdown-menu">
                <a href="" class="dropdown-item">Edit Title</a>
                <form class="dropdown-item" action="{{ route('playlists.destroy', $playlist->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Delete">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-app-layout>