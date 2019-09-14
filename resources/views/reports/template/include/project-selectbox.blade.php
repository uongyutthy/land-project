<div class="col-4">
    <div class="form-group">
        <label for="{{ $projectElementId }}" class="control-label">@lang('report.project-name') *</label>
        <select class="form-control select2" id="{{$projectElementId}}" name="project" required>
            <option value="">@lang('report.select-project')</option>
            @foreach($projects as $project)
                <option value="{{$project->id}}">{{$project->display_name}}</option>
            @endforeach
        </select>
    </div>
</div>
