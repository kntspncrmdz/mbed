<x-app-layout>
  <style>
    iframe {
      width: 100%;
      height: auto;
    }
  </style>

  <div class="page-inner">
    <div class="row">
      <div class="col">
        <h1 class="page-title">{{ $playlist->title }}</h1>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col">
        <button class="btn btn-dark col-sm-12 col-md-3 col-lg-3 col-xl-2 my-2 mr-1" data-toggle="modal" data-target="#exampleModal">Add Item</button>
        <button class="btn btn-danger btn-border col-sm-12 col-md-3 col-lg-3 col-xl-2">Delete Playlist</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Embed Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  @csrf
                  <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">
                  <div class="form-group">
                    <textarea name="item" id="" cols="30" rows="10" class="form-control" placeholder="Paste ebmed code here"></textarea>
                  </div>
                  <div class="form-group">
                    <input class="btn btn-default" type="submit" value="Add">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($items as $item)
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">
            <div class="dropdown">
              <i class="fas fa-ellipsis-v float-right" type="button" data-toggle="dropdown" aria-expanded="false"></i>
              <div class="dropdown-menu">
                <a href="" class="dropdown-item">Edit</a>
                <a href="" class="dropdown-item">Remove</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            {{ $item->item }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</x-app-layout>