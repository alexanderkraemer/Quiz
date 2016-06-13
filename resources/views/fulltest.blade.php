@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Question</div>
                    <div class="panel-body">
                        <div class="block form-horizontal">
                            <div class="block-title">
                                <h2>
                                    {{ $question->question }}
                                </h2>
                            </div>
                            @if(\Illuminate\Support\Facades\Session::has('retArr'))
                                @foreach(Session::get('retArr') as $answer)
                                    {!! Form::hidden('answers[' .  $answer->id .']') !!}
                                    <div class="form-group
                                    @if(Session::get('rightAnswer') == $answer->id)
                                            alert alert-success
                                    @elseif(Session::get('rightAnswer') != $answer->id && Session::get('selectedAnswer') == $answer->id)
                                            alert alert-danger
                                    @endif
                                            ">
                                        <div class="col-md-1">
                                            <input type="radio" name="answer" disabled
                                                   @if(Session::get('selectedAnswer') == $answer->id)
                                                   checked
                                                   @endif
                                                   value="{{ $answer->id }}">
                                        </div>
                                        <label class="col-md-1 control-label">{{ $answer->answer }}</label>
                                    </div>
                                @endforeach
                                <div class="form-group form-actions">
                                    <div class="col-md-3">
                                        <a href="/" class="btn btn-sm btn-primary">
                                            <i class="fa fa-angle-right"></i> nächse Frage
                                        </a>
                                    </div>
                                </div>
                            @else
                                {!! Form::open(['url' => '/answer/check', 'method' => 'post']) !!}
                                {!! Form::hidden('question', $question->id) !!}
                                @foreach($answers as $answer)
                                    {!! Form::hidden('answers[' .  $answer->id .']') !!}
                                    <div class="form-group">
                                        <div class="col-md-1">
                                            <input type="radio" name="answer" value="{{ $answer->id }}">
                                        </div>
                                        <label class="col-md-1 control-label">{{ $answer->answer }}</label>
                                    </div>
                                @endforeach
                                <div class="form-group form-actions">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-angle-right"></i> Absenden
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
