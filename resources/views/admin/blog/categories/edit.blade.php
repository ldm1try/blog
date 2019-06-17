@extends('layouts.admin')

@section('leftSideContent')
    @include('admin.includes.leftSideContent')
@endsection

@section('content')
   @php /** @var \App\BlogCategory $item */ @endphp

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
           @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;﻿</span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
           @endif

           @if(session('success'))
               <div class="row justify-content-center">
                   <div class="col-md-11">
                       <div class="alert alert-success" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;﻿</span>
                           </button>
                           {{ session()->get('success') }}
                       </div>
                   </div>
               </div>
           @endif

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
       <form onsubmit="if(confirm('Удалить')){ return true } else { return false }"
             id="delete"
             method="POST"
             action="{{ route('admin.blog.categories.destroy', $item->id) }}"
             hidden>
           @method('DELETE')
           @csrf
       </form>
   @endif
@endsection