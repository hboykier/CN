@extends('app_layout')

@section('screen body')
    <div class="x_panel">

        <div class="x_title">
            <h2>{{Lang::get('app.domains')}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a class="btn btn-default" href="{{route("admin.domain.create")}}">{{Lang::get('app.new')." ".Lang::get('app.domain')}}</a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table id="datatab" class="table responsive-utilities jambo_table">
                <thead>
                <th class="col-md-1">
                    {{Lang::get('app.id.symbol')}}
                </th>
                <th class="col-md-1">
                    {{Lang::get('app.code')}}
                </th>
                <th class="col-md-2">
                    {{Lang::get('app.name')}}
                </th>
                <th class="col-md-5">
                    {{Lang::get('app.description')}}
                </th>
                <th class="col-md-1">
                    {{Lang::get('app.multivalue')}}
                </th>
                <th class="col-md-2">
                </th>
                </thead>
                @foreach ($domains as $domain)
                    <tr>
                        <td>
                            {{ $domain->id }}
                        </td>
                        <td>
                            {{ $domain->code }}
                        </td>
                        <td>
                            {{ $domain->name}}
                        </td>
                        <td>
                            {{ $domain->description }}
                        </td>
                        <td>
                            @if( $domain->multivalue)
                                <i class="fa fa-check"></i>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-default" href="{{route('admin.domain.edit', $domain)}}">
                                <i class="fa fa-edit" title="Edit" aria-hidden="true"></i>
                            </a>

                            <button type="button" class="btn btn-default" onclick="show_delete_modal('{{$domain->id}}', '{{$domain->code}}')">
                                <i class="fa fa-trash-o" title="Delete" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
@section('screen footer')

    @include('modal_delete', ['entity' => Lang::get("app.domain"), 'value' => $domain->code, 'route'=>'admin.domain.index', 'id'=>$domain->id])

    <script>

        var asInitVals = new Array();
        $(document).ready(function () {
            var oTable = $('#datatab').dataTable({

                "oLanguage": {
                    "sSearch": "Search all columns:",
                    "oPaginate": {
                        "sFirst": "&nbsp;",
                        "sNext": "&nbsp;",
                        "sLast": "&nbsp;",
                        "sPrevious": "&nbsp;"
                    }
                },
                "aoColumnDefs": [
                    {
                        'bSortable': false,
                        'aTargets': [4,5],
                    }, //disables sorting for column one
                    {
                        'sClass': "dt-center",
                        'aTargets': [4]
                    }
                ],
//                select: false,
                'iDisplayLength': 10,
                "sPaginationType": "full_numbers",
//                "dom": 'T<"clear">lfrtip',
                "order": []
            });
        });
    </script>
@endsection
