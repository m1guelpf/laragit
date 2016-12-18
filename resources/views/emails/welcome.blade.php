@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.articleStart')

        <h4 class="secondary"><strong>Hi {{ $user->name }}!</strong></h4>
        <p>Thank you for registering on {{ config('app.name', 'Laravel') }}!</p>

    @include('beautymail::templates.widgets.articleEnd')


    @include('beautymail::templates.widgets.newfeatureStart')

        <h4 class="secondary"><strong>Need help with {{ config('app.name', 'Laravel') }}?</strong></h4>
        <p>You can access {{ config('app.name', 'Laravel') }} <a href="{{ url('') }}">here</a>.</p>
        <p>You can also visit <a href="https://support.miguelpiedrafita.com">our support center</a> if you have problems, or contact us from our in-site chat.</p>

    @include('beautymail::templates.widgets.newfeatureEnd')

@stop
