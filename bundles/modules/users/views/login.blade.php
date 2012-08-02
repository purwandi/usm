@layout('layouts.main')
@section('title')
   Ketua Program Studi
@endsection

@section('content')
    
    <div class="row">
        <div class="span6 offset3">
            <legend>Login Sistem</legend>

            {{ Form::open() }}
                {{ Form::btext('Username or Email','username') }}
                {{ Form::bpassword('Password','password') }}

                <div class="form-actions">
                    {{ Form::button('Log in',array('class'=>'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection