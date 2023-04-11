<h2>Langue du film {{ $film->title }}</h2>

<table>
    <thead>
        <tr>
            <th>Langue</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $film->language->name }}</td>
            </tr>
    </tbody>
</table>