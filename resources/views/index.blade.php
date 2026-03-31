<x-layout>
    <div class="px-6 pt-4">
        @if (session()->has('error'))
            <div role="alert" class="alert alert-error alert-soft mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-soft m-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session()->get('error') }}</span>
            </div>
        @endif
    </div>

    <div class="m-8">
        <table class="table table-zebra">
            <thead>
                <th>RFC</th>
                <th>Nombre</th>
                <th>Calle</th>
                <th>Número</th>
                <th>Colonia</th>
                <th>CP</th>
                <th class="w-min"></th>
            </thead>
            <tbody>
                @if (count($personas) === 0)
                    <tr>
                        <td colspan="7" class="text-center opacity-80 italic">No hay personas registradas</td>
                    </tr>
                @else
                    @foreach ($personas as $persona)
                        <tr>
                            <td>{{ $persona->getRfc() }}</td>
                            <td>{{ $persona->getNombre() }}</td>
                            <td>{{ $persona->getDomicilio()->getCalle() }}</td>
                            <td>{{ $persona->getDomicilio()->getNumero() }}</td>
                            <td>{{ $persona->getDomicilio()->getColonia() }}</td>
                            <td>{{ $persona->getDomicilio()->getCp() }}</td>

                            <td class="flex gap-4">
                                <a href="/{{ $persona->getRfc() }}" class="btn btn-xs btn-accent">
                                    ✏️
                                </a>
                                <form method="post" action="/{{ $persona->getRfc() }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-error">🗑️</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-layout>
