const form = document.querySelector('#buscar');

/**
 * @type {HTMLInputElement}
 */
const rfc = document.querySelector('#rfc')

form?.addEventListener('submit', (e) => {
    e.preventDefault();
    if (rfc.value.trim() === '') return;
    window.location.href = `/${rfc.value}`;
})

const modifyButtons = document.querySelectorAll("button[mutative]")

modifyButtons.forEach(element => {
    element.addEventListener('click', e => {
        if (!confirm('¿Está seguro de modificar los datos de esta persona?')) {
            e.preventDefault();
        }
    })
})

const deleteButtons = document.querySelectorAll("button[destructive]")

deleteButtons.forEach(element => {
    element.addEventListener('click', e => {
        if (!confirm('¿Está seguro de eliminar a esta persona?')) {
            e.preventDefault();
        }
    })
})
