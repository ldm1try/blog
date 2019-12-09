@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
   @php /** @var \App\Models\Admin\Blog\BlogCategory $item */ @endphp

   @if($item->exists)
       <form method="POST" action="{{ route('admin.blog.categories.update', $item->id) }}">
       @method('PATCH')
   @else
       <form method="POST" action="{{ route('admin.blog.categories.store') }}">
   @endif
   @csrf

       <div class="">
           @php
           /** @var \Illuminate\Support\ViewErrorBag $errors */
           @endphp

           @include('admin.blog.posts.includes.result_messages')

           <div class="row justify-content-center">
               <div class="col-md">
                   @include('admin.blog.categories.includes.item_edit_main_col')
               </div>
               <div class="col-md-auto">
                   @include('admin.blog.categories.includes.item_edit_add_col')
               </div>
           </div>
       </div>
   </form>

   @if($item->exists)
       <form {{--onsubmit="if(confirm('Удалить')){ return true } else { return false }"--}}
             id="delete"
             method="POST"
             action="{{ route('admin.blog.categories.destroy', $item->id) }}"
             hidden>
           @method('DELETE')
           @csrf
       </form>
   @endif

   <!-- deleteModal -->
       <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleDeleteLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleDeleteLabel">Удаление</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       Подтвертить удаление категории со всеми вложенными статьями и файлами?
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                       <button type="submit" form="delete" class="btn btn-primary">Ок</button>
                   </div>
               </div>
           </div>
       </div>
@endsection
