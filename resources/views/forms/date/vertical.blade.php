<div class="form-group{{ $errors->has($nameWithoutBrackets) ? ' has-error' : '' }}">
    <div class="row">
        @if($label)
            {{ app('form')->label($name, $label, ['class' => 'content-label col-md-2']) }}
        @else
            <div class="col-md-2"></div>
        @endif

        <div class="col-md-10">

            {{ app('form')->date($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}

            @if($inlineValidation)
                @if($errors->has($nameWithoutBrackets))
                    <strong class="help-block">{{ $errors->first($nameWithoutBrackets) }}</strong>
                @else
                    <strong class="help-block">{{ $note }}</strong>
                @endif
            @else
                <strong class="help-block">{{ $note }}</strong>
            @endif
        </div>
    </div>
</div>
