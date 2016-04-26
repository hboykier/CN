<div class="modal fade" id="modal-delete" tabIndex="-1" role="dialog" aria-labelledby="modal-delete-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-delete-label">{{Lang::get('app.confirm_delete')}}</h4>
            </div>
            <div class="modal-body">
                    {{Lang::get('app.delete')}} {{$entity}} <b><span id="modal-domain-value"></span></b> ?
            </div>
            <div class="modal-footer">
                <form id="modal-form" method="POST" action="" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <div class="btn-group" role="group" aria-label="...">
                    {{ Form::button(Lang::get('app.no'), ['class'=>'btn btn-default', 'data-dismiss'=>'modal'])}}
                    {{ Form::submit(Lang::get('app.yes'), ['class'=>'btn btn-default', 'onClick'=>'hide_delete_modal();show_please_wait_modal()'])}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function show_delete_modal (id, code)
    {
        $("#modal-domain-value").html(code);
        $("#modal-form").attr('action', "{{route($route)}}/"+id);
        $("#modal-delete").modal();
    }

    function hide_delete_modal ()
    {
        $("#modal-delete").modal('hide');
    }

</script>