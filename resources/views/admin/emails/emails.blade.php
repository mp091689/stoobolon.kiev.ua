@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Почтовые уведомления</h5>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Название</th>
                        <th>Состояние</th>
                        <th>Действие</th>
                        @foreach($emails as $email)
                            <tr>
                                <td>{{ $email->id }}</td>
                                <td>{{ $email->title }}</td>
                                <td>
                                    @if( $email->active )
                                        Активно
                                    @else
                                        Отключено
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/email/'.$email->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="{{ url('/admin/email/'.$email->id).'/edit' }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection