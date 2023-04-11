<h1>Liste de tous les films</h1>

<table>
    <thead>
        <tr>
            <th style="text-align: left;">ID</th>
            <th style="text-align: left;">Titre</th>
            <th style="text-align: left;">Année de parution</th>
            <th style="text-align: left;">Durée en minutes</th>
            <th style="text-align: left;">Description</th>
            <th style="text-align: left;">Classification</th>
            <th style="text-align: left;">Langue</th>
            <th style="text-align: left;">Bonus</th>
            <th style="text-align: left;">Créé le</th>
            <th style="text-align: left;">Modifié le</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($films as $film)
            <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->title }}</td>
                <td>{{ $film->release_year }}</td>
                <td>{{ $film->length }}</td>
                <td>{{ $film->description }}</td>
                <td>{{ $film->rating }}</td>
                <td>{{ $film->language->name }}</td>
                <td>{{ $film->special_features }}</td>
                <td>{{ $film->created_at }}</td>
                <td>{{ $film->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
