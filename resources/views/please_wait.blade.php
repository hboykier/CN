<div class="modal fade" id="pleaseWaitDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{Lang::get('app.please.wait')}}</h2>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only">40% Complete (success)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show_please_wait_modal ()
    {
        $("#pleaseWaitDialog").modal({backdrop: 'static', keyboard: false});
    }

</script>