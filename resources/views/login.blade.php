@extends('layouts.app')

@section('content')



    <div class="container">

        <form class="form-signin" id="login">
            <h1 class="form-signin-heading">SharpNotes</h1>

{{--                <div class="alert alert-danger">Please try again</div>--}}

            <label for="inputEmail" >Email address</label>
            <input type="email"  id="inputEmail"  class="form-control" placeholder="Email address" required="" autofocus=""  name="email">
            <label for="inputPassword"  >Password</label>
            <input type="password"  id="inputPassword" class="form-control" placeholder="Password" required=""  name="password">
            <div class="checkbox">

                <button class="btn btn-lg btn-primary btn-block" type="button" id="sign-in-button" >Sign in</button>
            </div>

        </form>

    </div>



@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        $('#sign-in-button').click( function(event){
            event.preventDefault();

            console.log($('#login').serialize());
            $.ajax({
                url:"/login",
                method:"POST",
                data:$('#login').serialize(),
                success:function (data){
                    console.log(data);
                },
                error: function () {
                    //alert('error logging in')
                }
            })


        })
    });
</script>


@stop
