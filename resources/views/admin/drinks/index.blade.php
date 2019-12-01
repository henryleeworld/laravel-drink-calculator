@extends('layouts.admin')
@section('content')
<div class="content">
    @can('drink_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.drinks.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.drink.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.drink.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped datatable">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.drink.fields.barista') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.drink.fields.drink_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.drink.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.drink.fields.completed_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drinks as $key => $drink)
                                    <tr>
                                        <td>
                                            {{ $drink->barista->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $drink->drink_type->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $drink->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $drink->completed_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('drink_delete')
                                                <a href="{{ route('admin.drinks.complete', $drink->id) }}"
                                                    class="btn btn-xs btn-primary">完成</a>

                                                <form action="{{ route('admin.drinks.destroy', $drink->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection