<h1>Liste des langues</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Langue</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($languages as $language)
            <tr>            
                <td>{{ $language->id }}</td>
                <td>{{ $language->name }}</td>            
            </tr>
        @endforeach
    </tbody>
</table>
