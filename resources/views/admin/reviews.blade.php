@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Отзывы</div>
                    <div class="panel-body">
                        Будь честным, не удаляй негативные отзывы, если они есть:)
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Почта</th>
                        <th>Отзыв</th>
                        <th>Состояние</th>
                        <th>Дата создания</th>
                        <th>Действие</th>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->author }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->body }}</td>
                                <td>
                                    @if( $review->public )
                                        Опубликован
                                    @else
                                        <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></a>
                                    @endif
                                </td>
                                <td>{{ $review->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row text-center">
                        {!! $reviews->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection