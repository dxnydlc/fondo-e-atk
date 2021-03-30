let libros = [];

$.get(`/busqueda`)
    .done(response => {
        libros = response
    })

var seleccionados = []
buscador.addEventListener('input', () => {
    seleccionados.length = 0
    var fragment = document.createDocumentFragment()
    var elValor = buscador.value
    if (elValor.length > 0) {
        seleccionados = libros.filter((libro) => libro.titulo.toLowerCase().includes(elValor.toLowerCase()))
        seleccionados.forEach((s) => {
            var lista = document.createElement('li')
            lista.innerHTML = '<a href="' + s.url + '"><div><img src="' + s.imagen_portada + '"/><div class="datos"><p>"' + s.titulo + '"</p><span>' + s.anio + '</span></div></div></a>'
            fragment.appendChild(lista)
        })
        $('.lista-resultados').addClass('activo')
        resultado.innerHTML = ''
        resultado.appendChild(fragment)

    } else {
        $('.lista-resultados').removeClass('activo')
        resultado.innerHTML = ''
        resultado.appendChild(fragment)
    }
})
