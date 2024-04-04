@extends('layouts.app')

@section('content')
  <div class="container project-index">
    <h2 class="fs-4 text-secondary my-4">Project List</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Descrizione</th>
                {{-- <th>Link</th> --}}
                <th>Url Immagine</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{$project['title']}}</td>
                <td>{{$project['description']}}</td>
                {{-- <td><a href="{{$project['link']}}">{{$project['link']}}</a></td> --}}
                <td class="image-cell"><div><img src="{{$project['imageUrl']}}" alt="" class="image-fluid"></div></td>
                <td><a href="{{route('admin.projects.show', $project)}}">più dettagli...</a></td>
            </tr>
            @empty
            <tr>
                <td cell-span="4">Non ci sono progetti</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{$projects->links('pagination::bootstrap-5')}}
  </div>
@endsection
