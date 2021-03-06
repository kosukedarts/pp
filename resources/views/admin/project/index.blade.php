@extends('layouts.admin')
@section('title', 'お店一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ダーツが出来るお店一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProjectController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProjectController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">店名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">店名</th>
                                <th width="40%">本文</th>
                                <th width="20%">リンク</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $project)
                                <tr>
                                    <th>{{ $project->id }}</th>
                                    <td>{{ \Str::limit($project->title, 100) }}</td>
                                    <td>{{ str_limit($project->body, 250) }}</td>
                                    <td>{{ \Str::limit($project->url, 100) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ProjectController@edit', ['id' => $project->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\ProjectController@delete', ['id' => $project->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection