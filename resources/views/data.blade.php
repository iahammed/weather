<table class="shadow-lg bg-white">
  <thead>
    <tr>
      <th class="bg-blue-100 border text-left px-8 py-4">IP</th>
      <th class="bg-blue-100 border text-left px-8 py-4">Weather</th>
    </tr>
  </thead>
  <tbody>
    @forelse($guests as $guest)
    <tr>
      <td class="border px-8 py-4">{{ $guest->ip }}</td>
      <td class="border px-8 py-4">
        @forelse($guest->weathers as $weather)
            <p>{{ $weather->datetime }}</p>
            <p>
                {{ $weather->weather }}
            </p>
        @empty
            <p>No record found</p>    
        @endforelse
        </td>
    </tr>
    @empty
    <tr>
        <td class="border px-8 py-4" colspan="3">
            <p>No users</p>
        </td>
    </tr>
    @endforelse
  </tbody>
</table>