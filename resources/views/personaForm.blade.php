<x-layout>
    <div class="flex justify-center">
        <form action="{{ isset($persona) ? '/' . $persona->getRFC() : '/' }}" method="post">
            <input type="hidden" name="_method" id="methodField" value="PATCH">

            @csrf
            <fieldset class="fieldset border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-2xl">{{ isset($persona) ? 'Modificar' : 'Crear' }} Persona</legend>

                <label class="input">
                    <span class="label">RFC</span>
                    <input type="text" value="{{ isset($persona) ? $persona->getRFC() : '' }}" class="input"
                        {{ isset($persona) ? 'disabled' : '' }} />
                </label>

                <label for="nombre" class="label">Nombre</label>
                <input value="{{ isset($persona) ? $persona->getNombre() : '' }}" id="nombre" name="nombre"
                    type="text" class="input" placeholder="Ej. John Doe" />

                <label for="calle" class="label">Calle</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getCalle() : '' }}" id="calle"
                    name="calle" type="text" class="input" placeholder="Ej. Obregón" />

                <label for="numero" class="label">Número</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getNumero() : '' }}" id="numero"
                    name="numero" type="text" class="input" placeholder="Ej. 1001" />

                <label for="colonia" class="label">Colonia</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getColonia() : '' }}" id="colonia"
                    name="colonia" type="text" class="input" placeholder="Ej. 21 de Marzo" />


                <label for="cp" class="label">Código Postal</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getCp() : '' }}" id="cp"
                    name="cp" type="text" class="input" placeholder="Ej. 80019" />

                @if (isset($persona))
                    <div class="flex gap-4 w-full">
                        <button type="submit" class="btn btn-primary flex-1" mutative
                            onclick="document.getElementById('methodField').value='PATCH'">
                            Modificar
                        </button>

                        <button type="submit" class="btn btn-error flex-1" destructive
                            onclick="document.getElementById('methodField').value='DELETE'">
                            Borrar
                        </button>
                    </div>
                @else
                    <button class="btn btn-neutral mt-4">Crear</button>
                @endif
            </fieldset>
        </form>
    </div>
</x-layout>
