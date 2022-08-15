@extends('layout.master')

@section('content')
<div id="entry" >
    <form method="post" action="{{ action('EntryController@entryAllowed') }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="form-group row">
            <div class="col-sm-10">
                <input class="btn btn-success btn-primary btn-lg" type="submit" name="allowed" value="Entry Allowed">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input class="btn btn-danger btn-primary btn-lg" type="submit" name="not_allowed" value="Entry Denied">
            </div>
        </div>
    </form>
</div>
  @endsection