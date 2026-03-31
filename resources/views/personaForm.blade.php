<x-layout>
    <div class="flex justify-center">
        <form action="{{ isset($persona) ? '/' . $persona->getRFC() : '/' }}" method="post">
            <input type="hidden" name="_method" id="methodField" value="POST">

            @csrf
            <fieldset class="fieldset border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend text-2xl">{{ isset($persona) ? 'Modificar' : 'Crear' }} Persona</legend>

                <label class="input">
                    <span class="label">RFC</span>
                    <input type="text" value="{{ isset($persona) ? $persona->getRFC() : '' }}"
                        {{ isset($persona) ? 'disabled' : '' }} />
                </label>
                @error('rfc')
                    <p class="label text-error">{{ $errors->first('rfc') }}</p>
                @enderror

                <label for="nombre" class="label">Nombre</label>
                <input value="{{ isset($persona) ? $persona->getNombre() : '' }}" id="nombre" name="nombre"
                    type="text" class="input" placeholder="Ej. John Doe" />
                @error('nombre')
                    <p class="label text-error">{{ $errors->first('nombre') }}</p>
                @enderror

                <label for="calle" class="label">Calle</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getCalle() : '' }}" id="calle"
                    name="calle" type="text" class="input" placeholder="Ej. Obregón" />
                @error('calle')
                    <p class="label text-error">{{ $errors->first('calle') }}</p>
                @enderror

                <label for="numero" class="label">Número</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getNumero() : '' }}" id="numero"
                    name="numero" type="text" class="input" placeholder="Ej. 1001" />
                @error('numero')
                    <p class="label text-error">{{ $errors->first('numero') }}</p>
                @enderror

                <label for="colonia" class="label">Colonia</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getColonia() : '' }}" id="colonia"
                    name="colonia" type="text" class="input" placeholder="Ej. 21 de Marzo" />
                @error('colonia')
                    <p class="label text-error">{{ $errors->first('colonia') }}</p>
                @enderror


                <label for="cp" class="label">Código Postal</label>
                <input value="{{ isset($persona) ? $persona->getDomicilio()->getCp() : '' }}" id="cp"
                    name="cp" type="text" class="input" placeholder="Ej. 80019" />
                @error('cp')
                    <p class="label text-error">{{ $errors->first('cp') }}</p>
                @enderror

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
                @enderror
        </fieldset>
    </form>
</div>
</x-layout>
