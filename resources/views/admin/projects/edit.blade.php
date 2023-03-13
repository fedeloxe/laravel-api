@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">

            <form action="{{route('admin.projects.update', ['project' => $project['slug']])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                  <input type="text" class="form-control" id="" aria-describedby="" name="title" value="{{old('title') ?? $project->title}}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Aggiungi contenuto</label>
                    <textarea rows="5" class="form-control" id="" aria-describedby="" name="content"></textarea value="{{old('content') ?? $project->content}}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Seleziona type</label>
                    <select name="type_id" id="type_id">
                      @foreach ($types as $item)
                      <option value="{{ $item['id']}}" {{$item['id'] == old('type_id', $project['type_id']) ? 'selected' : ''}}>{{$item['name']}}</option>
                      @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="" class="form-label">Seleziona technologia</label>
                    @foreach ($technologies as $item)
                        <div class="form-check @error('') is-invalid @enderror">
                            @if ($errors->any())
                                <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}" name="technologies[]"
                                    {{ in_array($item['id'], old('technologies', [])) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $item['name'] }}
                                </label>
                            @else
                                <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}" name="technologies[]"
                                    {{ $project['technologies']->contains($item) ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $item['name'] }}
                                </label>
                            @endif
                        </div>
                    @endforeach
                </div> --}}
                <div class="mb-3">
                    <label for="" class="form-label">Seleziona tecnologia</label>
                    @foreach ($technologies as $item)
                    <div class="form-check @error('technologies')
                    is-invalid
                    @enderror">
                    @if ($errors->any())
                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="technologies[]"
                    {{in_array($item->id,old('technologies',[]))?'checked':''}}>
                        <label class="form-check-label">
                            {{ $item['name'] }}
                        </label>
                    @else
                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="technologies[]"
                    {{$project->technologies->contains($item)?'checked':''}}>
                        <label class="form-check-label">
                            {{ $item['name'] }}
                        </label>
                        
                    @endif

                        {{-- <input class="form-check-input" type="checkbox" value="{{ $item->id }}" name="technologies[]">
                        <label class="form-check-label">
                            {{ $item['name'] }}
                        </label> --}}
                    </div>
                @endforeach
                </div>
                <div class="form-group my-3">
                    <label class="control-label">Copertina</label>
                    <div>
                    <img src="{{asset('storage/' .$project->cover_image)}}" class="w-50">
                    </div>
                    <input type="file" name="cover_image" id="cover_image" class="form-control
                    @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                    <div class="text-danger">{{$message}} </div>
                    @enderror
                </div>
                

                
                
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">Modifica il Post</button>
                </div>
              </form>

        </div>
    </div>
</div>
@endsection