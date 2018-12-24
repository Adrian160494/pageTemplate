<div style="border: 1px solid #000; box-shadow: 5px 5px 5px 5px #000; padding: 20px; text-align: center;">
   <h1> Witaj <i>{{ $contact->getReceiver() }}</i></h1>
    <p style="width: 100%; background: #ddd; ">Wysłąno prośbę o kontakt od {{$contact->getEmail()}}</p>
    <p>Dane wysyłającego: <i>{{ $contact->getSenderName() }}</i> <i>{{ $contact->getSenderSurname() }}</i></p>
    <p>Tytuł emaila: {{$contact->getSubject()}}</p>

    <div style="text-align: center;">
        {{$contact->getDescription()}}
    </div>

</div>

