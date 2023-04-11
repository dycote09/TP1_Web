<h1>Liste de tous les acteurs du film {{ $title }}</h1>

<table>
    <thead>
        <tr>
            <th style="text-align: left;">Prénom</th>
            <th style="text-align: left;">Nom de famille</th>
            <th style="text-align: left;">Date de naissance</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($actors as $actor)
            <tr>
                <td>{{ $actor->first_name }}</td>
                <td>{{ $actor->last_name }}</td>
                <td>{{ $actor->birthdate }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
