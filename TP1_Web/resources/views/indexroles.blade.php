<h1>Liste de tous les rôles</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
