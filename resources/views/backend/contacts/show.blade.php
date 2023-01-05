@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2> Show Message</h2>
                            </div>
                            {{-- <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('contact.index') }}"> Back</a>
                            </div> --}}
                        </div>
                    </div>
                    <br>
                    <div class="card border-secondary mb-3" style="max-width: 50rem;">

                        <div class="card-body text-secondary">
                            <h3 class="card-title">Email:</h3> 
                            <p>{{ $contact->email }}</p>
                            <h3 class="card-title">Subject:</h3>
                            <p>{{ $contact->subject }}</p>
                            <h3 class="card-title">Message:</h3>
                            <p> {{ $contact->message }}</p>
                            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>

                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
