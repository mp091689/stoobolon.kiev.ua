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
                                <h5>{{ $email->title }} | <abbr title="{{ $email->active?'Писма будут отправляться':'Письма НЕ будут отправляться' }}">{{ $email->active?'Активно':'Отключено' }}</abbr></h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/emails') }}" class="btn btn-info"><span class="glyphicon glyphicon-list"></span></a>
                                <a href="{{ url('/admin/email/'.$email->id).'/edit' }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $email->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection