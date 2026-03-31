<x-layout>
    <x-slot:rightSide>
        <form class="form inline-flex gap-2" id="buscar">
            <label class="input">
                <input type="text" id="rfc" name="rfc" placeholder="Filtrar por RFC" />
                <button type="submit" class="label">🔍</button>
            </label>
        </form>
        <a href="/new" class="btn btn-primary">
            Agregar
        </a>
    </x-slot:rightSide>

    <section>
        @if (session()->has('error'))
            <div role="alert" class="alert alert-error alert-soft mt-4">
                {{ session()->get('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div role="alert" class="alert alert-success alert-soft m-4">
                {{ session()->get('success') }}
            </div>
        @endif
    </section>

    <table class="my-4 table table-zebra">
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
                                Editar
                            </a>
                            <form method="post" action="/{{ $persona->getRfc() }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-error" destructive>Borrar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $personas->links('pagination') }}
</x-layout>
