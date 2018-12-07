Hello <i>{{ $contact->getReceiver() }}</i>,
<p>Wysłąno prośbę o kontakt od {{$contact->getEmail()}}</p>

<p>Tytuł emaila: {{$contact->getSubject()}}</p>

<div style="text-align: justify;">
    {{$contact->getDescription()}}
</div>

Thank You,
<i>{{ $contact->getSender() }}</i>