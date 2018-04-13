<!-- select2 multiple -->
<div @include('crud::inc.field_wrapper_attributes') >
  <label>{!! $field['label'] !!}</label>
  @include('crud::inc.field_translatable_icon')
  <select
    name="{{ $field['name'] }}[]"
    style="width: 100%"
    @include('crud::inc.field_attributes' , ['default_class' =>  'form-control select2_multiple contending-team'])
    multiple>

    @if (isset($field['allows_null']) && $field['allows_null']==true)
      <option value="">-</option>
    @endif

    @if (isset($field['model']))
      @foreach ($field['model']::all() as $connected_entity_entry)
        @if( (old($field["name"]) && in_array($connected_entity_entry->getKey(), old($field["name"]))) || (is_null(old($field["name"])) && isset($field['value']) && in_array($connected_entity_entry->getKey(), $field['value']->pluck($connected_entity_entry->getKeyName(), $connected_entity_entry->getKeyName())->toArray())))
          <option value="{{ $connected_entity_entry->getKey() }}" selected>{{ $connected_entity_entry->{$field['attribute']} }}</option>
        @else
          <option value="{{ $connected_entity_entry->getKey() }}">{{ $connected_entity_entry->{$field['attribute']} }}</option>
        @endif
      @endforeach
    @endif
  </select>

  @if(isset($field['select_all']) && $field['select_all'])
    <a class="btn btn-xs btn-default select_all" style="margin-top: 5px;"><i class="fa fa-check-square-o"></i> {{ trans('backpack::crud.select_all') }}</a>
    <a class="btn btn-xs btn-default clear" style="margin-top: 5px;"><i class="fa fa-times"></i> {{ trans('backpack::crud.clear') }}</a>
  @endif

  {{-- HINT --}}
  @if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
  @endif
</div>


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->checkIfFieldIsFirstOfItsType($field, $fields))

  {{-- FIELD CSS - will be loaded in the after_styles section --}}
  @push('crud_fields_styles')
    <!-- include select2 css-->
    <link href="{{ asset('vendor/adminlte/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  @endpush

  {{-- FIELD JS - will be loaded in the after_scripts section --}}
  @push('crud_fields_scripts')
    <!-- include select2 js-->
    <script src="{{ asset('vendor/adminlte/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            // trigger select2 for each untriggered select2_multiple box
            $('.select2_multiple').each(function (i, obj) {
                if (!$(obj).hasClass("select2-hidden-accessible"))
                {
                    var $obj = $(obj).select2({
                        theme: "bootstrap"
                    });

                    var options = [];
                  @php
                    $contending_teams = array();
                  @endphp
                  @if (isset($field['model']))
                  @foreach ($field['model']::all() as $connected_entity_entry)
                  options.push({{ $connected_entity_entry->getKey() }});
                  @php
                    array_push($contending_teams, $connected_entity_entry);
                  @endphp
                  @endforeach
                  @endif

                  @if(isset($field['select_all']) && $field['select_all'])
                  $(obj).parent().find('.clear').on("click", function () {
                      $obj.val([]).trigger("change");
                  });
                    $(obj).parent().find('.select_all').on("click", function () {
                        $obj.val(options).trigger("change");
                    });
                  @endif
                }
            });

            $('select[name=tournament_id]').change(function(){
                //0. Init
                var contenders = [];
                var ateam = {};

                //1. Remove existing options
                $('.contending-team').find('option').remove().end();

                //2. Generate the contenders
                //TODO : This is the bottle-neck. This array increases with contending_teams table
                @foreach($contending_teams as $team)
                  ateam = {id: "{{$team->id}}", name: "{{$team->name}}", tourament_id: "{{$team->tournament_id}}"}
                  contenders.push(ateam);
                @endforeach
                //3.Only add teams matching the tournament id field of the form.
                for(var i=0; i<contenders.length; i++)
                {
                    if(parseInt(contenders[i].tourament_id) == parseInt($(this).val()))
                    $('.contending-team').append($('<option>', {
                        value: contenders[i].id,
                        text: contenders[i].name
                    }));
                }
            });
        });
    </script>
  @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
