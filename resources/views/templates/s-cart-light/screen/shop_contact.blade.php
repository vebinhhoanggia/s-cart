@php
/*
$layout_page = shop_contact
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')
<section class="section section-sm section-first bg-default text-md-left">
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 contact_content">
            <img src="{{ sc_file(sc_store('logo')) }}">
            <address>
                <p>{{ sc_store('title') }}</p>
                <p><span class="icon mdi mdi-map-marker"></span> {{ sc_store('address') }}</p>
                <p><span class="icon mdi mdi-phone"></span> {{ sc_store('long_phone') }}</p>
                <p><span class="icon mdi mdi-email-outline"></span> {{ sc_store('email') }}</p>
            </address>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <form method="post" action="{{ sc_route('contact.post') }}" class="contact-form" id="form-process">
                {{ csrf_field() }}
                <div id="contactFormWrapper">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>{{ sc_language_render('contact.name') }}:</label>
                            <input type="text" class="form-control {{ ($errors->has('name'))?"input-error":"" }}"
                                name="name" placeholder="{{ sc_language_render('contact.name') }}" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>{{ sc_language_render('contact.email') }}:</label>
                            <input type="email" class="form-control {{ ($errors->has('email'))?"input-error":"" }}"
                                name="email" placeholder="{{ sc_language_render('contact.email') }}" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label>{{ sc_language_render('contact.phone') }}:</label>
                            <input type="telephone" class="form-control {{ ($errors->has('phone'))?"input-error":"" }}"
                                name="phone" placeholder="{{ sc_language_render('contact.phone') }}" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                            <span class="help-block">
                                {{ $errors->first('phone') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="control-label">{{ sc_language_render('contact.subject') }}:</label>
                            <input type="text" class="form-control {{ ($errors->has('title'))?"input-error":"" }}"
                                name="title" placeholder="{{ sc_language_render('contact.subject') }}" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                            <label class="control-label">{{ sc_language_render('contact.content') }}:</label>
                            <textarea class="form-control {{ ($errors->has('content'))?"input-error":"" }}" rows="5"
                                cols="75" name="content" placeholder="{{ sc_language_render('contact.content') }}">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                            <span class="help-block">
                                {{ $errors->first('content') }}
                            </span>
                            @endif

                        </div>
                    </div>

                    {!! $viewCaptcha?? '' !!}

                    {{-- Button submit --}}
                    <div class="btn-toolbar form-group">
                        <input type="submit" value="{{ sc_language_render('action.submit_contact_us') }}" class="button button-lg button-secondary" id="button-form-process">
                    </div>
                    {{--// Button submit --}}
                </div>
            </form>
        </div>
    </div>
    <div class="row shop_contact_maps" >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.5595838162476!2d109.0946116!3d13.925253000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f3f1e99d539df%3A0x548f1514d497c4c9!2zQ8OUTkcgVFkgVE5ISCBQSMOZTkcgS-G7si1Uw4FNIEPhu5I!5e0!3m2!1sen!2s!4v1660230472425!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</section>

@endsection


@push('styles')
{{-- Your css style --}}
@endpush

@push('scripts')
{{-- //script here --}}
@endpush