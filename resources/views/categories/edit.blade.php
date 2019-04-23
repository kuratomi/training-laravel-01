@extends('layouts.app')
@section('title', 'カテゴリー編集')
@section('content')
    {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) }}
    <div class="form-group">
        {{ Form::label('name', 'カテゴリー名：') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::submit('更新', ['class' => 'btn btn-success form-control']) }}
    </div>
    {{ link_to_route('categories.index', '一覧に戻る', [], ['class' => 'btn btn-default']) }}
    {{ Form::close() }}
@endsection

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
