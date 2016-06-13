@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        {!! Form::open(['url' => '/questions/', 'method' => 'post']) !!}
                        <div class="block form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Frage</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="question[question]"
                                           placeholder="Frage">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Antwort 1</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="answer[1]" placeholder="Antwort 1">
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="rightanswer" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Antwort 2</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="answer[2]" placeholder="Antwort 2">
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="rightanswer" value="2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Antwort 3</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="answer[3]" placeholder="Antwort 3">
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="rightanswer" value="3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Antwort 4</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="answer[4]" placeholder="Antwort 4">
                                </div>
                                <div class="col-md-1">
                                    <input type="radio" name="rightanswer" value="4">
                                </div>
                            </div>
                            <div class="form-group form-actions">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa fa-angle-right"></i> Speichern
                                    </button>
                                    <button type="reset" class="btn btn-sm btn-warning">
                                        <i class="fa fa-repeat"></i> Zurücksetzen
                                    </button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
