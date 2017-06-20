@extends('layouts.default')
@section('content')

<p>{{trans("messages.propertiesToManage") }}</p>
<ul>
    <li><a href="/propertiesManage/entity">{{trans("messages.entity") }}</a></li>
    <li><a href="/propertiesManage/relation">{{trans("messages.relation") }}</a></li>
</ul>

@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/entTypes.js') ?>"></script>
@stop

@extends('layouts.default')
@section('content')
	fdgdffg
@stop