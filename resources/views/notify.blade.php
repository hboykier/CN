@if(Session::has('success'))
<script>
    PNotify.prototype.options.styling = "fontawesome";
    PNotify.prototype.options.delay = 3000;
    $(function(){
        new PNotify({
//            title: 'Regular Notice',
            text: '{{Session::get('success')}}',
            type: 'success',
            animate: {
                animate: true,
                in_class: 'slideInDown',
                out_class: 'slideOutUp'
            },
            buttons: {
                sticker: false
            }
        });
    });
</script>
@endif
@if(Session::has('error to frontend'))
    PNotify.prototype.options.styling = "fontawesome";
    PNotify.prototype.options.delay = 3000;
    <script>
        $(function(){
            new PNotify({
//                title: 'Regular Notice',
                text: '{{Session::get('error to frontend')}}',
                type: 'error'
            });
        });
    </script>
@endif