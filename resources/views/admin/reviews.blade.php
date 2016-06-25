@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Отзывы</div>
                    <div class="panel-body">
                        Изначально отзывы попадают сюда на модерацию.<br>
                        Если отзыв не содержит спам, оскарбления или нецензурную лексику, то следует нажать кнопку "одобрить".<br>
                        Если же отзыв по каким то причинам вас не устраивает, вы можете его удалить.
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Почта</th>
                        <th>Отзыв</th>
                        <th>Состояние</th>
                        <th>Дата создания</th>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td>
                                <td>{{ $review->author }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->body }}</td>
                                <td>
                                    @if( $review->public )
                                        <a href="{{ url('/admin/review/'.$review->id.'/delete') }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    @else
                                        <a href="{{ url('/admin/review/'.$review->id.'/delete') }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                        <a href="{{ url('/admin/review/'.$review->id.'/public') }}" class="btn btn-success"><span class="glyphicon glyphicon-ok"> Одобрить</span></a>
                                    @endif
                                </td>
                                <td>{{ $review->created_at }}</td>
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