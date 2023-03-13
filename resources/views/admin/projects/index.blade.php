@extends('layouts.admin')
@section('content')
<div>
    <a class="d-flex justify-content-end" href="{{route('admin.projects.create')}}">
        <button class="btn btn-primary m-3">Crea nuovo progetto</button>
    </a>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Slug</th>
            <th scope="col">type</th>
            <th scope="col">technology</th>
            <th scope="col">Elimina</th>
            <th scope="col">Modifica</th>
            <th scope="col">Vedi</th>
            
          </tr>
        </thead>
        <tbody>
            @forelse ($projects as $item)
            <tr>
              <td>{{$item->title}}</td>
              <td>{{$item->content}}</td>
              <td>{{$item->slug}}</td>
              <td>{{$item['type'] ? $item['type']['name'] : 'nessun tipo'}}</td>
              {{-- <td>
                @forelse ($item['technologies'] as $tech)
                    {{ $loop->first ? '' : ',' }}
                    <span>{{ $tech['name'] }}</span>
                @empty
                    <div>nessuna tech</div>
                @endforelse
            </td> --}}
            <td>
              @forelse ($item->technologies as $tech )
              {{$tech['name']}}

                
              @empty
              nessuna tecnologia 
              @endforelse
            </td>
              
              <td>
                <div>
                  <form action="{{route('admin.projects.destroy', ['project' => $item['slug']] )}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                  </form>
              </div>
              </td>
              <td>
                <a href="{{route('admin.projects.edit', $item->slug)}}">
                  <button class="btn btn-secondary">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </button>
                </a>
              </td>
              <td>
                <a href="{{route('admin.projects.show', $item->slug)}}">
                  <button class="btn btn-warning">
                    <i class="fa-solid fa-eye"></i>
                  </button>
                </a>
              </td>
            </tr>
            @empty
            <div class="alert alert-primary" role="alert">
                Nessuna progetto disponibile
              </div>
            @endforelse
        </tbody>
      </table>
</div>
@endsection