@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10">
                <h4>Add Event I Have been Participated in</h4>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-10">
                <small><a href="/events">< Cancel</a></small>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <form action="/events" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_name">Event Name</label>
                                        <input type="text" name="event_name" id="event_name" class="form-control @error('event_name') is-invalid @enderror">
                                        @error('event_name')
                                        <div class="invalid-feedback">
                                            Event name couldn't be left empty
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_type">Event Type</label>
                                        <select name="event_type" id="event_type" class="form-control @error('event_type') is-invalid @enderror">
                                                <option value=""></option>
                                            @foreach ($types as $type)
                                               <option value="{{ $type->event_type_id }}">{{ $type->event_type_name }}</option>    
                                            @endforeach                                     
                                        </select>
                                        @error('event_type')
                                        <div class="invalid-feedback">
                                            Please provide event type you participated
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="event_city">City</label>
                                            <input type="text" name="event_city" id="event_city" class="form-control @error('event_city') is-invalid @enderror">
                                            @error('event_city')
                                            <div class="invalid-feedback">
                                                Please fill the city name
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="event_country">Country</label>
                                            <input type="text" name="event_country" id="event_country" class="form-control @error('event_country') is-invalid @enderror">
                                            @error('event_country') 
                                            <div class="invalid-feedback">
                                                Please provide country name
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="event_scope">Event Scope</label>
                                        <select name="event_scope" id="event_scope" class="form-control @error('event_scope') is-invalid @enderror">
                                            <option value=""></option>
                                            @foreach ($scopes as $scope)
                                                <option value="{{ $scope->event_scope_id }}">{{ $scope->event_scope_name }}</option>    
                                            @endforeach                                          
                                        </select>
                                        @error('event_scope') 
                                        <div class="invalid-feedback">
                                            it cant be left empty
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror">
                                        @error('start_date') 
                                        <div class="invalid-feedback">
                                            it cant be left empty
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="finish_date">Finish Date</label>
                                        <input type="date" name="finish_date" id="finish_date" class="form-control @error('finish_date') is-invalid @enderror">
                                        @error('finish_date') 
                                        <div class="invalid-feedback">
                                            it cant be left empty
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="event_desc">Brief Description</label>
                                    <textarea name="event_desc" id="" cols="30" rows="5" class="form-control @error('event_desc') is-invalid @enderror"></textarea>
                                    @error('event_desc') 
                                    <div class="invalid-feedback">
                                        it cant be left empty
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-secondary">Save as Draft</button>
                                    <button type="submit" class="btn btn-success">Create!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection