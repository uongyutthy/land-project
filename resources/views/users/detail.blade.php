@section('title', 'Detail Project')
@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <strong>Project</strong>
          {{--<small>Form</small>--}}
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="post" id="project">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="projectNo">Project No</label>
                  <input class="form-control" id="name" name="name" value="{{$data->name}}" type="text" readonly>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="projectAbbr">Project Abbr</label>
                  <input class="form-control" id="abbreviation" name="abbreviation" value="{{$data->abbreviation}}" type="text" readonly>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="ProjectDescription">Project Description</label>
                  <textarea class="form-control" id="description" name="description" style="height: 150px;" readonly> {{$data->description}}</textarea>
                </div>
              </div>
            </div>
            <!-- /.row-->
            <div class="form-actions">
              <a href="{{ route('project.index') }}" class="btn btn-secondary" style="float: right;">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row-->
@endsection