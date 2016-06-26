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
                                <td>
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $review->id }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $review->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">{{ $review->author }}
                                                        <small>{{ $review->phone }}</small></h4>
                                                </div>
                                                <div class="modal-body" style="white-space: pre-wrap;">{{ $review->body }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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