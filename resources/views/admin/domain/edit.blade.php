@extends('app_layout')


@section('screen body')
    <div class="x_panel">

        <div class="x_title">
            <h2>{{((getAction()=='create')? Lang::get('app.create'): Lang::get('app.update')).' '.Lang::get('app.domain')}}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            @if(getAction()=='create')
                {{ Form::model ($domain, array('route'=>'admin.domain.store', 'method'=>'POST', 'class'=>'form-horizontal')) }}
            @else
                {{ Form::model ($domain, array('route'=>['admin.domain.update', $domain], 'method'=>'PUT', 'class'=>'form-horizontal')) }}
            @endif
            <div class="form-group {{ $errors->has('code') ? 'has-error' : false }}">
                {{Form::label('code', Lang::get('app.code'), ['class'=>'col-sm-2 control-label'])}}
                <div class="col-sm-10">
                {{Form::text('code', null, ['class'=>'form-control',  'autofocus'=>'autofocus'])}}
                @if ($errors->has('code'))<p style="color:red;">{{$errors->first('code')}}</p>@endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : false }}">
                {{Form::label('name', Lang::get('app.name'), ['class'=>'col-sm-2 control-label'])}}
                <div class="col-sm-10">
                {{Form::text('name', null, ['class'=>'form-control'])}}
                @if ($errors->has('name'))<p style="color:red;">{{$errors->first('name')}}</p>@endif
                </div>
            </div>
            <div class="form-group">
                {{Form::label('description', Lang::get('app.description'), ['class'=>'col-sm-2 control-label'])}}
                <div class="col-sm-10">
                {{Form::textarea('description', null, ['class'=>'form-control'])}}
                @if ($errors->has('description'))<p style="color:red;">{{$errors->first('description')}}</p>@endif
                </div>
            </div>
            <div class="form-group">
                    {{Form::label('multivalue', Lang::get('app.multivalue'), ['class'=>'col-sm-2 control-label'])}}
                <div class="col-sm-10">
                    {{Form::checkbox('multivalue', true, $domain->multivalue)}}
                </div>
            </div>
                <div class="col-sm-2">
                </div>

            <div class="btn-group col-sm-10" role="group" aria-label="...">
                @if(getAction()=='create')
                    {{Form::submit(Lang::get('app.save'), ['class'=>'btn btn-default', 'name' => 'save'])}}
                    {{Form::submit(Lang::get('app.continue'), ['class'=>'btn btn-default', 'name' => 'continue'])}}
                @else
                    {{Form::submit(Lang::get('app.update'), ['class'=>'btn btn-default', 'name' => 'save'])}}
                @endif

                <a class="btn btn-default" role="button" href="{{route('admin.domain.index')}}">{{Lang::get('app.return')}}</a>
            </div>
            {{ Form::close()}}

        </div>
    </div>
@endsection
@section('screen footer')
@endsection
