@if (!$isEditable)
    <div class="alert alert-warning" id="editable-warning" role="alert">
        <i class="fa fa-warning"></i> {{ __('global.editable-state-warning', ['state' => $stateDescription]) }}
    </div>
@endif
