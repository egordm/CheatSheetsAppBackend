<div class="alert alert-{{isset($type) ? $type : 'info'}} alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span>&times;</span>
    </button>
    {{$message}}
</div>