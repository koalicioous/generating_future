@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10">
                <h4>Add New Competition Prize</h4>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-10">
                <small><a href="/events">< Kembali</a></small>
            </div>
        </div>
        <div class="row my-3 justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <form action="/competition" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="competition_name">Competition Name</label>
                                            <input type="text" name="competition_name" id="competition_name" class="form-control @error('competition_name') is-invalid @enderror">
                                            @error('competition_name')
                                                <div class="invalid-feedback">
                                                    Please Provide Event Name
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="competition_scope">Scope</label>
                                            <select name="competition_scope" id="competition_scope" class="form-control @error('competition_scope') is-invalid @enderror">
                                                    <option value=""></option>
                                                @foreach ($scopes as $scope)
                                                    <option value="{{ $scope->event_scope_id }}">{{ $scope->event_scope_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('competition_scope')
                                                <div class="invalid-feedback">
                                                    It can't be left Empty
                                                </div>
                                            @enderror('competition_scope')
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="competition_prize">Prize</label>
                                            <select name="competition_prize" id="competition_prize" class="form-control @error('competition_prize') is-invalid @enderror">
                                                <option value=""></option>
                                                @foreach ($prizes as $prize)
                                                    <option value="{{ $prize->prize_id }}"> {{ $prize->prize_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('competition_prize')
                                                <div class="invalid-feedback">
                                                    Please tell us!
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                        <a href="/events" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    
@endsection