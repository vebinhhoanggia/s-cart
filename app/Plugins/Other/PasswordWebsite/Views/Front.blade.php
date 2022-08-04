@extends($sc_templatePath.'.layout')

@section('block_main')
<div style="
text-align: center;
margin: 20px auto;
width: 50%;
max-width:350px;
display:block;
border: 1px solid #cfcdcd;
border-radius:5px;
padding:20px">
      <form action="{{ sc_route('passwordwebsite.index') }}" method="POST">
            @csrf
            <div class="form-row align-items-center">
            <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></div>
                  </div>
                  <input type="password" reuired class="form-control" name="password_website" placeholder="{{ $password_trans }}">
                  <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">{{ sc_language_render('action.submit') }}</button>
                  </div>
            </div>
            </div>
      </form>
</div>
@endsection

@section('breadcrumb')
@endsection

@push('styles')
      {{-- style css --}}
@endpush

@push('scripts')
      {{-- script --}}
@endpush