@extends('layouts.dash')
@section('main')
    <div class="dashboard-box">
        <!-- Headline -->
        <div class="headline">
            <h3><i class="icon-material-outline-extension"></i>{{ trans('dash.permissions.create.text') }}</h3>
        </div>
        <div class="content">
            <form action="{{ route('dashboard.permission.store') }}" method="POST">
                @csrf
                <ul class="fields-ul">
                    <li>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>{{ trans('dash.items.name') }}</h5>
                                    <input name="name" class="with-border" value="{{ old('name') }}">
                                    @if($errors->has("name"))
                                        <small class="dashboard-status-button red">{{ $errors->first("name") }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="checkbox">
                                    <input type="checkbox" name="default" value="1" id="default" {{ old('default') ? "checked" : "" }}>
                                    <label for="default"><span class="checkbox-icon"></span>{{ trans('dash.permissions.default.desc') }}</label>
                                    @if($errors->has("default"))
                                        <small class="dashboard-status-button red">{{ $errors->first("default") }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>{{ trans('dash.items.description') }}</h5>
                                    <textarea cols="10" rows="2" class="with-border" name="description">{{ old('description') }}</textarea>
                                    @if($errors->has("description"))
                                        <small class="dashboard-status-button red">{{ $errors->first("description") }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button class="button button-sliding-icon margin-bottom-20">
                                    {{ trans('dash.permissions.create.text') }}
                                    <i class="icon-material-outline-arrow-right-alt"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
@stop