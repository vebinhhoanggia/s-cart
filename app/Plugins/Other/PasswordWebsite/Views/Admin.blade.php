@extends($templatePathAdmin.'layout')

@section('main')
<div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header with-border">
            <h3 class="card-title">{{ $title }}</h3>
          </div>
          <div class="card-body">
             <table class="table">
               <tbody>
                <tr>
                  <td>
                    {!! sc_language_render($pathPlugin.'::lang.admin.enable_mode') !!}
                  </td>
                  <td>
                    <input class="check-data-config" type="checkbox" name="PasswordWebsite_mode" {{ sc_config('PasswordWebsite_mode')?"checked":"" }}>
                  </td>
                </tr>
                <tr>
                  <td>{{ sc_language_render($pathPlugin.'::lang.password') }}</td>
                  <td><a href="#" class="editable editable-click" data-name="PasswordWebsite_password" data-type="password" data-pk="PasswordWebsite_password" data-source="" data-url="{{ $urlUpdateConfig }}" data-title="{{ sc_language_render(sc_language_render($pathPlugin.'::lang.password')) }}" data-value="{{ sc_config('PasswordWebsite_password') }}" data-original-title="" title=""></a></td>
                </tr>
               </tbody>
             </table>
          </div>
      </div>
      </div>
</div>
@endsection

@push('styles')
<!-- Ediable -->
<link rel="stylesheet" href="{{ sc_file('admin/plugin/bootstrap-editable.css')}}">
@endpush

@push('scripts')
<!-- Ediable -->
<script src="{{ sc_file('admin/plugin/bootstrap-editable.min.js')}}"></script>

<script type="text/javascript">

$('input.check-data-config').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
  }).on('ifChanged', function(e) {
  var isChecked = e.currentTarget.checked;
  isChecked = (isChecked == false)?0:1;
  var name = $(this).attr('name');
    $.ajax({
      url: '{{ $urlUpdateConfig }}',
      type: 'POST',
      dataType: 'JSON',
      data: {
          "_token": "{{ csrf_token() }}",
          "name": $(this).attr('name'),
          "storeId": {{ $storeId }},
          "value": isChecked
        },
    })
    .done(function(data) {
      if(data.error == 0){
        if (isChecked == 0) {
          $('#smtp-config').hide();
        } else {
          $('#smtp-config').show();
        }
        alertJs('success', '{{ sc_language_render('admin.msg_change_success') }}');
      } else {
        alertJs('error', data.msg);
      }
    });

    });

$.fn.editable.defaults.params = function (params) {
  params._token = "{{ csrf_token() }}";
  params.storeId = "{{ $storeId }}";
  return params;
};
  $('.editable').editable({
  validate: function(value) {
      if (value == '') {
          return '{{  sc_language_render('admin.not_empty') }}';
      }
  },
  success: function(data) {
    if(data.error == 0){
      alertJs('success', '{{ sc_language_render('admin.msg_change_success') }}');
    } else {
      alertJs('error', response.msg);
    }
}
});


</script>

@endpush
