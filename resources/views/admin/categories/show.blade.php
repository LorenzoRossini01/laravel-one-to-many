@extends('layouts.app')

@section('content')
  <div class="container category-show">
    <h2 class="fs-4 text-secondary my-4">category Details</h2>

    <div class="card">
        <div class="card-header">
            <h2>{{$category->label}}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <p>{{$category->color}}</p>                    
                    <div class="my-2">
                      {!!$category->getBadge()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6">
            <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-warning w-100">Edit category details</a>
        </div>
        <div class="col-6">
            <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $category->id }}">Delete category</button>
        </div>
    </div>


  </div>
  <div class="modal fade" id="delete-modal-{{ $category->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $category->id }}-label"
    aria-hidden="true">

    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="">
      @method('DELETE')
      @csrf

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="delete-modal-{{ $category->id }}-label">Conferma eliminazione</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-start">
            Stai eliminando la categoria "{{ $category->label }}". L'operazione non è reversibile

            <p class="mt-2"><strong class="text-danger">Attenzione:</strong> Scegli l'azione da eseguire con i progetti associati alla categoria "{{ $category->label }}"</p>
            
            <select name="delete-action" id="" class="form-select ">
            <option value="delete">Cancella</option>
            @foreach($categories as $category_options)
            @if($category_options->id!=$category->id)
            <option value="{{$category_options->id}}">Associa a {{$category_options->label}}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>



            <button type="submit" class="btn btn-danger">Conferma modifiche</button>
          </div>
        </div>
      </div>

    </form>

  </div>
@endsection


