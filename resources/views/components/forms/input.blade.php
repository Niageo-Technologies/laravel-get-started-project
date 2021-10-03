<div class="@foreach ($col_classes as $class){{ $class }} @endforeach">
    <div class="form-group">
        @switch($type)
            @case('text')
            @case('date')
            @case('number')
                        <!-- text input -->
                        <label>{{ $label }}</label>
                        <input name="{{ $name }}" type="{{ $type }}" class="form-control" value="{{ old($name) }}" placeholder="{{ $placeholder }}">
                @break
                @case('select')
                    <label>{{ $label }}</label>
                    <select class="form-control" name="{{ $name }}">
                        @foreach ($options as $option)
                            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                        @endforeach
                    </select>
                @break
                @case('boolean')
                    <div class="custom-control custom-switch">
                      <input name="{{ $name }}" type="checkbox"  value="1" @if($default_value == 1) checked @endif class="custom-control-input" id="{{ $name }}">
                      <label class="custom-control-label"  for="{{ $name }}">{{ $label }}</label>
                    </div>
                @break
                @case('textarea-rich')
                    <div class="card card-outline card-info">
                        <label for="{{ $name }}"></label>
                        <textarea id="{{ $name }}">
                            {{ $label }}
                        </textarea>
                        
                    </div>

                    <script>
                        $(function () {
                          // Summernote
                          $('#{{ $name }}').summernote()
                      
                          // CodeMirror
 
                        })
                      </script>
                @break
            @default
                <small>input type not found</small>
        @endswitch
    </div>
</div>

