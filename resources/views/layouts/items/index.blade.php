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
        <button class="btn btn-dark col-sm-12 col-md-3 col-lg-3 col-xl-2 my-2 mr-1" data-toggle="modal" data-target="#addItemModal">Add Item</button>
        <button class="btn btn-danger btn-border col-sm-12 col-md-3 col-lg-3 col-xl-2">
          <form action="{{ route('playlists.destroy', $playlist->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Playlist" style="cursor: pointer;">
          </form>
        </button>
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
                <a href="" class="dropdown-item" data-toggle="modal" data-target="#editItemModal{{ $loop->iteration }}">Edit</a>
                <form class="dropdown-item" action="{{ route('items.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Remove" style="cursor: pointer;">
                </form>
              </div>
            </div>
          </div>
          <div class="card-body">
            {!! $item->item !!}
          </div>
        </div>
      </div>

      <!--Edit Item Modal -->
      <div class="modal fade" id="editItemModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="editItemModalLabel{{ $loop->iteration }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editItemModalLabel{{ $loop->iteration }}">Embed Code</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('items.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <div class="form-group">
                  <textarea name="item" id="" cols="30" rows="10" class="form-control" placeholder="Paste ebmed code here">{{ $item->item }}</textarea>
                </div>
                <div class="form-group">
                  <input class="btn btn-default" type="submit" value="Save">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addItemModalLabel">Embed Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('items.store') }}" method="post">
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
</x-app-layout>