@extends('layouts.app')
@section('title', '商品一覧')
@section('content')
    {{ link_to_route('items.create', '新規登録', [], ['class' => 'btn btn-primary']) }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>カテゴリー</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{ link_to_route('items.edit', '編集', ['id' => $item->id], ['class' => 'btn btn-default']) }}</td>
                <td>
                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) }}
                    {{Form::submit('削除', ['class' =>'btn btn-danger'])}}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        <div class="container-fluid">
            <div class="row">

                <!--↓↓ 検索フォーム ↓↓-->
                <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                    <form class="form-inline" action="{{url('/items')}}">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="何かしら入力してみ">
                        </div>
                        <input type="submit" value="検索" class="btn btn-info">
                    </form>
                </div>
                <!--↑↑ 検索フォーム ↑↑-->
                <div class="col-sm-8" style="text-align:right;">
{{--                    <div class="paginate">--}}
{{--                        {{ $data->appends(Request::only('keyword'))->links() }}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

        </tbody>
    </table>
    {{ $items->appends(request()->input())->links() }}
@endsection

