@Props(['priorite'])

<span
    x-data ="{ color: { 'faible': 'bg-green-100 text-green-800', 'moyen': 'bg-purple-100 text-purple-800', 'haute': 'bg-red-100 text-red-800' } }"
    :class="color['{{ $priorite  }}']"
    class="text-sm font-medium me-2 px-2.5 py-0.5 rounded {{ $attributes['class'] }}"
    >
    {{ ucfirst($priorite) }}
</span>
