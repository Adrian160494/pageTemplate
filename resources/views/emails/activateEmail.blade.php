<div style="background: #545353; border: 1px solid #ffffff; box-shadow: 5px 5px 5px 5px #000; padding: 20px 0; text-align: center;">
    <div style="padding: 20px 60px;">
        <div style="float:left; width: 50%; text-align: left;">
            <img src="http://{{env('APP_URL')}}/images/opel-logo.png" width="100"/>
        </div>
        <div style="float: left; width: 50%; text-align: right;">
            <h1 style="color: #fff;">Opel blog</h1>
        </div>
    </div>
    <h1 style="    color: #fff;"> Witaj <i>{{ $user->getName() }}</i></h1>
    <h3 style="color: #fff;width: 100%; background: #4ca32c; ">Rejestracja przebiegła pomyślnie!!</h3>
    <h3 style="color: #fff;">Aby aktywować konto kliknij w link poniżej</h3>
    <div style="background: #ddd; border-top: 2px solid #fff; border-bottom: 2px solid #fff;">
        <h1>
            <a style="text-decoration: none;" href="http://{{url()->route('activate_account',array('email'=>$user->getEmail(),'token'=>$user->getToken()))}}">Aktywacja konta</a>
        </h1>
    </div>

</div>

