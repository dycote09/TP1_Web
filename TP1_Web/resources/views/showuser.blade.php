<h2>Informations de l'utilisateur {{ $user->first_name}} {{ $user->last_name}}</h2>
<table>
    <tbody>
        <tr>
            <td style="text-align: left;">ID:</td>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Prénom:</td>
            <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Nom de famille:</td>
            <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Courriel:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td style="text-align: left;">Role:</td>
            <td>{{ $user->role_id }}</td>
        </tr>
    </tbody>
</table>
