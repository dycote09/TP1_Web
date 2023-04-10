<h2>Liste des utilisateurs</h2>
<table>
    <thead>
        <tr>
            <th style="text-align: left;">ID</th>
            <th style="text-align: left;">Prénom</th>
            <th style="text-align: left;">Nom de famille</th>
            <th style="text-align: left;">Courriel</th>
            <th style="text-align: left;">Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role_id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

