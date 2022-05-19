<div class="form_contact">
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-md-6">
            <div class="form-group field-quickcontactform-name required">
                <label for="name">@lang('messages.name')</label>
                <input type="text" id="quickcontactform-name" class="form-control" name="name" value="{{ old('name')}}"  aria-required="true" aria-invalid="false">
                <p class="help-block help-block-error"></p>
            </div>
            <div class="form-group field-quickcontactform-phone">
                <label for="phone">@lang('messages.phone')</label>
                <input type="text" id="quickcontactform-phone" class="form-control" name="phone" value="{{ old('phone')}}">

                <p class="help-block help-block-error"></p>
            </div>
            <div class="form-group field-quickcontactform-email required">
                <label for="email">@lang('messages.email')</label>
                <input type="text" id="quickcontactform-email" class="form-control" name="email" value="{{ old('email')}}" aria-required="true" aria-invalid="false">

                <p class="help-block help-block-error"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group field-quickcontactform-email required textarea">
                <label for="textarea">@lang('messages.bellik')</label>
                <textarea name="textarea" id="textarea"></textarea>
            </div>
                
            <div class="submit">
                <button type="submit" id="send-btn" class="btn btn-send" name="contact-button" data-mytext="Ugratmak">@lang('messages.send')</button>
            </div>
        </div>
    </div>
</div>