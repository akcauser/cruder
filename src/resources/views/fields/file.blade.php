<!-- $FIELD_NAME_TITLE$ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('$FIELD_NAME$', '$FIELD_NAME_TITLE$:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('$FIELD_NAME$', ['class' => 'custom-file-input']) !!}
            {!! Form::label('$FIELD_NAME$', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>
