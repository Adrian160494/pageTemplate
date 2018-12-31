<div>
@if(Session::get('authUser'))
@include('templates.form.form_template_table',array('header'=>'Dodaj nowy temat','headerText'=>'Masz problem? Pytanie? Napisz...','form'=>$form,'url'=>'/topics'))
@else
    <div class="info-box">
        <h5>Dodawanie postów możliwe jest tylko dla zalogowanych użytkowników!</h5>
    </div>
    @endif
</div>