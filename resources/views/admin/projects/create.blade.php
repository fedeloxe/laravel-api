@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                  @if ($errors->any())
                      <ul class="text-danger">
                          @foreach ($errors->all() as $error)
                              <li>
                                  {{ $error }}
                              </li>
                          @endforeach
                      </ul>
                  @endif
              </div>
              

                <div class="mb-3">
                  <label for="" class="form-label">Aggiungi titolo</label>
                  <input type="text" class="form-control" id="" aria-describedby="" name="title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Aggiungi contenuto</label>
                    <textarea rows="5" class="form-control" id="" aria-describedby="" name="content"></textarea>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Seleziona type</label>
                    <select name="type_id" id="type_id">
                      @foreach ($types as $item)
                      <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Seleziona tecnologia</label>
                    @foreach ($technologies as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="technologies[]">
                        <label class="form-check-label">
                            {{ $item['name'] }}
                        </label>
                    </div>
                @endforeach
                </div>

                <div class="form-group my-3">
                    <label class="control-label">Copertina</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control
                    @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                    <div class="text-danger">
                    @enderror
                </div>
                
                
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Crea il nuovo Post</button>
                </div>
              </form>

        </div>
    </div>
</div>
@endsection