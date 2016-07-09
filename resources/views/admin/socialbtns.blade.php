@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Социальные кнопки в футере</div>
                    <div class="panel-body">
                        Если поле URL оставить пустым то кнопка соцсети будет скрыта.<br>
                        Формат ссылки - <u><i>http://example.com/</i></u>
                    </div>
                    <form action="{{ route('admin.post.socialbuttons.set.url') }}" role="form" method="post" class="form-horizontal">
                        <table class="table table-hover">
                            <tr>
                                <th>Название сети</th>
                                <th>Ссылка</th>
                            </tr>
                            @foreach( $buttons as $button )
                                <tr class="show-row">
                                    <td>{{ $button->title }}</td>
                                    <td><input
                                                name="{{ $button->title }}"
                                                type="text"
                                                class="form-control"
                                                value="{{ Request::old('url') ? Request::old('url') : $button->url }}" placeholder="http://example.com/url/"></td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="panel-body">
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection