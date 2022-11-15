<div>
    <input type="text" placeholder="Search..." wire:model="search">
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>
                    Article name
                </th>
                <th>
                    Content
                </th>
                <th>
                    Author
                </th>
        </thead>

        <tbody>
            @if (!$articles->isEmpty())
                @foreach ($articles as $article)
                    <tr>
                        <th>
                            {{ $article->name }}
                        </th>
                        <td>
                            {{ $article->content }}
                        </td>
                        <td>
                            {{ $article->author }}
                        </td>
                    </tr>
                @endforeach
            @else
                <td>
                    No Results Found
                </td>
            @endif
        </tbody>

    </table>
</div>
