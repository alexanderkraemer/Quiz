@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Navigation</div>
                    <div class="panel-body">
                        <div class="block form-horizontal">
                            @if(\Illuminate\Support\Facades\Session::has('message'))
                                {{ \Illuminate\Support\Facades\Session::get('message') }}
                            @endif
                        </div>
                        <div class="block form-horizontal">
                            Anzahl der Fragen: {{ $questCount }}
                            <br/>
                            Anzahl der richtig beantworteten Fragen: {{ $falseCount }}
                            <br/>
                            <br/>
                        </div>
                        <div class="block form-horizontal">
                            <a href="/fulltest">Alle Fragen testen</a>
                            <br/>
                            <a href="/fulltest/wrong">Alle falschen Fragen testen</a>
                            <br/>
                            <a href="/twentytest/1">20 Fragen im zirkel testen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
