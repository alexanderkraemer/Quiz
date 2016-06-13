@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Navigation</div>
                    <div class="panel-body">
                        <div class="block form-horizontal">
                            Du hast alle Fragen durch!
                        </div>
                        <div class="block form-horizontal">
                            <a href="/fulltest">Alle Fragen testen</a>
                            <br/>
                            <a href="/twentytest/1">20 Fragen im zirkel testen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
